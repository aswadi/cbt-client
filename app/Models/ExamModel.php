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
    public function getQuestinNumberLast($register)
    {  
        $builder = $this->db->table('tabel_jawaban_peserta'); 
        $builder->select('noUrut');
        $query   = $builder->orderBy('noUrut','DESC'); 
        $query   = $builder->limit(1); 
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
    
    public function getQuestin($noUrut, $idPeserta)
    {  
        $builder = $this->db->table('data_soal'); 
        $builder->select('data_soal.*,tabel_jawaban_peserta.noUrut');
        $builder->join('tabel_jawaban_peserta', 'data_soal.id = tabel_jawaban_peserta.idSoal');
        $builder->where('tabel_jawaban_peserta.noUrut', $noUrut);
        $builder->where('tabel_jawaban_peserta.idPeserta', $idPeserta);
        $query   = $builder->get()->getResult(); 
        return $query;
    }

    public function getDataTes($tesId)
    {  
        $builder = $this->db->table('data_tes'); 
        $builder->select('judul,skorBenar,skorSalah,deskripsi,info');
        $query   = $builder->getWhere(['id' => $tesId])->getResult(); 
        return $query;
    }

    public function updateTime($time, $register)
    {  
        $builder = $this->db->table('data_peserta'); 
        $builder->set('sisaWaktu', $time);
        $builder->where('kodeRegistrasi', $register);
        return $builder->update(); 
    }
    public function updateAnswer($idPeserta, $noSOal, $idSoal, $jawaban)
    {  
        $builder = $this->db->table('tabel_jawaban_peserta'); 
        $builder->set('jawaban', $jawaban);
        $builder->where('idPeserta', $idPeserta);
        $builder->where('noSOal', $noSOal);
        $builder->where('idSoal', $idSoal);
        return $builder->update(); 
    }
    public function updateFinish($register)
    {  
        $builder = $this->db->table('data_peserta'); 
        $builder->set('selesai', 1);
        $builder->where('kodeRegistrasi', $register);
        return $builder->update(); 
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