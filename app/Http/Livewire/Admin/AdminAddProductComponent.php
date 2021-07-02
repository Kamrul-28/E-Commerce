<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $stock_status;
    public $sale_price;
    public $sku;
    public $stock;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    
    public function mount(){
        $this->stock_status='instock';
        $this->featured=0;
    }

    public function generatesslug(){
        $this->slug=Str::slug($this->name); 
    }

    public function updated($fields){
        $this->validateOnly($fields,
            [
                'name'=>'required',
                'slug'=>'required|unique:categories',
                'short_description'=>'required',
                'description'=>'required',
                'regular_price'=>'required|numeric',
                'sale_price'=>'numeric',
                'sku'=>'required',
                'stock_status'=>'required',
                'quantity'=>'required|numeric',
                'image'=>'required|mimes:jpeg,png',
            ]
            );
    }

    public function storeproduct(){
       
        $this->validate(
            [
                'name'=>'required',
                'slug'=>'required|unique:categories',
                'short_description'=>'required',
                'description'=>'required',
                'regular_price'=>'required|numeric',
                'sale_price'=>'numeric',
                'sku'=>'required',
                'stock_status'=>'required',
                'quantity'=>'required|numeric',
                'image'=>'required|mimes:jpeg,png',
            ]
            );

        $product=new Product();

        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->SKU=$this->sku;
        $product->stock_status=$this->stock_status;
        $product->featured=$this->featured;
        $product->quantity=$this->quantity;
        $product->category_id=$this->category_id;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;

        $product->save();

        session()->flash('message','Product created successfully!');

    }

    public function render()
    {     
        $categories=Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
