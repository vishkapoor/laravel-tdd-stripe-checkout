<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayContract;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    private $payment;

    public function __construct(PaymentGatewayContract $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $cart = session('cart');

        $this->payment->charge($cart->total(), $request->stripeToken);

        $order = Order::create([
            'email' => $request->stripeEmail,
            'total' => $this->payment->total(),
            'user_id' => 0,
        ]);

        $order->addProducts($cart->items);

        return redirect('/orders/' . $order->id);

    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load('products');

        return view('orders.show', compact('order'));
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
