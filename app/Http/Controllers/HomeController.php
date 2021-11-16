<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user1 = User::find(1);
        $user = DB::table('users')->count();
        $role = DB::table('roles')->count();
        $obat = DB::table('products')->count();
        return view('home',compact('user','role','obat','user1'));
    }
}
