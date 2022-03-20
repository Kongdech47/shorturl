<?php

namespace App\Models;

use CodeIgniter\Model;

class ShortUrlModel extends Model
{
    protected $table      = 'short_url';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'short_url', 'url', 'qrcode'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    private function buildDB(){
        $db = \Config\Database::connect();
        return $db->table($this->table);
    }

    public function getData(){
        $builder = $this->buildDB();

        $selectFields = $this->allowedFields;
        $selectFields[] = 'id';
        $data = $builder->select($selectFields)->where('deleted_at is null')->orderBy('created_at', 'DESC')->get()->getResultArray();
        return $data;
    }

    public function checkDuplicate($data){
        $status = false;

        if(!empty($data['url'])){
            $builder = $this->buildDB();

            $builder = $builder->select('count(id) as _rows')->where('url', $data['url'])->where('deleted_at is null');
            if(!empty($data['id'])){
                $builder = $builder->where('id !=', $data['id']);
            }
            $builder = $builder->get()->getRow();
            
            if(empty($builder->_rows)){
                $status = true;
            }
        }

        return $status;
    }
}