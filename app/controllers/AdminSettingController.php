<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AdminSettingController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Controller;

use PhpStrike\app\models\Setting;
use celionatti\Bolt\Pagination\Pagination;

class AdminSettingController extends Controller
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

    public function settings()
    {
        $setting = new Setting();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $settings = $setting->paginate($page, 5);

        $pagination = new Pagination($settings['pagination'], URL_ROOT, ['ul' => 'pagination','li' => 'page-item','a' => 'page-link']);

        $view = [
            'settings' => $settings['data'],
            'pagination' => $pagination->render("ellipses"),
        ];

        $this->view->render("admin/settings/settings", $view);
    }

    public function create(Request $request)
    {
        $view = [
            'errors' => getFormMessage(),
            'data' => retrieveSessionData('setting_data'),
            'statusOpts' => [
                'disable' => 'Disable',
                'active' => 'Active',
            ],
        ];

        unsetSessionArrayData(['setting_data']);

        $this->view->render("admin/settings/create", $view);
    }

    public function insert(Request $request)
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
        $attributes = $request->loadDataExcept(['value']);
        $attributes['value'] = $_POST['value'];

        if (!$request->validate($rules, $attributes)) {
            storeSessionData('setting_data', $attributes);
            setFormMessage($request->getErrors());
            redirect(URL_ROOT . "/admin/settings/create");
            return; // Ensure the method exits after redirect
        }

        if ($setting->create($attributes)) {
            // Success: Redirect to manage page
            toast("success", "Setting Created Successfully");
            redirect(URL_ROOT . "/admin/settings/manage");
        } else {
            // Failed to create: Redirect to create page
            setFormMessage(['error' => 'Setting creation failed!']);
            redirect(URL_ROOT . "/admin/settings/manage");
        }
    }

    public function edit(Request $request, $id)
    {
        $setting = new Setting();

        $fetchData = $setting->find($id)->toArray();

        $view = [
            'errors' => getFormMessage(),
            'data' => $fetchData ?? retrieveSessionData('setting_data'),
            'statusOpts' => [
                'active' => 'Active',
                'inactive' => 'Inactive',
            ],
        ];

        unsetSessionArrayData(['setting_data']);

        $this->view->render("admin/settings/edit", $view);
    }

    public function update(Request $request, $id)
    {
        if("POST" === $request->getMethod()) {
            // Proceed to create category if validation passes
            $setting = new Setting();

            $fetchData = $setting->find($id);

            if (!$fetchData) {
                toast("info", "Setting Not Found!");
                redirect(URL_ROOT . "/admin/settings/manage");
            }

            $rules = [
                'name' => 'required|string',
                'value' => 'required',
                'status' => 'required',
            ];

            // Load and validate data
            $attributes = $request->loadDataExcept(['value']);
            $attributes['value'] = $_POST['value'];

            if (!$request->validate($rules, $attributes)) {
                storeSessionData('setting_data', $attributes);
                setFormMessage($request->getErrors());
                redirect(URL_ROOT . "/admin/settings/edit/{$fetchData->id}");
                return; // Ensure the method exits after redirect
            }

            if ($setting->update($attributes, $id)) {
                // Success: Redirect to manage page
                toast("success", "Setting Updated Successfully");
                redirect(URL_ROOT . "/admin/settings/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'Setting Update Process failed!']);
                redirect(URL_ROOT . "/admin/settings/manage");
            }
        }
    }

    public function delete(Request $request, $id)
    {
        if("GET" === $request->getMethod()) {
            // Proceed to create category if validation passes
            $setting = new Setting();

            $fetchData = $setting->find($id);

            if (!$fetchData) {
                toast("info", "Setting Not Found!");
                redirect(URL_ROOT . "admin/settings/manage");
            }
            if($setting->delete($id)) {
                toast("success", "Setting Deleted Successfully");
                redirect(URL_ROOT . "/admin/settings/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'Category delete process failed!']);
                redirect(URL_ROOT . "/admin/settings/manage");
            }
        }
    }
}