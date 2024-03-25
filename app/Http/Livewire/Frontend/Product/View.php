<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            "category" => $this->category,
            "product" => $this->product
        ]);
    }

    public function colorSelected($productColorId)
    {
        //dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if($this->productColorSelectedQuantity == 0){
            $this->productColorSelectedQuantity = 'outOfStock';
        }
    }

    public function addToWishList($productId)
    {
        //dd($productId);
        if(Auth::check()){

            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()){
                //session()->flash('message','This Product is already added to your Wishlist!');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'This Product is already added to your Wishlist!',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);

                $this->emit('wishlistAddedUpdated');

                //session()->flash('message','This Product is added to your Wishlist Successfully!');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'This Product is added to your Wishlist Successfully!',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else{
            //session()->flash('message','Please login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function decreamentQuantity()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function increamentQuantity()
    {
        if($this->quantityCount < 100){
            $this->quantityCount++;
        }
    }

    public function addToCart(int $productId)
    {
        if(Auth::check()){

            if ($this->product->where('id', $productId)->where('status', '0')->exists())
            {
                //Check for product color quantity and insert to the cart
                if($this->product->productColors()->count() > 1)
                {

                    if($this->productColorSelectedQuantity != NULL)
                    {
                        if(Cart::where('user_id', auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->productColorId)
                                ->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'This product is alredy exist in your cart!',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                        else
                        {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if($productColor->quantity > 0)
                            {
                                if($productColor->quantity >= $this->quantityCount)
                                {

                                    //Insert Product to the Cart with color
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);

                                    $this->emit('CartAddedUpdated');

                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product added to Cart!',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only '.$productColor->quantity.' Quantity Available',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            }else{
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'This color is out of stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select your product color first!',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
                else
                {
                    if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'This product is alredy exist in your cart!',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                    else
                    {
                        if($this->product->quantity > 0)
                        {

                            if($this->product->quantity >= $this->quantityCount)
                            {

                                //Insert Product to the Cart without color
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);

                                $this->emit('CartAddedUpdated');

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product added to Cart!',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$this->product->quantity.' Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'This Product is out of stock!',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exists!',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
}
