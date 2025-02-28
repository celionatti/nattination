<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AdminUserController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Controller;
use celionatti\Bolt\Http\Request;

use PhpStrike\app\models\User;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Illuminate\Support\Upload;
use celionatti\Bolt\Pagination\Pagination;

class AdminUserController extends Controller
{
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

    public function manage()
    {
        $user = new User();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $users = $user->paginate($page, 5, [], ['created_at' => "DESC"]);

        $pagination = new Pagination($users['pagination'], URL_ROOT, ['ul' => 'pagination','li' => 'page-item','a' => 'page-link']);

        $view = [
            // 'users' => $user::all(),
            'users' => $users['data'],
            'pagination' => $pagination->render("ellipses"),
        ];

        $this->view->render("admin/users/manage", $view);
    }

    public function create(Request $request)
    {
        $view = [
            'errors' => getFormMessage(),
            'user' => retrieveSessionData('user_data'),
            'genderOpts' => [
                'male' => 'Male',
                'female' => 'Female',
                'others' => 'Others'
            ],
            'roleOpts' => [
                'user' => 'User',
                'admin' => 'Admin',
                'editor' => 'Editor'
            ],
        ];

        unsetSessionArrayData(['user_data']);

        $this->view->render("admin/users/create", $view);
    }

    public function insert(Request $request)
    {
        if ("POST" === $request->getMethod()) {
            // Proceed to create user if validation passes
            $user = new User();

            $rules = [
                'name' => 'required|string|min:3|max:50',
                'email' => 'required|email|unique:users.email',
                'phone' => 'required|numeric',
                'gender' => 'required',
                'role' => 'required',
                'password' => 'required|string|min:6|confirmed',
            ];

            // Load and validate data
            $attributes = $request->loadData();

            if (!$request->validate($rules, $attributes)) {
                storeSessionData('user_data', $attributes);
                setFormMessage($request->getErrors());
                redirect(URL_ROOT . "/admin/users/create");
                return; // Ensure the method exits after redirect
            }

            $attributes['user_id'] = bv_uuid();
            $hashedPassword = password_hash($attributes['password'], PASSWORD_DEFAULT);
            $attributes['password'] = $hashedPassword;
            unset($attributes['password_confirm']);

            if ($user->create($attributes)) {
                // Success: Redirect to manage page
                toast("success", "User Created Successfully");
                redirect(URL_ROOT . "/admin/users/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'User creation failed!']);
                redirect(URL_ROOT . "/admin/users/manage");
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $user = new User();

        $fetchData = $user->find($id)->toArray();
        unset($fetchData['password']);

        $view = [
            'errors' => getFormMessage(),
            'user' => $fetchData ?? retrieveSessionData('user_data'),
            'genderOpts' => [
                'male' => 'Male',
                'female' => 'Female',
                'others' => 'Others'
            ],
            'roleOpts' => [
                'user' => 'User',
                'admin' => 'Admin',
                'editor' => 'Editor'
            ],
        ];

        unsetSessionArrayData(['user_data']);

        $this->view->render("admin/users/edit", $view);
    }

    public function update(Request $request, $id)
    {
        if ("POST" === $request->getMethod()) {
            // Proceed to create category if validation passes
            $user = new User();

            $fetchData = $user->find($id);

            if (!$fetchData) {
                toast("info", "User Not Found!");
                redirect(URL_ROOT . "/admin/users/manage");
            }

            // Current user
            $currentUser = $this->currentUser;

            // Only admin users can delete other users
            if ($currentUser['role'] !== 'admin') {
                toast("error", "Unauthorized action! Only admins can update users.");
                redirect(URL_ROOT . "/admin/users/manage");
            }

            $rules = [
                'name' => 'required|string|min:3|max:50',
                'email' => "required|email|unique:users.email,user_id != $id",
                'phone' => 'required|numeric',
                'gender' => 'required',
                // 'role' => 'required',
            ];

            // Prevent admin from updating their own role
            if ($currentUser['user_id'] === $fetchData->user_id) {
                // Exclude 'role' for the current admin
                $attributes = $request->loadDataExcept(['role']);
            } else {
                // Include 'role' for other users
                $rules['role'] = 'required';
                $attributes = $request->loadData();
            }

            if (!$request->validate($rules, $attributes)) {
                storeSessionData('user_data', $attributes);
                setFormMessage($request->getErrors());
                redirect(URL_ROOT . "/admin/users/edit/{$fetchData->user_id}");
                return; // Ensure the method exits after redirect
            }

            if ($user->update($attributes, $id)) {
                // Success: Redirect to manage page
                toast("success", "User Updated Successfully");
                redirect(URL_ROOT . "/admin/users/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'User Update Process failed!']);
                redirect(URL_ROOT . "/admin/users/manage");
            }
        }
    }

    public function delete(Request $request, $id)
    {
        if("GET" === $request->getMethod()) {
            // Proceed to create user if validation passes
            $user = new User();

            $fetchData = $user->find($id);

            if (!$fetchData) {
                toast("info", "User Not Found!");
                redirect(URL_ROOT . "admin/users/manage");
            }

            // Current user
            $currentUser = $this->currentUser;

            // Only admin users can delete other users
            if ($currentUser['role'] !== 'admin') {
                toast("error", "Unauthorized action! Only admins can delete users.");
                redirect(URL_ROOT . "/admin/users/manage");
            }

            // Prevent users from deleting their own account
            if ($currentUser['user_id'] === $fetchData->user_id) {
                toast("error", "You cannot delete your own account!");
                redirect(URL_ROOT . "/admin/users/manage");
            }

            // Attempt to delete the avatar if it exists
            $upload = new Upload("uploads/users");
            if(!is_null($fetchData->avatar)) {
                if (!$upload->delete($fetchData->avatar)) {
                    toast("error", "Avatar delete failed!");
                    setFormMessage(['error' => 'Avatar delete failed!']);
                }
            }

            if($user->delete($id)) {
                toast("success", "User Deleted Successfully");
                redirect(URL_ROOT . "/admin/users/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'User delete process failed!']);
                redirect(URL_ROOT . "/admin/users/manage");
            }
        }
    }

}