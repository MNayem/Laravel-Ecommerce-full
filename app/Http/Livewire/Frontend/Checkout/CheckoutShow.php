<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;

    public $fullname, $phone, $email, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'payForOnlineOrder'
    ];

    public function payForOnlineOrder($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = 'Paid By PayPal';

        $codOrder = $this->placeOrder();

        if($codOrder){

            Cart::where('user_id', auth()->user()->id)->delete();

            session()->flash('message', 'Your Order has been Placed Successfully, we will get back to you soon!');

            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully!',
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('thank-you');
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function validationForAll()
    {
        $this->validate();
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:8|min:4',
            'address' => 'required|string|max:500'
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'Nayem-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_msg' => 'In Progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);

        foreach ($this->carts as $cartItem) {

            $orderItems = OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);

            if($cartItem->product_color_id != NULL){

                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }else{

                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }

        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash On Delivery';

        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id', auth()->user()->id)->delete();

            session()->flash('message', 'Your Order has been Placed Successfully, we will get back to you soon!');

            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully!',
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('thank-you');
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
}
