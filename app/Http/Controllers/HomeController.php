<?php

namespace App\Http\Controllers;

use App\Models\gurumodel;
use App\Models\kelasmodel;
use App\Models\konfirmasimodel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Home";
        $kelas = kelasmodel::get();
        $guru = gurumodel::get();
        return view('pages.home', compact('title', 'kelas', 'guru',));
    }
}
