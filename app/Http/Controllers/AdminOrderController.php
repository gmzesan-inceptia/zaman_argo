<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Order::query();
            
            return DataTables::of($query)
                ->addColumn('action-btn', function ($order) {
                    return [
                        'id' => $order->id,
                    ];
                })
                ->rawColumns(['action-btn', 'payment_method', 'status'])
                ->make(true);
        }

        $orders = Order::latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'confirmed']);
        
        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order approved successfully!');
    }

    public function reject($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'cancelled']);
        
        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order rejected successfully!');
    }

    public function shipped($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'shipped']);
        
        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order marked as shipped!');
    }

    public function delivered($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'delivered']);
        
        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order marked as delivered!');
    }
}

