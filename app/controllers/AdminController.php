<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AdminController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Controller;

use PhpStrike\app\models\Setting;
use celionatti\Bolt\Pagination\Pagination;

class AdminController extends Controller
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

    public function dashboard()
    {
        $view = [];

        $this->view->render("admin/dashboard", $view);
    }

    public function settings()
    {
        $setting = new Setting();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $settings = $setting->paginate($page, 5);

        $pagination = new Pagination($settings['pagination'], URL_ROOT, ['ul' => 'pagination','li' => 'page-item','a' => 'page-link']);

        $view = [
            'errors' => getFormMessage(),
            'data' => retrieveSessionData('setting_data'),
            'statusOpts' => [
                'disable' => 'Disable',
                'active' => 'Active',
            ],
            'settings' => $settings['data'],
            'pagination' => $pagination->render("ellipses"),
        ];

        unsetSessionArrayData(['setting_data']);

        $this->view->render("admin/settings", $view);
    }

    public function insert_setting(Request $request)
    {
        if("POST" !== $request->getMethod()) {
            return; // Early return for non-POST requests
        }

        $setting = new Setting();

        $rules = [
            'name' => 'required|string',
            'value' => 'required',
            'status' => 'required',
        ];

        // Load and validate data
        $attributes = $request->loadData();

        if (!$request->validate($rules, $attributes)) {
            storeSessionData('setting_data', $attributes);
            setFormMessage($request->getErrors());
            redirect(URL_ROOT . "/admin/settings");
            return; // Ensure the method exits after redirect
        }

        if ($setting->create($attributes)) {
            // Success: Redirect to manage page
            toast("success", "Setting Created Successfully");
            redirect(URL_ROOT . "/admin/settings");
        } else {
            // Failed to create: Redirect to create page
            setFormMessage(['error' => 'Setting creation failed!']);
            redirect(URL_ROOT . "/admin/settings");
        }
    }
}
