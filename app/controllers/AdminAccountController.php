<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AdminAccountController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Controller;

use PhpStrike\app\models\User;
use celionatti\Bolt\Authentication\Auth;

use celionatti\Bolt\Illuminate\Support\Upload;
use celionatti\Bolt\Illuminate\Support\Image;

class AdminAccountController extends Controller
{
    public $currentUser = null;

    public function onConstruct(): void
    {
        $this->view->setLayout("admin");
        $this->setCurrentUser(user());

        if(!$this->currentUser) {
            redirect(URL_ROOT . "/login");
        }

        if($this->currentUser['role'] === "user") {
            redirect(URL_ROOT);
        }
    }

    public function account(Request $request, $id)
    {
        $user = new User();

        $fetchData = $user->find($id)->toArray();
        unset($fetchData['password']);

        if (!$fetchData) {
            toast("info", "User Not Found!");
            redirect(URL_ROOT . "/admin");
        }

        if("POST" === $request->getMethod()) {
            $rules = [
                'name' => 'required|string|min:3|max:50',
                'email' => "required|email|unique:users.email,user_id != $id",
                'phone' => 'required|numeric',
                'gender' => 'required',
                'bio' => 'required',
                // 'avatar' => 'required',
            ];

            // Load and validate data
            $attributes = $request->loadData();

            // Get the submitted social links array
            $socialLinks = $_POST['social_links'];

            // Remove empty fields and sanitize inputs
            $filteredLinks = array_filter($socialLinks, fn($link) => !empty($link));
            $safeLinks = array_map('htmlspecialchars', $filteredLinks);

            // Convert to comma-separated string
            $socialString = implode(',', $safeLinks);

            $attributes['social_links'] = $socialString;

            // Handle file upload if ut=file
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] !== UPLOAD_ERR_NO_FILE) {
                $upload = new Upload("uploads/users");

                // Perform file upload and check success
                $avatar = $upload->uploadFile("avatar");

                if ($avatar['success']) {
                    // Delete old avatar if it exists
                    if (!is_null($fetchData['avatar'])) {
                        $upload->delete($fetchData['avatar'], true);
                    }

                    // Add new avatar to attributes
                    $attributes['avatar'] = $avatar['file'];

                    // Resize uploaded image
                    $image = new Image();
                    $image->resize($attributes['avatar']);
                } else {
                    // Handle avatar upload failure
                    setFormMessage(['error' => 'Avatar upload failed!']);
                    storeSessionData('user_data', $attributes);
                    redirect(URL_ROOT . "/admin/account/{$id}");
                    return; // Ensure exit after redirect
                }
            } else {
                // If no new avatar uploaded, retain existing avatar
                $attributes['avatar'] = $fetchData['avatar'];
            }

            if (!$request->validate($rules, $attributes)) {
                if(!is_null($attributes['avatar'])) {
                    // delete uploaded avatar
                    $upload->delete($attributes['avatar']);
                }

                storeSessionData('user_data', $attributes);
                setFormMessage($request->getErrors());
                redirect(URL_ROOT . "/admin/account/{$id}");
                return; // Ensure the method exits after redirect
            }

            // Update the user
            if ($user->update($attributes, $id)) {
                toast("success", "User Info Updated Successfully");
                redirect(URL_ROOT . "/admin/account/{$id}");
            } else {
                setFormMessage(['error' => 'User Info update process failed!']);
                redirect(URL_ROOT . "/admin/account/{$id}");
            }
        }
         // Split the social links into an array
         $socialLinks = isset($fetchData['social_links']) ? explode(',', $fetchData['social_links']) : [];

         $defaultLinks = [
            'twitter' => $socialLinks[0] ?? '',
            'facebook' => $socialLinks[1] ?? '',
            'instagram'  => $socialLinks[2] ?? '',
            'youtube' => $socialLinks[3] ?? '',
        ];

        $view = [
            'errors' => getFormMessage(),
            'user' => $fetchData ?? retrieveSessionData('user_data'),
            'genderOpts' => [
                'male' => 'Male',
                'female' => 'Female',
                'others' => 'Others'
            ],
            'links' => $defaultLinks,
        ];

        unsetSessionArrayData(['user_data']);

        $this->view->render("admin/account/account", $view);
    }

    public function delete_account(Request $request, $id)
    {
        $user = new User();

        $fetchData = $user->find($id)->toArray();

        if (!$fetchData) {
            toast("info", "User Not Found!");
            redirect(URL_ROOT . "/admin/account/{$id}");
        }

        $view = [
            'errors' => getFormMessage(),
            'user' => $fetchData ?? retrieveSessionData('user_data'),
        ];

        unsetSessionArrayData(['user_data']);

        $this->view->render("admin/account/delete", $view);
    }

    public function delete(Request $request, $id)
    {
        if("POST" !== $request->getMethod()) {
            return; // Early return for non-POST requests
        }

        $user = new User();

        $fetchData = $user->find($id)->toArray();

        if (!$fetchData) {
            toast("info", "User Not Found!");
            redirect(URL_ROOT . "/admin/account/{$id}");
        }
        // Load and prepare data
        $attributes = $request->loadData();

        if($fetchData && password_verify($attributes['password'], $fetchData['password'])) {
            if($user->delete($id)) {
                $auth = new Auth();
                $auth->logout();
                toast("success", "Account Deleted!");
                redirect(URL_ROOT);
            }
        } else {
            toast("info", "Please type in the correct Password!");
            redirect(URL_ROOT . "/admin/account/{$id}");
        }
    }
}