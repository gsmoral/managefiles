<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use Carbon\Carbon;
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
        $allFiles = File::pluck('id');
        $recentFiles = File::where('created_at', '>', Carbon::today()->subWeek())->pluck('id');
        $allUsers = User::pluck('id');
        $recentUsers = User::where('created_at', '>', Carbon::today()->subWeek())->pluck('id');
        return view('admin.index', compact('allFiles', 'recentFiles', 'allUsers', 'recentUsers'));
    }
}
