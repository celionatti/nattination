<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AuthController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Controller;
use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;
use celionatti\Bolt\Authentication\Auth;
use celionatti\Bolt\Helpers\FlashMessages\FlashMessage;

use PhpStrike\app\models\User;

class AuthController extends Controller
{
    protected $auth;

    public function onConstruct(): void
    {
        $this->view->setLayout("auth");
        $this->auth = new Auth();
    }

    public function register_view(Request $request)
    {
        $this->setCurrentUser(user());
        if($this->currentUser) {
            redirect(URL_ROOT);
        }

        $view = [
            'errors' => getFormMessage(),
            'user' => retrieveSessionData("auth_data"),
            'genderOpts' => [
                'male' => 'Male',
                'female' => 'Female',
                'others' => 'Others'
            ],
        ];

        unsetSessionArrayData(['auth_data']);

        $this->view->render("auth/register", $view);
    }

    public function register(Request $request)
    {
        $this->setCurrentUser(user());
        if($this->currentUser) {
            redirect(URL_ROOT);
        }

        // Ensure the method is POST
        if ("POST" !== $request->getMethod()) {
            setFormMessage(['error' => 'Invalid request method.']);
            redirect(URL_ROOT . "/auth/register");
            return;
        }

        $user = new User();

        // Validation rules
        $rules = [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users.email',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'terms' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ];

        // Load and validate data
        $attributes = $request->loadData();

        if (!$request->validate($rules, $attributes)) {
            storeSessionData('auth_data', $attributes);
            setFormMessage($request->getErrors());
            redirect(URL_ROOT . "/auth/register");
            return;
        }

        // Prepare user attributes
        $attributes['user_id'] = bv_uuid();
        $attributes['password'] = password_hash($attributes['password'], PASSWORD_DEFAULT);
        unset($attributes['password_confirm']); // Remove unnecessary data

        // Attempt to create the user
        if ($user->create($attributes) !== NULL) {
            setFormMessage(['error' => 'User creation failed!']);
            redirect(URL_ROOT . "/auth/register");
            return;
        }

        // On success, redirect to login
        toast("success", "Account Created! Now Login.");
        redirect(URL_ROOT . "/login");
    }

    public function login(Request $request, Response $reponse)
    {
        $this->setCurrentUser(user());
        if($this->currentUser) {
            redirect(URL_ROOT);
        }

        $view = [
            'errors' => getFormMessage(),
            'user' => retrieveSessionData("auth_data"),
        ];

        unsetSessionArrayData(['auth_data']);

        $this->view->render("auth/login", $view);
    }

    public function login_access(Request $request)
    {
        $this->setCurrentUser(user());
        if($this->currentUser) {
            redirect(URL_ROOT);
        }

        // Validation rules
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $email = $request->only(['email'])['email'];
        $password = $request->only(['password'])['password'];
        $remember = $request->only(['remember'])['remember'];

        $rememberMe = $remember === "on" ? true : false;

        $auth = $this->auth->login($email, $password, $rememberMe);

        if($auth['success']) {
            toast("success", $auth['message']);
            redirect(URL_ROOT);
        } else {
            toast("error", $auth['message']);
            // FlashMessage::setMessage($auth['message'], $auth['type']);
            redirect(URL_ROOT . "/login");
        }
    }

    public function logout(Request $request)
    {
        $this->auth->logout();
        toast("success", "Logout successfully!");
        // FlashMessage::setMessage("Logout successfully!", "success");
        redirect(URL_ROOT);

    }

}
