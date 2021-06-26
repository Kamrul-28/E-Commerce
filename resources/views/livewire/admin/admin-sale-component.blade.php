<div>
    <div class="container" style="padding:30px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4>Sale Settings</h4></div>
                    </div>
                </div>
                <div class="panel panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateSale">
                        <div class="form-group">
                            <label for="Status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-4">
                                <select name="" id="" class="form-control" wire:model="status">
                                    <option value="0">InActive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sale_date" class="col-md-4 control-label">Sale Date</label>
                            <div class="col-md-4">
                                <input type="text" id="sale_date" placeholder="YYYY/MM/DD H:M:S" class="form-control imput-md" wire:ignore/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label> 
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
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
        $(function(){
            $('#sale_date').datetimepicker({
                format:'Y-MM-DD h:m:s',
            })
            .on('dp.change',function(ev){
                var data=$('#sale_date').val();
                @this.set('sale_date',data);
            })
        });
    </script>
    
@endpush