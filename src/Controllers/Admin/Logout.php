<?php

namespace Ci4adminrbac\Controllers\Admin;

use Ci4adminrbac\Controllers\Admin\AdminController;

class Logout extends AdminController
{

    public function index()
    {
        $this->auth->logout();

        $this->setFlashMessage("success", "Logout berhasil !");
        return redirect()->to(site_url('login'));
    }

}
