<?php

namespace App\Http\Controllers;

use App\Wiki;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $wiki = Wiki::latest()->where('published', 1)->first();
        return view('home', compact('wiki'));
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view('account.edit');
    }


    /**
     * Show the update user details.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
       auth()->user()->update(request()->all());

       return back();
    }

   public function updatePassword(Request $request)
   {
      $this->validate($request, [
          'old_password' => 'required',
          'password' => 'required|string|min:6|confirmed'
        ]);
      $old_password = $request->get('old_password');
      $password = $request->get('password');
      if(!\Hash::check($old_password, auth()->user()->password))
      {
          return back()->withErrors(['Please enter your current password correct!']);
      } 
      auth()->user()->password = bcrypt($password);
      auth()->user()->save();
     
      return back();
   }

}