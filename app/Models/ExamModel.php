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

    public function getQuestinNumber($register)
    {  
        $builder = $this->db->table('tabel_jawaban_peserta'); 
        $builder->select('noUrut');
        $query   = $builder->getWhere(['idPeserta' => $register])->getResult(); 
        return $query;
    }
    public function getQuestinId($register)
    {  
        $builder = $this->db->table('tabel_jawaban_peserta'); 
        $builder->select('idSoal');
        $query   = $builder->getWhere(['idPeserta' => $register])->getResult(); 
        return $query;
    }
    public function getQuestin($noUrut)
    {  
        $builder = $this->db->table('data_soal'); 
        $builder->select('data_soal.*,tabel_jawaban_peserta.noUrut');
        $builder->join('tabel_jawaban_peserta', 'data_soal.id = tabel_jawaban_peserta.idSoal');
        $builder->where('tabel_jawaban_peserta.noUrut', $noUrut);
        $query   = $builder->get()->getResult(); 
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