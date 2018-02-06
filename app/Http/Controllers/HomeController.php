<?php

namespace App\Http\Controllers;

use App\Wiki;
use App\Quiz;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
       $wiki = Wiki::findOrFail(\DB::table('settings')->where('key', 'wiki_of_week')->value('value'));

       if(request('week') == null)
       {

       $problemOfWeek = Quiz::where('start_date', '<=', Carbon::now()->toDateString())->where('end_date', '>=', Carbon::now()->toDateString())->first();
       }
       else {
        $problemOfWeek = Quiz::where('start_date',  request('week'))->first();
       }

       if($problemOfWeek == null)
       {
          $problemOfWeek = Quiz::latest()->first();
       }

       $weeks = Quiz::where('problemofweek', 1)->where('start_date', '<=', Carbon::now()->toDateString())->orderBy('start_date')->pluck('start_date')->toArray();

      

       if(isset($problemOfWeek))
       {
          $problemsId = $problemOfWeek->id;
          return view('v2.home', compact('wiki', 'problemsId', 'problemOfWeek', 'weeks'));
       } else {
          return abort(500);
       }
       
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view('v2.profile');
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