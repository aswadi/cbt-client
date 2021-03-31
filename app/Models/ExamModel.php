<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamModel extends Model
{
    
    
	// protected $DBGroup              = 'default';
	protected $table                = 'data_peserta'; 

    public function __construct()
	{
        // $db      = \Config\Database::connect();
        // $builder = $db->table('users');
	}
    
    public function getUser($register)
    { 
        // $db      = \Config\Database::connect();

        // $builder = $db->table('data_peserta'); 
        // $query   = $builder->getWhere(['kodeRegistrasi' => $register]);
        // return $query;
        return $this->asArray()
                    ->where(['kodeRegistrasi' => '2005060007'])
                    ->first();
    }
    
    // public function getUserValidateBy($register, $validate)
    // { 
    //     return $this->asArray()
    //                 ->where(['kodeRegistrasi' => $register,
    //                          'kodeValidasi' => $validate,
    //                          'validateBy is not' => null,
    //                          ])
    //                 ->first();
    // }
}