<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
    }

    public function decreseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
    }

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Item has been removed');
    }

    public function destroyAll(){
        Cart::instance('cart')->destroy();
        session()->flash('success_message','All Item has been removed');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
