<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['data']);
        $this->ShortUrlModel = new \App\Models\ShortUrlModel();
        $this->StatisticsUrlModel = new \App\Models\StatisticsUrlModel();
    }

    public function index($short_url="")
    {
        if(!empty($short_url)){
            $data = $this->ShortUrlModel->getData([
                'filter' => [
                    'short_url' => getCurrentURL()
                    ]
            ]);
            $data = $data[0] ?? [];
            if(!empty($data['id']) && !empty($data['url'])){
                try {
                    if(!empty($data['id'])){
                        $this->StatisticsUrlModel->insert([
                            'shorturl_id' => $data['id']
                        ]);
                    }
                } catch (\Throwable $th) {
                    
                }

                return redirect()->to($data['url']); 
            }
        }
        
        $listDataStatistics = $this->StatisticsUrlModel->getData([
            'limit' => 10
        ]);
        $listDataShorturl = $this->ShortUrlModel->getData([
            'limit' => 10
        ]);

        return view('home', [
            'listStatistics' => $listDataStatistics,
            'listDataShorturl' => $listDataShorturl
        ]);
    }
}
