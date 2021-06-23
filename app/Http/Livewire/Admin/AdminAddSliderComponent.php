<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;

    public function mount(){
        $this->status=0;
    }

    public function storeHomeSlider(){
        $slider=new HomeSlider();

        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;
        $slider->status=$this->status;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slides',$imageName);
        $slider->image=$imageName;

        $slider->save();

        session()->flash('message','Slide added successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-slider-component')->layout('layouts.base');
    }
}
