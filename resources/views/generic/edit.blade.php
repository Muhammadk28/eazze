@extends('master')

    
@section('content')
<?php
$user_name =  Session::get('user_name');
$user_id = Session::get('user_id');
$user_type = Session::get('user_type');
   if($user_type =='admin') {?>

<form method="post" action="{{URL('/generic-update',$show->generic_id)}}" autocomplete="off">
    {{ csrf_field() }}
   
    <?php $messege = Session::get('messege');
        if($messege){   
    ?>
    <p class="col-md-6 bg-success text-white p-3"><?php echo $messege;?></p>
    <?php Session::put('messege', null); }?>
    <div class="card col-md-6 mx-auto">
        <div class="card-header bg-success">
            <h2 class=" text-white mb-4">{{ __('Edit Generic Name') }}</h2>
        </div>
        <div class="card-body">
            <div class=" form-group{{ $errors->has('generic_name') ? ' has-danger' : '' }}">
        
                <label class="form-control-label" for="generic_name">{{ __('Generic Name') }}</label>
                <input type="text" value="{{$show->generic_name}}" name="generic_name"  class="form-control form-control-alternative{{ $errors->has('generic_name') ? ' is-invalid' : '' }}" placeholder="{{ __('generic Name') }}"  required >
    
               
            </div>
             

            <input type="submit" value="Edit" class="btn btn-success">
        </div>
    </div>
   

    
</form>
<?php } else{
    header("Location: /erorr404", true, 301);
 exit();
 } ?>
@endsection