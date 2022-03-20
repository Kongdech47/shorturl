<?php
namespace App\Controllers;

class LogURL extends BaseController
{
    public function __construct()
    {
        $this->ShortUrlModel = new \App\Models\ShortUrlModel();
    }
    public function index()
    {
        $listData = $this->ShortUrlModel->getData();

        return view('log_url', [
            'listData' => $listData,
            'title' => 'ประวัติการย่อ URL',
            'menu_active' => 'logurl'
        ]);
    }
}
