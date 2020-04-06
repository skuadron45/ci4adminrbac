<?php

namespace Ci4adminrbac\Controllers;

use Config\Services;
use Ci4adminrbac\Controllers\Admin\AdminController;

class Login extends AdminController
{

    public function index()
    {
        $this->vars['link_form'] = site_url('login');
        $this->adminlte->setVars($this->vars);
        $this->adminlte->showLoginPage();
    }

    public function verify()
    {
        if ($this->request->isAJAX()) {
            if ($postData = $this->request->getPost()) {
                $status = "error";
                if ($this->validation($postData)) {
                    $username = $postData['username'];
                    $password = $postData['password'];
                    $isLogin = $this->auth->login($username, $password);
                    $session = Services::session();
                    if ($isLogin) {
                        $status = "success";
                        $message = "Login berhasil !";
                        $session->remove('fail-login');
                    } else {
                        $message = "Username dan password salah !";
                        $session->set('fail-login', $username . ":" . $password);
                    }
                } else {
                    $message = $this->validator->listErrors('alert');
                }
                return parent::outputJson($status, $message, true);
            }
        }
        return $this->failForbidden();
    }

    private function validation($postData = [])
    {
        $rules = [
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|alpha_dash'
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required'
            ],
        ];
        return $this->validate($rules);
    }
}
