@extends('master')

    
@section('content')
<?php
$user_name =  Session::get('user_name');
$user_id = Session::get('user_id');
$user_type = Session::get('user_type');
   if($user_type =='admin') {?>

<form method="post" action="{{URL('/manufacture_update',$show->man_id)}}" autocomplete="off">
    {{ csrf_field() }}
   
    <?php $messege = Session::get('messege');
        if($messege){   
    ?>
    <p class="col-md-12 bg-success text-white p-3"><?php echo $messege;?></p>
    <?php Session::put('messege', null); }?>
    <div class="card col-md-6 mx-auto">
        <div class="card-header bg-success">
            <h2 class=" text-white mb-4">{{ __('Edit Manufacture Company') }}</h2>
        </div>
        <div class="card-body">
            <div class=" form-group{{ $errors->has('man_name') ? ' has-danger' : '' }}">
        
                <label class="form-control-label" for="man_name">{{ __('Manufacturer Name') }}</label>
                <input type="text" value="{{$show->man_name}}" name="man_name"  class="form-control form-control-alternative{{ $errors->has('man_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Manufacturer Name') }}"  required >
    
               
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