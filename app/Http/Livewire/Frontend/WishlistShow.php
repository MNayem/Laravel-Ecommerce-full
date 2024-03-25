<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }

    public function removeWishlistItem(int $wishlistId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();

        $this->emit('wishlistAddedUpdated');

        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist Item has been Removed successfully!',
            'type' => 'warning',
            'status' => 409
        ]);
    }
}
