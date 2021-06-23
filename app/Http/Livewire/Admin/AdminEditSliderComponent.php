<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;
    public $newimage;
    public $slide_id;

    public function mount($slide_id){
        $slides=HomeSlider::where('id',$slide_id)->first();
        $this->title=$slides->title;
        $this->subtitle=$slides->subtitle;
        $this->price=$slides->price;
        $this->link=$slides->link;
        $this->status=$slides->status;
        $this->image=$slides->image;
        $this->slide_id=$slide_id;
        $this->newimage=$slides->newimage;

    }

    public function updateHomeSlider(){
        $slider=HomeSlider::find($this->slide_id);

        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;
        $slider->status=$this->status;
        if($this->newimage){
            $imageName=Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('slides',$imageName);
            $slider->image=$imageName;
        }

        $slider->save();

        session()->flash('message','Slide updated successfully!');
    }
    public function render()
    { 
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.base');
    }
}
