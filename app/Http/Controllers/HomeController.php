<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman home setelah login
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');  // Mengembalikan tampilan home.blade.php
    }
}
