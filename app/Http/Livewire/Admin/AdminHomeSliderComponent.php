<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminHomeSliderComponent extends Component
{
    use WithPagination;
    public function deleteSlider($id)
    {
        $homeSlider= HomeSlider::find($id); 
        $homeSlider->delete();

        session()->flash('message','Category has been Deleted!');
    }
    public function render()
    { 
        $sliders=HomeSlider::paginate(4);
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
