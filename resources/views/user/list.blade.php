@extends('master')
@section('content')
<?php
$user_name =  Session::get('user_name');
$user_id = Session::get('user_id');
$user_type = Session::get('user_type');
   if($user_type =='admin') {?>
        <?php 
            $messege = Session::get('messege');
            if($messege){  
        ?>
        <p class="col-md-4 bg-success text-white p-3"><?php echo $messege;?></p>
        <?php Session::put('messege', null); }?>
    <div class="card">
        <div class="card-header">
            <h1>List User</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>User Type</th>
                   
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($shows as $show)
                        <tr>
                            <td>{{$show->user_id}}</td>
                            <td>{{$show->user_name}}</td>
                            <td>{{$show->user_email}}</td>
                            <td>{{$show->user_phone}}</td>
                            <td>{{$show->user_type}}</td>
                            
                            <td>
                                <a class="btn btn-info" href="{{URL::to('/user_edit/'.$show->user_id)}}">{{__('Edit')}}</a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{{URL::to('/user_delete/'.$show->user_id)}}">{{__('Delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <?php } else{
        header("Location: /erorr404", true, 301);
     exit();
     } ?>
@endsection