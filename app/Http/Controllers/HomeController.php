<?php

namespace App\Http\Controllers;

use App\Models\PaperIlmiah;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $penelitian = Penelitian::all();
        $pengabdian = Pengabdian::all();
        $paperIlmiah = PaperIlmiah::all();
        $pengumuman = Pengumuman::all();

        return view('home', compact('penelitian', 'pengabdian', 'paperIlmiah', 'pengumuman'));
    }
}
