<?php

namespace App\Http\Controllers;

use App\Rules\Math;
use App\Models\User;
use App\Mail\UserForm;
use App\Mail\AdminForm;
use App\Mail\PublicForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Artesaos\SEOTools\Facades\SEOMeta;

class PageController extends Controller
{
    public function home()
    {
        // dd(auth()->user()->email);
        SEOMeta::setTitle('WebField Design');
        SEOMeta::setDescription('This is my page description');
        return view('pages.home');
    }
    public function contact()
    {
        SEOMeta::setTitle('WebField Design');
        SEOMeta::setDescription('This is my page description');
        return view('pages.contact');
    }
    public function logo()
    {
        SEOMeta::setTitle('Logo - WebField Design');
        SEOMeta::setDescription('Amazing logos the represent your business well');
        return view('pages.logo');
    }
    public function public_email(Request $request)
    {

       $user = User::find(1);
       $request->validate([
            'firstname'=>'required|max:255',
            'lastname'=>'required|max:255',
            'email'=>'required|max:255',
            'question'=>'required|max:255',
            'math'=>['required', new Math],
       ]);
    //    dd($user);
      
       Mail::to($user->email)->send(new PublicForm($request->firstname,$request->lastname,$request->email,$request->question));
       Mail::to($request->email)->send(new UserForm($request->firstname,$request->lastname,$request->email,$request->question));
       return back()->with('success','Email has succesfully been sent');
    }

    public function about()
    {
        SEOMeta::setTitle('About - WebField Design');
        SEOMeta::setDescription('About webfield design');
        return view('pages.about');
    }

    public function web_design()
    {
        SEOMeta::setTitle('WebDesign - WebField Design');
        SEOMeta::setDescription("Beautiful and clean designs that provies greate ease of use");
        return view('pages.webdesign');
    }

    public function web_apps()
    {
        SEOMeta::setTitle('WebDesign - WebField Design');
        SEOMeta::setDescription("Beautiful and clean designs that provies greate ease of use");
        return view('pages.webapp');
    }

    public function portfolio()
    {
        SEOMeta::setTitle('Portfolio - WebField Design');
        SEOMeta::setDescription("Beautiful and clean designs that provies greate ease of use");
        return view('pages.portfolio');
    }
    public function webdevelopment()
    {
        SEOMeta::setTitle('WebDevelopement - WebField Design');
        SEOMeta::setDescription("Beautiful and clean designs that provies greate ease of use");
        return view('pages.webdevelopment');
    }
}
