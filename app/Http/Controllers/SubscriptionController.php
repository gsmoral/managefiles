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
    /* public function __construct(){
        $this->middleware('auth');
    } */
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

    public function indexAdmin(){
        $plans = Plan::all();
        return view('admin.subscriptions.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = Role::all();
        return view('admin.subscriptions.create');
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

    public function storeAdmin(Request $request)
    {
        $plan = Plan::create($request->all());
        return back()->with('info', ['success', 'El plan se ha creado correctamente']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        return view('admin.subscriptions.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('admin.subscriptions.edit', compact('plan'));
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
        $plan = Plan::find($id);
        $plan->update($request->all());

        return back()->with('info', ['success', 'Se han actualizado los datos del plan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id)->delete();

        return back()->with('info', ['success', 'Se ha eliminado el plan']);
    }
}
