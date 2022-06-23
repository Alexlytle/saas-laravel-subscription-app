<?php

namespace App\Http\Controllers;

use App\Mail\NewPlanEmail;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() 
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }


    public function index()
    {
        //

        $plans = Plan::all();
        return view('backend.plans-admin.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = User::where('id','!=','1')->get();

        return view('backend.plans-admin.create',compact('users'));
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

        $data = $request->except('_token');

        $this->validate($request, [
            'name' => 'required'
        ]);
        $data['slug'] = strtolower($data['name']);
        $price = $data['cost'] *100; 

        //create stripe product
        $stripeProduct = $this->stripe->products->create([
            'name' => $data['name'],
        ]);
        
        //Stripe Plan Creation
        $stripePlanCreation = $this->stripe->plans->create([
            'amount' => $price,
            'currency' => 'usd',
            'interval' => 'month', //  it can be day,week,month or year
            'product' => $stripeProduct->id,
        ]);

        $data['stripe_plan'] = $stripePlanCreation->id;
    
        $data['user_id'] = $data['user'];
        $data['completed'] ='no';
        $data['stripe_product'] = $stripeProduct->id;
        Plan::create($data);

        $user= User::where('id',$data['user_id'])->get();

        Mail::to($user[0]->email)->send(new NewPlanEmail($data['name'],  number_format($data['cost'], 2) ));
        
        return back()->with('success','plan has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {


        return view('backend.plans-admin.edit',compact('plan'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     
        $plan = Plan::find($id);
       
          $this->stripe->products->update(
             $plan->stripe_product,
             [
                 'name'=>$request->name
             ]
        );

        $this->validate($request, [
            'name' => 'required',
            'description'=>'required'
        ]);
        $plan->update([
            'name' => $request->name,
            'description'=>$request->description
        ]);

        return back()->with('success','Plan has been updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $plan = Plan::find($id);

        $plan->delete();
        // dd($plan);
        // $this->stripe->products->delete($plan->stripe_product,[]);
 
    //    $this->stripe->plans->delete($plan->stripe_product,[]);

        return back()->with('success','product and plans have been deleted');
    }
}
