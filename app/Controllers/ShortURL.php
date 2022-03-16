<?php

namespace App\Controllers;

class ShortURL extends BaseController
{
    public function index()
    {
        return view('short_url');
    }
}
