<div>
    <div class="container" style="padding:30px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">     
                    Manage Home Categories
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                         <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                        <div class="form-group">
                            <label for="categories" class="col-md-4">Choose Categories</label>
                            <div class="col-md-4" wire:ignore>
                                <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="categories" class="col-md-4">No Of Products</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" wire:model="number_of_products"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categories" class="col-md-4"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change',function(e){
                var data = $('.sel_categories').select2('val');
                @this.set('selected_categories',data);
            });
        });
    </script>
@endpush