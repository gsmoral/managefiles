<?php

namespace App\Http\Controllers;

use Auth;
use App\Plan;
use Illuminate\Http\Request;
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
        $paymentMethod = $request->payment_method;
        //dd($paymentMethod);
        
        //$subscription = $request->get('plan_type');
        $subscription = $request->plan;
        //dd($subscription);

        Auth()->user()->newSubscription('main', $subscription)->create($paymentMethod);
        //return back()->with('info', ['success', 'Ahora estás suscrito. Saludos desde el contraodor']);
        //return response(['status' => 'success']);

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
        //
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
        //
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
    }
}
