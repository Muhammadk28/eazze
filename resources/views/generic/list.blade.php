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
            <h1>List  Generic Name</h1>
        </div>
        @if (!count($shows) )
            <div class="container">
                <h2 class="my-5">No Generic Name Found!!</h2>
            </div>
        @endif

        @if(count($shows))
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Generic Name</th>
                        <?php 
                                $user_name =  Session::get('user_name');
                                 $user_id = Session::get('user_id');
                                 $user_type = Session::get('user_type');
                                if($user_type =='admin') {
                        ?>
                    <th>Action</th>
                    <?php }?>
                </thead>
                <tbody>
                    @foreach ($shows as $show)
                        <tr>
                            <td>{{$show->generic_id}}</td>
                            <td>{{$show->generic_name}}</td>
                            <?php 
                                $user_name =  Session::get('user_name');
                                 $user_id = Session::get('user_id');
                                 $user_type = Session::get('user_type');
                                if($user_type =='admin') {?>
                            <td>
                                <a class="btn btn-info" href="{{URL::to('/generic-edit/'.$show->generic_id)}}">{{__('Edit')}}</a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{{URL::to('/generic-delete/'.$show->generic_id)}}">{{__('Delete')}}</a>
                            </td> <?php }?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

@endsection