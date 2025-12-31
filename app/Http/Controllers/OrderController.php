<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        try {
            $shippingCharge = 100; // Global shipping charge
            $totalPrice = ($request->quantity * $request->product_price) + $shippingCharge;
            
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'product_title' => $request->product_title,
                'quantity' => $request->quantity,
                'total_price' => $totalPrice,
                'note' => $request->note,
                'payment_method' => $request->payment_method,
                'manual_number' => $request->manual_number,
                'transaction_id' => $request->transaction_id,
                'status' => 'pending',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully! We will contact you soon.',
                'order_id' => $order->id,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to place order. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
