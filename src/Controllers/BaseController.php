<?php

namespace Ci4adminrbac\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Validation\Exceptions\ValidationException;

use Ci4adminrbac\Config\Services;

class BaseController extends Controller
{

	use ResponseTrait;

	protected $vars = [];

	protected $helpers = ['general', 'url'];

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
	}

	protected function outputJson($status, $message, $csrf = true)
	{
		if ($csrf) {
			$this->vars['csrfName'] = csrf_token();
			$this->vars['csrfToken'] = csrf_hash();
		}
		$this->vars['status'] = $status;
		$this->vars['message'] = $message;

		return $this->respond($this->vars, 200);
	}

	protected function validate($rules, array $messages = []): bool
	{
		$this->validator = Services::validation();

		if (is_string($rules)) {
			$validation = config('Ci4adminrbac\Config\Validation');

			if (!isset($validation->$rules)) {
				throw ValidationException::forRuleNotFound($rules);
			}

			if (!$messages) {
				$errorName = $rules . '_errors';
				$messages  = $validation->$errorName ?? [];
			}

			$rules = $validation->$rules;
		}

		return $this->validator
			->withRequest($this->request)
			->setRules($rules, $messages)
			->run();
	}
}
