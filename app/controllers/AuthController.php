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
use celionatti\Bolt\Authentication\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function onConstruct(): void
    {
        $this->view->setLayout("auth");
        $this->authService = new AuthService();
    }

    public function login(Request $request, Response $reponse)
    {
        $view = [
            'errors' => getFormMessage(),
            'user' => retrieveSessionData("auth_data"),
        ];

        $this->view->render("auth/login", $view);
    }

    public function login_access(Request $request)
    {
        //     // Validation rules
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $email = $request->only(['email'])['email'];
        $password = $request->only(['password'])['password'];

        // Check if the user is blocked due to failed login attempts
        if ($this->authService->isBlocked($email)) {
            $waitTime = $this->authService->getRemainingBlockTime($email);
            setFormMessage("Too many failed login attempts. Please try again in {$waitTime} minutes.");
            redirect(URL_ROOT . "/login", 429);
            return;
        }

        // Attempt to log in the user
        if ($this->authService->attemptLogin($email, $password)) {
            // Reset failed attempts on successful login
            $this->authService->resetFailedAttempts($email);
            // Redirect to the dashboard or another route
            toast("success", "Logged In");
            redirect(URL_ROOT . "/admin");
            return;
        } else {
            // Increment failed attempts
            $this->authService->incrementFailedAttempts($email);

            if ($this->authService->hasReachedMaxAttempts($email)) {
                // Block the user for 5 minutes
                $this->authService->blockUser($email);

                setFormMessage("Too many failed login attempts. Please try again in 5 minutes.");
                redirect(URL_ROOT . "/login", 429);
                return;
            }

            setFormMessage("Invalid credentials. Please try again.");
            redirect(URL_ROOT . "/login", 401);
            return;
        }
    }

    // public function login_access(Request $request)
    // {
    //     $auth = new Auth();

    //     $credentials = $request->only(['email', 'password']);
    //     $rememberMe = $request->has('remember'); // Check if "remember me" is set

    //     // Validation rules
    //     $rules = [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ];

    //     if (!$request->validate($rules, $credentials)) {
    //         storeSessionData('auth_data', $credentials);
    //         setFormMessage($request->getErrors());
    //         redirect(URL_ROOT . "/login");
    //         return; // Ensure the method exits after redirect
    //     }

    //     // Check for rate limiting
    //     if ($auth->rateLimiter()->isLocked($credentials['email'])) {
    //         setFormMessage("Too many login attempts. Please try again later.");
    //         redirect(URL_ROOT . "/login");
    //         return; // Ensure the method exits after redirect
    //     }

    //     // Attempt login
    //     if ($auth->login($credentials, $rememberMe)) {
    //         dump("Success");
    //         toast("success", "Login successful.");
    //         redirect(URL_ROOT);
    //         return;
    //     }
    //     // Failed to create: Redirect to create page
    //     setFormMessage($auth->getErrors());
    //     redirect(URL_ROOT . "/login");
    // }

    public function register($name, Request $request, Response $reponse)
    {
        $view = [];

        $this->view->render("auth/register", $view);
    }
}
