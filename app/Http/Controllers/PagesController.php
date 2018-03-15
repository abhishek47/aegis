<?php

namespace App\Http\Controllers;

use App\Wiki;
use App\Course;
use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use App\Mail\JobApplication;

class PagesController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('terms', 'policy', 'careers', 'applyJob');
    }

    public function index()
    {
    	$wikiOfDay = Wiki::findOrFail(\DB::table('settings')->where('key', 'wiki_of_week')->value('value'));
        $wikis = Wiki::latest()->where('published', 1)->limit(3)->get();
        $courses = Course::latest()->get();

    	return view('v2.welcome', compact('wikiOfDay', 'wikis', 'courses'));
    }

     public function invest()
    {
        return view('v2.pages.invest');
    }


    public function about()
    {
    	return view('pages.about');
    }

    public function careers()
    {
    	return view('v2.pages.careers');
    }

    public function contact()
    {
    	return view('v2.pages.contact');
    }

    public function terms()
    {
        return view('v2.pages.terms');
    }

    public function policy()
    {
        return view('v2.pages.policy');
    }


    public function sendMail()
    {
        \Mail::to('info@aegisacademy.co.in')->send(new ContactMessage(request('name'), request('email'), request('message')));
        return back();
    }

    public function applyJob()
    {
        $file = request()->file('resume');

        $imageName = 'uploads/' . uniqid();

        \Storage::disk('s3')->put($imageName, file_get_contents($file));
        \Storage::disk('s3')->setVisibility($imageName, 'public');

        $url = \Storage::disk('s3')->url($imageName);

        \Mail::to('info@aegisacademy.co.in')
            ->send(new JobApplication(request('name'), request('email'), request('phone'), request('post'), $url));

        return redirect('/careers');
    }



    
}
