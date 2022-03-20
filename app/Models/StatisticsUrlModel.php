<?php

namespace App\Models;

use CodeIgniter\Model;

class StatisticsUrlModel extends Model
{
    protected $table      = 'statistics_url';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['shorturl_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getData(){
        $db = \Config\Database::connect();
        $builder = $db->table('short_url');

        $data = $builder->select(['short_url.id', 'short_url.name', 'short_url.short_url', 'short_url.url', '(select count(*) from statistics_url where statistics_url.shorturl_id=short_url.id and statistics_url.deleted_at is null) as statistics'])->where('short_url.deleted_at is null')->orderBy('short_url.created_at', 'DESC')->get()->getResultArray();
        return $data;
    }
}