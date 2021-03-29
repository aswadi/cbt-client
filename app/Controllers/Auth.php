<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->authModel = new AuthModel();
	}

	public function index()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('auth/auth', $data);
	}

    public function authCheck()
	{
        $data['title'] = 'CBT Raden Fatah';
		// return view('exam/test', $data);
		// helper(["url"]);

        if ($this->request->getMethod() == "post") {

            // $authModel = new AuthModel();
			
			$kodeValidasi = $this->request->getPost("tahun") .'-'.$this->request->getPost("bulan") .'-'.$this->request->getPost("tanggal");
			$register = $this->request->getPost("username"); 

            if ($this->authModel->getUser($register,$kodeValidasi)) {
                echo json_encode(array("status" => true, "message" => "User Active", "data" => $register));
            } else {
                echo json_encode(array("status" => false, "message" => "Failed" , "data" => $register));
            }
        }
	}

    
}