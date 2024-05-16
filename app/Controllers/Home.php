<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('v_home');
    }

    public function faq()
    {
        return view('v_faq');
    }

    public function profile()
    {
        return view('v_profile');
    }

    public function contact()
    {
        return view('v_contact');
    }
}
