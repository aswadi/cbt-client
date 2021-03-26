<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('auth/auth', $data);
	}

    public function prosesLogin()
	{
        $data['title'] = 'CBT Raden Fatah';
		// return view('exam/test', $data);
	}

    
}