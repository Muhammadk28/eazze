@extends('master')


@section('content')
        <?php 
            $messege = Session::get('message');
            if($messege){   
        ?>
        <p class="col-md-12 bg-danger text-white p-3">
            <?php echo $messege;?>
        </p>
        <?php Session::put('message', null); }?>
    <div class="col-md-12 mt-5 mb-5 d-flex">
        <div class="col-md-6 float-left"><h5>Welcome: <Span class="text-success">{{Session::get('user_name')}}</Span></h5></div>
        <div class=" offset-md-3 col-md-3 text-right"><h5>Total Product: <Span class="text-success">{{$count}}</Span></h5></div>
    </div>
    
    <div class="col-md-12 d-flex my-5">
        <div class="filter col-md-4">
            <form action="/user_search">
                <div class="">
                    <input type="text" name="user" style="width:90%; height:45px" class="form-control">
                    <input type="submit" class="btn btn-success mt-2" value="Filter By User">
                </div>
            </form>
        </div>
        <div class="filter col-md-4">
            <form action="/generic_search" >
                <div class="input-group">
                    <input type="text" name="generic" class="form-control " style="width:90%; height:45px">
                    <input type="submit" class="btn btn-success mt-2" value="Filter By Generic">
                </div>
            </form>
        </div>
        <div class="filter col-md-4">
            <form action="/manufacturer_search" >
                <div class="input-group">
                    <input type="text" name="manufacturer" style="width:90%; height:45px"  class="form-control">
                    <input type="submit" class="btn btn-success mt-2" value="Filter By Manufacturer">
                </div>
            </form>
        </div>
    </div>
    
            <?php 
            $messege = Session::get('messege');
            if($messege){   
            ?>

            <p class="col-md-4 bg-success text-white p-3">
                <?php echo $messege;?>
            </p>
            <?php Session::put('messege', null); }?>
        @if (!count($shows) )
            <div class="container">
                <h2 class="my-5">No Brand Found!!</h2>
            </div>
        @endif

        @if(count($shows))
    <div class="card">
        
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                   
                    <th>Brand Name</th>
                    <th>Generic Name</th>
                    <th>Manufacturer</th>
                    <th>User</th>
                    <th>MRP/Unit</th>
                   <?php 
                                $user_name =  Session::get('user_name');
                                 $user_id = Session::get('user_id');
                                 $user_type = Session::get('user_type');
                                if($user_type =='admin') {?>
                    <th>Action</th>
                    <?php } ?>
                </thead>
                <tbody>
                    @foreach ($shows as $show)
                        <tr>
                           
                            <td>{{$show->brand_name}}</td>
                            <td>
                                <?php
                                    $generic_id = $show->generic_id;
                                    $generic = App\Generic::where('generic_id', $generic_id)->first();
                                    $generic_name = $generic->generic_name;
                                    echo $generic_name;
                                ?>
                            </td>
                            <td><?php
                                $man_id = $show->man_id;
                                $man = App\Manufacturer::where('man_id', $man_id)->first();
                                $man_name = $man->man_name;
                                echo $man_name;
                            ?></td>
                            <td><?php
                                $user_id = $show->user_id;
                                $user = App\Peopls::where('user_id', $user_id)->first();
                                $user_name = $user->user_name;
                                echo $user_name;
                            ?></td>
                            <td>{{$show->price}}</td>
                           <?php 
                                $user_name =  Session::get('user_name');
                                 $user_id = Session::get('user_id');
                                 $user_type = Session::get('user_type');
                                if($user_type =='admin') {?>
                            
                            <td>
                                <a class="btn btn-info" href="{{URL::to('/medicine-edit/'.$show->brand_id)}}">{{__('Edit')}}</a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{{URL::to('/medicine-delete/'.$show->brand_id)}}">{{__('Delete')}}</a>
                            </td>
                            <?php } ?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    @endif

@endsection