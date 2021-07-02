<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $judul = "Sistem Invetaris Gudang";
        return view('landingpage', ['judul' => $judul]);
    }
}
