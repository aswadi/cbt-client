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
		$data['data_ujian'] = $this->examModel->getDataTes($session->id_tes);

		// echo '<pre>';
		// print_r($data['data_ujian']);
		// echo '</pre>';

		// die();
		return view('exam/index', $data);
	}

    public function test($no)
	{
		$session = session();
		$data['data_peserta'] = $this->examModel->getUser($session->username);
		$data['data_ujian'] = $this->examModel->getDataTes($session->id_tes);
		$data['question_number'] = $this->examModel->getQuestinNumber($session->id_peserta);
		$data['number_last'] = $this->examModel->getQuestinNumberLast($session->id_peserta);
		$data['question_id'] = $this->examModel->getQuestinId($session->id_peserta);
		$data['question'] = $this->examModel->getQuestin($no,$session->id_peserta);
		$data['no_aktif'] = $no;
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

	public function updateFinish()
	{
		// return view('exam/test', $data);
		// helper(["url"]);
		$session = session();
        if ($this->request->getMethod() == "post") {

			$register = $session->username;
			$data = $this->examModel->updateFinish($register);
            if (!$data) {
                echo json_encode(array("status" => false, "message" => "Ujian Anda telah selesai..0", "data" => $register));
            }else{
                echo json_encode(array("status" => true, "message" => "Ujian Anda telah selesai.." , "data" => $register));
			}
        }
	}
	public function updateAnswer()
	{
		// return view('exam/test', $data);
		// helper(["url"]);
		$session = session();
        if ($this->request->getMethod() == "post") {
			// $idSoal = $this->request->getPost("idSoal");
			$idPeserta = $session->id_peserta;
			$jawaban = $this->request->getPost("answer");
			$noSoal = $this->request->getPost("Urut");
			// $register = $session->username;
			// print_r($idPeserta);
			// print_r($jawaban);
			// print_r($noSoal);
			// die();
			$data = $this->examModel->updateAnswer($idPeserta, $noSoal, $jawaban);
			// $data = $this->examModel->updateSkor($id_peserta);
            if (!$data) {
                echo json_encode(array("status" => false, "message" => "Gagal update jawaban", "data" => $data));
            }else{
                echo json_encode(array("status" => true, "message" => "Update berhasil.." , "data" => $data));
			}
        }
	}

	public function simulation()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('exam/test', $data);
	}

    
}
