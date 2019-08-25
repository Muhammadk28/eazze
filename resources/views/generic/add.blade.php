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


    <form action="/add-generic" method="post">
        {{csrf_field()}}
        <div class="card">
            <div class="card-header">
                <h1>Add Generic Name</h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label style="font-size:18px" for="generic_name">Generic Name:</label>
                    <input type="text" class="form-control mb-2" name="generic_name"  required>
                    <input type="submit" value="submit" class="btn btn-success">
                </div>
               
            </div>
        </div>
    
    
    </form>
</div>
@endsection