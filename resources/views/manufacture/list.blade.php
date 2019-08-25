@extends('master')


@section('content')
<?php 
$messege = Session::get('messege');
if($messege){   
?>

<p class="col-md-12 bg-success text-white p-3">
    <?php echo $messege;?>
</p>
<?php Session::put('messege', null); }?>
    <div class="card">
        <div class="card-header">
            <h1>List Manufacture Company</h1>
        </div>
        @if (!count($shows) )
            <div class="container">
                <h2 class="my-5">No Manufacturer Found!!</h2>
            </div>
        @endif

        @if(count($shows))
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Manufacture Company Name</th>
                    <?php 
                                $user_name =  Session::get('user_name');
                                 $user_id = Session::get('user_id');
                                 $user_type = Session::get('user_type');
                                if($user_type =='admin') {?>
                    <th>Action</th>
                    <?php }?>
                </thead>
                <tbody>
                    @foreach ($shows as $show)
                        <tr>
                            <td>{{$show->man_id}}</td>
                            <td>{{$show->man_name}}</td>
                            <?php 
                                $user_name =  Session::get('user_name');
                                 $user_id = Session::get('user_id');
                                 $user_type = Session::get('user_type');
                                if($user_type =='admin') {?>
                            <td>
                                <a class="btn btn-info" href="{{URL::to('/manufacture_edit/'.$show->man_id)}}">{{__('Edit')}}</a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{{URL::to('/manufacture_delete/'.$show->man_id)}}">{{__('Delete')}}</a>
                            </td>
                            <?php }?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

@endsection