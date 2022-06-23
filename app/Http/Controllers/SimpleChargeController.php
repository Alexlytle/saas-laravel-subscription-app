<?php

namespace App\Http\Controllers;

use App\Mail\NewSingleChargePlan;
use App\Mail\OneTimePaymentConfirmation;
use App\Mail\PlanConfirmationEmail;
use App\Models\User;
use App\Models\SimpleCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SimpleChargeController extends Controller
{

    public function __construct() 
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }

    
    public function hanleSimpleChargePayment(Request $request)
    {
    

        $charge = SimpleCharge::find($request->get('plan'));

        $user = $request->user();
        $paymentMethod = $request->paymentMethod;
//   dd( number_format($charge->cost)*100);
        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->charge(
            number_format($charge->cost)*100,  $request->paymentMethod
        );

        $charge->update([
            'completed'=>'yes'
        ]);
        
        Mail::to($user->email)->send(new OneTimePaymentConfirmation($charge->name, number_format($charge->cost, 2)));
      
        
        return redirect()->route('dashboard')->with('success', 'Your charge is complete');
    }

    public function createSimpleCharge(Request $request)
    {
        # code...
        $this->validate($request, [
            'name' => 'required'
        ]);
        SimpleCharge::create([
            'name'=>$request->name,
            'price'=>$request->price
        ]);



    }

    public function showSimpleCharge(SimpleCharge $simplecharge)
    { 
        //  dd($simplecharge);

        $charges = SimpleCharge::where('user_id',$simplecharge->user_id)->get();
      
        return view('dashboard.singlecharge',['charges'=>$charges]);

    }

    public function showSimpleChargeAdmin()
    {
        $charges = SimpleCharge::get();

        return view('backend.charge-admin.index',compact('charges'));
    }

    public function createSimpleChargeAdmin()
    {

        $users = User::where('id','!=','1')->get();

        return view('backend.charge-admin.create',compact('users'));
    }

    public function storeSimpleCharge(Request $request)
    {
    //   dd($request->payment_name);

        // $this->validate($request,[
        //     'payment_name'=>'required',
        //     'cost'=>'required',
        //     'description'=>'required',
        //     'user_id'=>'required',
        //     'stripe_product'=>'required',
        //     'completed'=>'required'
        // ]);

        $stripeProduct = $this->stripe->products->create([
            'name' => $request->payment_name,
        ]);
        
        SimpleCharge::create([
            'name'=>$request->payment_name,
            'slug'=>$request->payment_name,
            'cost'=>$request->cost,
            'description'=>$request->description,
            'user_id'=>$request->user,
            'completed'=> 'no',
            'stripe_product'=> $stripeProduct->id
        ]);

        $user = User::where('id',$request->user)->get();

        Mail::to($user[0]->email)->send(new NewSingleChargePlan($request->description, number_format($request->cost, 2)));

        return back()->with('success','You created a new single charge');

    } 

    public function storeSimpleChargeEdit(SimpleCharge $charge)
    {
        // dd($charge);
        return view('backend.charge-admin.edit',compact('charge'));
    }

    public function storeSimpleChargeUpdate(SimpleCharge $charge,Request $request)
    {
     
        $charge->update([
            'name'=> $request->name,
            'description'=>$request->description,
            'cost'=>$request->cost
        ]);
     
        return back()->with('success','Single Charge Has been updated');
    }   

    public function storeSimpleChargeDelete(SimpleCharge $charge)
    {
        $charge->delete();
        return back()->with('success','Item has been deleted');
    }

    public function chargeShow(SimpleCharge $simplecharge, Request $request)
    {   
        
        $paymentMethods = $request->user()->paymentMethods();

        $intent = $request->user()->createSetupIntent();
           
        return view('plans.single', ['plan'=>$simplecharge,'intent'=>$intent]);
    }

    
}
