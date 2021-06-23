<div>
    <div class="container" style="padding:30px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4>All Sliders</h4></div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addhomeslider')}}" class="btn btn-success pull-right">Add New Slider</a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-body">
                    @if(Session::has('message'))
                         <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th> 
                            <th>Price</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{$slider->id}}</td>
                                    <td><img src="{{asset('assets/images/slides')}}/{{$slider->image}}" alt="{{$slider->title}}" width="120"></td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->subtitle}}</td>
                                    <td>{{$slider->price}}</td>
                                    <td>{{$slider->link}}</td>
                                    <td>{{$slider->status == 1 ?"Active":"InActive"}}</td>
                                    <td>{{$slider->created_at}}</td>
                                    <td>
                                        <a href="{{ route('admin.edithomeslider',['slide_id'=>$slider->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                       
                                        <a href="" wire:click.prevent="deleteSlider({{$slider->id}})" style="margin-left:10px; "><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                      {{-- {{$sliders->links("pagination::bootstrap-4")}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>