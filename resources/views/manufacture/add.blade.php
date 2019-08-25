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
<div class="col-md-6 mx-auto my-5">


    <form action="/add-man" method="post">
        {{csrf_field()}}
        <div class="card">
            <div class="card-header">
                <h1>Add  Manfacture Company</h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label style="font-size:18px" for="man_name"> Manufacture Company Name:</label>
                    <input type="text" class="form-control mb-2" name="man_name" placeholder="Input Manufacture Company Name"  >
                    <input type="submit" value="submit" class="btn btn-success">
                </div>
               
            </div>
        </div>
    
    
    </form>
</div>
@endsection