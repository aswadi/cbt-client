<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
	// protected $DBGroup              = 'default';
	protected $table                = 'data_peserta';
    
    public function getUser($register, $validate)
    { 
        return $this->asArray()
                    ->where(['kodeRegistrasi' => $register,
                             'kodeValidasi' => $validate,
                             'validateBy is not' => null,
                             ])
                    ->first();
    }
}