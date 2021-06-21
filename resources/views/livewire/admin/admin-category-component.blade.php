<div>
    <div class="container" style="padding:30px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4>All Categories</h4></div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addCategory')}}" class="btn btn-success pull-right">Add Category</a>
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
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Action</th> 
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <a href="{{ route('admin.editCategory',['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                       
                                        <a href="" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left:10px; "><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                      {{$categories->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>