<?php

namespace App\Controllers;

use App\Models\ExamModel;

class Exam extends BaseController
{
	public function __construct()
	{
		$this->examModel = new ExamModel();

	}

	public function index()
	{
		$session = session();

        $data['title'] = 'CBT Raden Fatah';
		$data['data_peserta'] = $this->examModel->getUser($session->username);
		// echo '<pre>';
		// print_r($data['data_peserta']);
		// echo '</pre>';

		// die();
		return view('exam/index', $data);
	}

    public function test($no)
	{
		$session = session();
		$data['data_peserta'] = $this->examModel->getUser($session->username);
		$data['question_number'] = $this->examModel->getQuestinNumber($session->id_peserta);
		$data['question_id'] = $this->examModel->getQuestinId($session->id_peserta);
		$data['question'] = $this->examModel->getQuestin($no,$session->id_peserta);
		return view('exam/test', $data);
	}

	public function question_load($no)
	{
		$session = session();
		// $data['data_peserta'] = $this->examModel->getUser($session->username);
		// $data['question_number'] = $this->examModel->getQuestinNumber($session->id_peserta);
		$data['question_id'] = $this->examModel->getQuestinId($session->id_peserta);
		$data['question'] = $this->examModel->getQuestin($no,$session->id_peserta);
		// return view('exam/test', $data);
		echo json_encode($data);
	}

	public function updateTime()
	{
		// return view('exam/test', $data);
		// helper(["url"]);
		$session = session();
        if ($this->request->getMethod() == "post") {

			$time = $this->request->getPost("time"); 
			$register = $session->username;
			$data = $this->examModel->updateTime($time,$register);
            if (!$data) {
                echo json_encode(array("status" => false, "message" => "gagal update time", "data" => $register));
            }else{
                echo json_encode(array("status" => true, "message" => "berhasil update time" , "data" => $register));
			}
        }
	}

	public function simulation()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('exam/test', $data);
	}

    
}
