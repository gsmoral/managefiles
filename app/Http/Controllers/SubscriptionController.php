<?php

namespace App\Http\Controllers;

use Auth;
use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Stripe\Stripe;
//use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        if(Auth()->user()) {
            $intent = Auth()->user()->createSetupIntent();
        } 
        
        return view('index', compact('plans', 'intent'));

        //return view('index', compact('plans', 'intent'))->with('success', 'Mensaje de success');
    }

    public function subscriptions()
    {
        $subscriptions = Auth::user()->subscriptions;
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentMethod = $request->payment_method;
        //dd($paymentMethod);
        
        //$subscription = $request->get('plan_type');
        $subscription = $request->plan;
        //dd($subscription);

        //$message = Auth()->user()->newSubscription('main', $subscription)->create($paymentMethod);
        //dd($message);

        try {
            $subscription = Auth()->user()->newSubscription('main', $subscription)->create($paymentMethod);
            Auth()->user()->assignRole('Suscriptor');
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('home')]
            );
        }
        //Auth()->user()->assignRole('Suscriptor');
        //return back()->with('info', ['success', 'Ahora estás suscrito. Saludos desde el contraodor']);
        //return response(['status' => 'success']);

    }
    public function resume()
    {
        $subscription = \request()->user()->subscription(\request('plan_name'));
        //dd($subscription);
        
        if ($subscription->cancelled() && $subscription->onGracePeriod()){
            \request()->user()->subscription(\request('plan_name'))->resume();
            return back()->with('info', ['success', 'La suscripción continuará']);
        }

        return back();

    }
    public function cancel()
    {
        Auth::user()->subscription(\request('plan_name'))->cancel();
        return redirect()->back()->with('info', ['success', 'La suscripción se ha cancelado']);
    }
}
