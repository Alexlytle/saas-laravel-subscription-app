<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserDashboardSupportMail;
use App\Mail\UserDashboardSupportAdminEmail;


class DashBoardController extends Controller
{
    //
    public function index()
{
     
        if(Auth::user()->id == 1){
            return view('backend.admin.index');
        }else{
            return view('dashboard.index');
        }
    }

    public function show_plan($id)
    {   
        if(Auth::user()->id  == $id){
            // $plans = Plan::where('user_id',$id)->get();
            $user = User::find($id);
            $plans = $user->plans;
            return view('dashboard.plans',compact('plans'));
        }else{
            return abort('404');
        }
     
    }

    public function show_invoices($id)
    {   
        if(Auth::user()->id == $id){
            $user = User::find($id);
            $invoices = $user->invoices();

            // dd($invoices);
            return view('dashboard.invoice',compact('invoices'));
        }else{
            return abort('404');
        }
     
    }

    public function update_payment($id)
    {
        if(Auth::user()->id == $id){
            $user = User::find($id);
            $plans = $user->plans;
            
            return view('dashboard.update-plan',compact('plans'));
        }else{
            return abort('404');
        }
    }
    public function show_profile($id)
    {
        if(Auth::user()->id == $id){
            $user = User::find($id);
            return view('dashboard.update-profile');
        }else{
            return abort('404');
        }
        
    }
    public function show_support($id)
    {
      
        if(Auth::user()->id == $id){
            return view('dashboard.support');
        }else{
            return abort('404');
        }
    }

    public function show_subscriptions($id)
    {
        if(Auth::user()->id == $id){
            
            $user = User::find($id);
        
            $subscriptions = Subscription::where('user_id',$user->id)->get(); 
            // dd($subscriptions);
            
            return view('dashboard.subscriptions',compact('subscriptions'));

        }else{

            return abort('404');
   
        }
    }

    public function send_support_email(User $user,Request $request)
    {
        // dd($user->email);

        $this->validate($request,[
            'question'=>'required|max:30'
        ]);

        $name  = auth()->user()->name;
        $user = User::find(1);
        // Mail::to($user->email)->send(new UserDashboardSupportMail($request->question,$user->email));
        Mail::to('alex.joe.lytle@gmail.com')->send(new UserDashboardSupportAdminEmail($request->question,$user->email,$name ));

        return back()->with('success','Your message has been sent');
    }


}


