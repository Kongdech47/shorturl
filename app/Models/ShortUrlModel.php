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

    public function getData($params=[]){
        $builder = $this->buildDB();

        $selectFields = $this->allowedFields;
        $selectFields[] = 'id';

        $builder = $builder->select($selectFields)->where('deleted_at is null');

        if(!empty($params['filter'])){
            $filter = $params['filter'];
            if(!empty($filter['id'])){
                $builder = $builder->where('id', $filter['id']);
            }
            if(!empty($filter['short_url'])){
                $builder = $builder->where('short_url', $filter['short_url']);
            }
        }

        $data = $builder->orderBy('created_at', 'DESC')->get()->getResultArray();
        return $data;
    }

    public function checkDuplicate($data, $key="url"){
        $status = false;

        if(!empty($data[$key])){
            $builder = $this->buildDB();

            $builder = $builder->select('count(id) as _rows')->where($key, $data[$key])->where('deleted_at is null');
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