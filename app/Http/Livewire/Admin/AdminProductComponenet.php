<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponenet extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product= Product::find($id); 
        $product->delete();

        session()->flash('message','Product has been Deleted!');
    }

    public function render()
    {
        $products=Product::paginate(5);
        return view('livewire.admin.admin-product-componenet',['products'=>$products])->layout("layouts.base");
    }
}
