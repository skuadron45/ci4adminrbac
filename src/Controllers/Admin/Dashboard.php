<?php

namespace Ci4adminrbac\Controllers\Admin;

use Ci4adminrbac\Controllers\Admin\AdminController;

class Dashboard extends AdminController
{
	protected $selectedModule = 4;

	public function index()
	{
		parent::render();
	}
}
