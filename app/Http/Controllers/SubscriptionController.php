<?php

namespace App\Http\Controllers;


use App\Models\Plan;
use App\Models\User;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Mail\PlanConfirmationEmail;
use Illuminate\Support\Facades\Mail;


class SubscriptionController extends Controller
{   
    protected $stripe;

    public function __construct() 
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }

    public function create(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));
    
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;
    // dd($paymentMethod);
        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription( $plan->name .'|'.time(), $plan->stripe_plan)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);

            
            $plan->update([
                'completed'=>'yes'
            ]);

         Mail::to($user->email)->send(new PlanConfirmationEmail($plan->name,$plan->cost));
            
        
        return redirect()->route('dashboard')->with('success', 'Your plan subscribed successfully');
    }


    public function createPlan()
    {
        $users = User::get();
        
        return view('plans.create',compact('users'));
    }

    public function storePlan(Request $request)
    {   
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

        echo 'plan has been created';
    }
    public function update(Request $request)
    {

    
        $user = $request->user();
        // dd($user);
        $paymentMethod = $request->paymentMethod;
        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
     

        return redirect()->route('dashboard')->with('success', 'You have added a new payment method to this plan');
    }

    


}