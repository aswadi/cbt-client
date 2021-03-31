<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamModel extends Model
{
     
    public function getUser($register)
    {  
        $builder = $this->db->table('data_peserta'); 
        $query   = $builder->getWhere(['kodeRegistrasi' => $register])->getResult(); 
        return $query;
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