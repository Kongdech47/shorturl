<?php
namespace App\Controllers;

class StatisticsURL extends BaseController
{
    public function __construct()
    {
        helper(['data']);
        $this->StatisticsUrlModel = new \App\Models\StatisticsUrlModel();
    }

    public function index()
    {
        $listData = $this->StatisticsUrlModel->getData();

        return view('statistics_url', [
            'listData' => $listData,
            'title' => 'สถิติ URL',
            'menu_active' => 'statisticsurl'
        ]);
    }

    public function add($id=""){
        try {
            if(!empty($id)){
                $id = decodeData($id);
                if(!empty($id)){
                    $this->StatisticsUrlModel->insert([
                        'shorturl_id' => $id
                    ]);
                }
            }
        } catch (\Throwable $th) {
            
        }
    }
}
