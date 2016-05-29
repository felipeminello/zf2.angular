<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

class AuthController extends AbstractActionController
{
	public function indexAction()
	{
		$request = $this->getRequest();

		if ($request->isPost()) {
			$data = $request->getPost();

			$auth = new AuthenticationService();
			$sessionStorage = new SessionStorage();
			$auth->setStorage($sessionStorage);

			
		}
	}
}