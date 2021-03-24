<?php

namespace App\Controllers;

class Exam extends BaseController
{
	public function index()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('exam/index', $data);
	}
}
