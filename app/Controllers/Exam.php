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

    public function test()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('exam/test', $data);
	}
	public function simulation()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('exam/test', $data);
	}

    
}
