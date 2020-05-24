<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminPageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //In every page navName is required!

    public function index()
    {
        $users = \DB::table('users')->paginate(10);

        return view('admin.index', [
            'navName' => 'Home',
            'users' => $users
        ]);
    }

    public function publications()
    {
        $posts = \DB::table('posts')->paginate(10);
        return view('admin.post.index', [
            'navName' => 'All publications',
            'posts' => $posts
        ]);
    }

}
