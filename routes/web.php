<?php

use App\Models\User;
use Stripe\StripeClient;
use App\Models\SimpleCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\UserDashboardSupportMail;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\SimpleChargeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardPlanController;
use App\Http\Controllers\AdminSubscriptionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [PageController::class,'home'])->name('home_page');
Route::get('/logo', [PageController::class,'logo'])->name('logo_page');
Route::get('/contact', [PageController::class,'contact'])->name('contact_page');
Route::get('/about', [PageController::class,'about'])->name('about_page');
Route::get('/web-design', [PageController::class,'web_design'])->name('web_design');
Route::get('/web-apps', [PageController::class,'web_apps'])->name('web_apps');
Route::get('/portfolio', [PageController::class,'portfolio'])->name('portfolio');

Route::get('/webdevelopment', [PageController::class,'webdevelopment'])->name('webdevelopment');

Route::post('/public/email',[PageController::class,'public_email'])->name('public_email');


// Route::get('/golfing', function(){
//     dd('hello');
// });


Route::get('/user/invoice/{invoice}', function (Request $request, $invoiceId) {
    return $request->user()->downloadInvoice($invoiceId, [
        'vendor' => 'Your Company',
        'product' => 'Your Product',
    ]);
});



Route::group(['middleware' => 'verified'], function() {

    Route::get('/dashboard', [DashBoardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/subscriptions/{id}', [DashBoardController::class,'show_subscriptions'])->name('show_subscriptions');
    Route::get('/dashboard/plan/{id}', [DashBoardController::class,'show_plan'])->name('show_plan');
    Route::get('/dashboard/invoice/{id}', [DashBoardController::class,'show_invoices'])->name('show_invoices');
    Route::get('/dashboard/payment/{id}', [DashBoardController::class,'update_payment'])->name('update_payment');
    Route::get('/dashboard/profile/{id}', [DashBoardController::class,'show_profile'])->name('show_profile');
    Route::get('/dashboard/support/{id}', [DashBoardController::class,'show_support'])->name('show_support');

    Route::post('/dashboard/mail/{user}', [DashBoardController::class,'send_support_email'])->name('send_support_email');


    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/plans', [PlanController::class,'index'])->name('plans.index');
    Route::get('/plan/{plan}',  [PlanController::class,'show'])->name('plans.show');

    Route::get('/charge/{simplecharge:name}',  [SimpleChargeController::class,'chargeShow'])->name('charge.show');
    Route::get('/plan/update/{plan:name}',  [PlanController::class,'update'])->name('frontend.plans.update');
    Route::post('/subscription', [SubscriptionController::class,'create'])->name('frontend.subscription.create');
    Route::post('/subscription/update', [SubscriptionController::class,'update'])->name('frontend.subscription.update');
    //Routes for create Plan
    Route::get('create/plan',  [SubscriptionController::class,'createPlan'])->name('create.plan');
    Route::post('store/plan',  [SubscriptionController::class,'storePlan'])->name('store.plan');

    Route::get('/home', function(){return view('home');})->name('home');

    Route::post('/dashboard/singlecharge/charge',[SimpleChargeController::class,'hanleSimpleChargePayment'])->name('hanleSimpleChargePayment');
    
    Route::get('/singlecharge/{simplecharge}/show',function($id){

        if(Auth::user()->id  == $id){

            $charges = SimpleCharge::where('user_id',$id)->get();
            return view('dashboard.singlecharge',['charges'=>$charges]);

        }else{
            return abort('404');
        }
     
    })->name('showSimpleCharge');

    
});


Route::group(['prefix' => 'admin/dashboard','middleware'=>'admin'], function () {

    Route::get('/', function () {
        return view('backend.admin.index');
    })->name('adminhome');
 
    Route::resource('/user', UserDashboard::class);
    Route::resource('/plan', DashboardPlanController::class);

    Route::resource('/subscription', AdminSubscriptionController::class);

    Route::get('/singlecharge',[SimpleChargeController::class,'showSimpleChargeAdmin'])->name('showSimpleChargeAdmin');

    Route::get('/singlecharge/create',[SimpleChargeController::class,'createSimpleChargeAdmin'])->name('createSimpleChargeAdmin');

    Route::post('/singlecharge/store',[SimpleChargeController::class,'storeSimpleCharge'])->name('storeSimpleCharge');

    Route::get('/singlecharge/edit/{charge}',[SimpleChargeController::class,'storeSimpleChargeEdit'])->name('storeSimpleChargeEdit');

    Route::put('/singlecharge/update/{charge:id}',[SimpleChargeController::class,'storeSimpleChargeUpdate'])->name('storeSimpleChargeUpdate');

    Route::delete('/singlecharge/delete/{charge:id}',[SimpleChargeController::class,'storeSimpleChargeDelete'])->name('storeSimpleChargeDelete');
});


Route::get('/google/login', [SocialLoginController::class,'googleRedirect']);
Route::get('/google/callback', [SocialLoginController::class,'loginWithGoogle']);

Route::get('auth/facebook', [SocialLoginController::class ,'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialLoginController::class,'loginWithFacebook']);

