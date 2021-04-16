<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
	// protected $DBGroup              = 'default';
	protected $table                = 'data_peserta';
    
    public function getUser($register)
    { 
        return $this->asArray()
                    ->where(['kodeRegistrasi' => $register])
                    ->first();
    }
    public function getUserValidate($register, $validate)
    { 
        return $this->asArray()
                    ->where(['kodeRegistrasi' => $register,
                             'kodeValidasi' => $validate,
                             ])
                    ->first();
    }
    public function getUserValidateBy($register, $validate)
    { 
        return $this->asArray()
                    ->where(['kodeRegistrasi' => $register,
                             'kodeValidasi' => $validate,
                             'validateBy is not' => null,
                             ])
                    ->first();
    }
    public function getDataTes($tesId)
    {  
        $builder = $this->db->table('data_tes'); 
        $builder->select('judul,skorBenar,skorSalah,deskripsi,info');
        $query   = $builder->getWhere(['id' => $tesId])->getResult(); 
        return $query;
    }
}