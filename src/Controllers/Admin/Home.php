<?php

namespace Ci4adminrbac\Controllers\Admin;

class Home extends AdminController
{
	public function index()
	{
		$successUrl = $this->auth->getSuccessUrl();
		return $this->response->redirect(site_url($successUrl));
	}
}
