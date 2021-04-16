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
			$data = $this->authModel->getUser($register);
			$data_tes = $this->authModel->getDataTes($data['idTes']);
			// echo '<pre>';
			// 	print_r($data_tes[0]->skorSalah);
			// echo '</pre>';
			// die();
            if (!$data) {
                echo json_encode(array("status" => false, "message" => "kode registrasi tidak terdaftar", "data" => $register));
            }else if(!$this->authModel->getUserValidate($register,$kodeValidasi)){
                echo json_encode(array("status" => false, "message" => "tahun/bulan/tanggal lahir salah" , "data" => $register));
            }else if(!$this->authModel->getUserValidateBy($register,$kodeValidasi)){
                echo json_encode(array("status" => false, "message" => "user anda belum di validasi" , "data" => $register));
            }else{
				$session = session();

				$newdata = [
					'username'  => $data['kodeRegistrasi'],
					'id_peserta'  => $data['id'],
					'id_tes'  => $data['idTes'],
					'skor_benar'  => $data_tes[0]->skorBenar,
					'skor_salah'  => $data_tes[0]->skorSalah,
					'log_in'	=> true,
				];
				$session->set($newdata);
                echo json_encode(array("status" => true, "message" => "berhasil, mohon tunggu anda akan di arahkan ke laman ujian." , "data" => $register));
			}
        }
	}

	public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    
}