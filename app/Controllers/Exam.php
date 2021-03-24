<?php

namespace App\Controllers;

class Exam extends BaseController
{
	public function index()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('exam/index', $data);
	}

    public function test()
	{
        $data['title'] = 'CBT Raden Fatah';
		return view('exam/test', $data);
	}

    
}
