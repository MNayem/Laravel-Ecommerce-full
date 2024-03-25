<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        //$todayDate = Carbon::now();
       // $orders = Order::whereDate('created_at', $todayDate)->paginate('10');


        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != NULL, function ($q) use ($request){

                        return $q->whereDate('created_at', $request->date);

                        }, function ($q) use ($todayDate){

                            $q->whereDate('created_at', $todayDate);
                        })
                        ->when($request->status != NULL, function ($q) use ($request){

                            return $q->where('status_msg', $request->status);

                        })
                        ->paginate('10');

        return view('admin.orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if($order){

            return view('admin.orders.view', compact('order'));
        }else{

            return redirect('ordersAdmin')->with('message','No Order Id Found!');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if($order){

            $order->update([
                'status_msg' => $request->order_status
            ]);

            return redirect()->back()->with('message', 'Order Status has been Updated!');
        }else{

            return redirect()->back()->with('message','No Order Id Found!');
        }
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.viewInvoice', compact('order'));
    }

    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);

        $data = [
            'order' => $order
        ];

        $todayDate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.invoice.viewInvoice', $data);
        return $pdf->download('invoice# '.$order->id.'-'.$todayDate.'.pdf');
    }
}
