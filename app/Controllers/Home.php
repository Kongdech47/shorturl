<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('/shorturl'));
        // return view('welcome_message');
    }
}
