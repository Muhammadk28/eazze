@extends('master')

    
@section('content')
<?php
$user_name =  Session::get('user_name');
$user_id = Session::get('user_id');
$user_type = Session::get('user_type');
   if($user_type =='admin') {?>

<form method="post" action="{{URL('/medicine-update',$show->brand_id)}}" autocomplete="off">
    {{ csrf_field() }}
   
    <?php $messege = Session::get('messege');
        if($messege){   
    ?>
    <p class="col-md-6 bg-success text-white p-3"><?php echo $messege;?></p>
    <?php Session::put('messege', null); }?>
    <div class="card col-md-6 mx-auto">
        <div class="card-header bg-success">
            <h2 class=" text-white mb-4">{{ __('Edit Brand Data') }}</h2>
        </div>
        <div class="card-body">
            <div class=" form-group{{ $errors->has('brand_name') ? ' has-danger' : '' }}">
        
                <label class="form-control-label" for="brand_name">{{ __('Brand Name') }}</label>
                <input type="text" value="{{$show->brand_name}}" name="brand_name"  class="form-control form-control-alternative{{ $errors->has('brand_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Brand Name') }}"  required >
    
               
            </div>
            <div class=" form-group{{ $errors->has('generic_id') ? ' has-danger' : '' }}">
        
                <label class="form-control-label" for="generic_id">{{ __('Generic Name') }}</label>
                <select name="generic_id" id="" class="form-control form-control-alternative{{ $errors->has('generic_id') ? ' is-invalid' : '' }}">
                    <option value="{{$show->generic_id}}">
                        <?php                            
                        $generic_id = $show->generic_id;
                        $generic_name=  DB::table('generics')->where('generic_id',$generic_id)->first();
                        echo $generic_name->generic_name;
                    ?>
                    </option>
                    <option value="">Choose Option</option>
                     @foreach ($generics as $generic )
                    <option value="{{$generic->generic_id}}">{{$generic->generic_name}}</option>

                    @endforeach
                </select>
               
            </div>
            <div class=" form-group{{ $errors->has('man_id') ? ' has-danger' : '' }}">
        
                <label class="form-control-label" for="man_id">{{ __('Manufacturer Name') }}</label>
                <select name="man_id" id="" class="form-control form-control-alternative{{ $errors->has('man_id') ? ' is-invalid' : '' }}">
                    <option value="{{$show->man_id}}">
                        <?php                            
                        $man_id = $show->man_id;
                        $man_name=  DB::table('manufacturers')->where('man_id',$man_id)->first();
                        echo $man_name->man_name;
                    ?>
                    </option>
                    <option value="">Choose Option</option>
                     @foreach ($mans as $man )
                    <option value="{{$man->man_id}}">{{$man->man_name}}</option>

                    @endforeach
                </select>
               
            </div>
            <div class=" form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
        
                <label class="form-control-label" for="Price">{{ __('Price') }}</label>
                <input type="text" value="{{$show->price}}" name="price"  class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('price') }}"  required >
    
               
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