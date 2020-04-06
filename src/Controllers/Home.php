<?php

namespace Ci4adminrbac\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
}
