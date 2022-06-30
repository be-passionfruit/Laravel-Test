<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    //
    public function index()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        //
        $customers = $stripe->customers->all();
        //
        return $customers;
    }

    public function show($id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        //
        $customer = $stripe->customers->retrieve(
            $id,
            []
        );
        //
        return $customer;
    }

    public function create()
    {
        //
    }

    public function store(Request $r)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        //
        $customer = $stripe->customers->create([
            "name" => $r->name,
            "email" => $r->email,
        ]);
        //
        return $customer;
    }

    public function update(Request $r, $id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        //
        $customer = $stripe->customers->update(
            $id,
            [
                "email" => $r->email,
            ]
        );
        //
        return $customer;
    }

    public function edit()
    {
        //
    }

    public function destroy($id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        //
        $customer = $stripe->customers->delete(
            $id,
            []
        );
        //
        return $customer;
    }
}
