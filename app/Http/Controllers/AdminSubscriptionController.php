<?php

namespace App\Http\Controllers;

use App\Mail\ChangeSubscriptionPlan;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Mail;

class AdminSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        // dd($users[1]->subscriptions);

        $subscriptions = Subscription::get();

        // dd($subscriptions[0]);
        return view('backend.subscriptions-admin.index',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscription = Subscription::find($id);

        $user = User::find($subscription->user_id);

        // $user->plans;

        return view('backend.subscriptions-admin.edit',['subscription'=>$subscription,'user_plans'=>$user->plans]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $subscription = Subscription::find($id);

        $user = User::find($subscription->user_id);
        
        // $planNumber = explode('|',$request->plans)[1];

        $plan = Plan::where('id',$request->current_plan_id)
                    ->firstOrFail();
  
        // dd(explode('|',$request->plans));

        $user->subscription($subscription->name)->noProrate()->swap(explode('|',$request->plans)[0]);
       

        $plan->update(['name'=>explode('|',$request->plans)[2],'cost'=>explode('|',$request->plans)[3]]);

        Mail::to($user->email)->send(new ChangeSubscriptionPlan($subscription->name));

        return back()->with('success','Plan has been upgraded');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

       
        $subscription = Subscription::find($id);
        $user = User::find($subscription->user_id);
        $user->subscription($subscription->name)->cancel();
        $subscription->delete();
        return back()->with('success','Subscription has been cancelled');
    }
}
