<div>
    <div class="container" style="padding:30px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4>All Products</h4></div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addProduct')}}" class="btn btn-success pull-right">Add Product</a>
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
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Regular Price</th>
                            <th>Sale Price</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th> 
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}" width="60"></td>
                                    <td>{{$product->name}}</td>
                                    <th>{{$product->stock_status}}</th>
                                    <th>{{$product->regular_price}}</th>
                                    <th>{{$product->sale_price}}</th>
                                    <th>{{$product->category->name}}</th>
                                    <th>{{$product->created_at}}</th>
                                    <td>
                                        <a href="{{ route('admin.editProduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                       
                                        <a href="" wire:click.prevent="deleteProduct({{$product->id}})" style="margin-left:10px; "><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                      {{$products->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>