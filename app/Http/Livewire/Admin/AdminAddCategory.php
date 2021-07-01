<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Symfony\Contracts\Service\Attribute\Required;

class AdminAddCategory extends Component
{
    public $name;
    public $slug;

    public function generatesslug(){
        $this->slug=Str::slug($this->name); 
    }

    public function updated($fields){
        $this->validateOnly($fields,
            [
                'name'=>'required',
                'slug'=>'required|unique:categories'
            ]
            );
    }

    public function storecategory(){

        $this->validate(
            [
                'name'=>'required',
                'slug'=>'required|unique:categories'
            ]
            );
        $category=new Category();

        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->save();

        session()->flash('message','Category created successfully!');

    }
    public function render()
    {
        return view('livewire.admin.admin-add-category')->layout('layouts.base');
    }
}
