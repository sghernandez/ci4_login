<?php

namespace App\Controllers;
use App\Models\LoginModel;


class Login extends BaseController
{
	public function __construct() {
	 	$this->LoginModel = new LoginModel();
	}

	public function index()
	{
		if($this->request->getPost('send')){
			$this->LoginModel->logIn() ? '' : session()->setFlashdata('error', 'Credenciales Incorrectas.');
		}

		return view('login/login_view');
	}
    
	
	public function logout()
	{
		session()->destroy();
		return redirect()->route('login');
	}

    
}
