<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $users = DB::table('users')->where('type', 'default')->get();
        
        return view('admin/index', ['users' => $users]);
    }
    
    public function admin($id)
    {   
        DB::table('users')->where('id', $id)->update(['type' => 'admin']);

        $users = DB::table('users')->where('type', 'default')->get();
        $userAdmin = User::findOrFail($id);
        \Session::flash('status', "{$userAdmin->name} agora é admin");
        return view('admin/index', ['users' => $users]);
    }


}
