<?php

namespace App\Http\Controllers;

use Auth;
use App\Plan;
use Illuminate\Http\Request;
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
}
