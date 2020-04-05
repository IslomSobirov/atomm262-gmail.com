<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;

use Illuminate\Http\Request;
use App\Traits\ImageUpload;

class HomeController extends Controller
{
    use ImageUpload;


    public function __construct()
    {
        $this->middleware('auth');
    }

    
    //home page
    public function index()
    {
        $posts = Post::all();
        return view('home', ['posts' => $posts]);
    }

    //Settings page of the user
    public function dashboard()
    {
        $userPosts = Auth()->user()->posts;
        return view('dashboard', ['userPosts' => $userPosts]);
    }

    //Change about of the user
    public function changeAbout(Request $request)
    {
        $validated = $request->validate([
            'about' => 'min:15'
        ]);

        \App\User::find(auth()->user()->id)->update($validated);

        return redirect()->back()->with('msg', 'About info of user has been updated successfuly');
    }


    //change personal info and image
    public function personalInfo(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'role' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact' => ''
        ]);
        
        if(isset($request->avatar))
        {
            
            $request->avatar;
            $filePath = $this->UserImageUpload($request->avatar); //Passing $data->image as parameter to our created method
            
            if(\File::exists(Auth()->user()->avatar)) {
                \File::delete(Auth()->user()->avatar);
            }

            User::find(auth()->user()->id)->update([
                'name' => $validated['name'],
                'role'=> $validated['role'],
                'avatar' => $filePath,
                'contact'=> ''
            ]);
            return redirect()
                    ->back()
                    ->with('msg', 'Personal info of user has been updated successfuly');

        }

        \App\User::find(auth()->user()->id)->update($validated);
        return redirect()
                    ->back()
                    ->with('msg', 'Personal info of user has been updated successfuly');
        
    }


    //See all users
    public function users()
    {
        $users = \DB::table('users')->where('profileType', 'freelancer')->get();
        return view('/users', ['users' => $users]);
    }


    //Search users
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'min:1'
        ]);
        $search = $request->search;

        $users = \DB::table('users')
                ->where('name', 'like', '%'. $search .'%')
                ->get();
          
        return view('/users', ['users' => $users]);
        // return back()->withInput(['users' => $users]);
        
    }

    public function user($id)
    {
        $user = User::findOrFail($id);
        return view('user/show', ['user' => $user]);
    }

}
