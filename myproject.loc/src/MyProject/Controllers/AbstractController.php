<?php
namespace MyProject\Controllers;

use MyProject\Models\Users\User;
use MyProject\Services\UsersAuthService;
use MyProject\View\View;
use MyProject\Models\Articles\Article;

abstract class AbstractController 
{
	protected $view;
	protected $user;

	public function __construct() 
	{
		$this->user = UsersAuthService::getUserByToken();
		$this->view = new View (__DIR__ . '/../../../templates');
		$this->view->setVar('user', $this->user);
	}
}