@extends('master')

@section('content')
<?php
$user_name =  Session::get('user_name');
$user_id = Session::get('user_id');
$user_type = Session::get('user_type');
   if($user_type =='admin') {?>


<form action="/add_user" method="post" autocomplete="off">
        {{csrf_field()}}
    <div class="col-md-6 mx-auto " style="margin-top:125px">
        <div class="card">
            <div class="card-header">
                <h1>Add User Details</h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="user_name">User Name:</label>
                    <input type="text" name="user_name" required placeholder="example: Ashikur Rahman" class="form-control form-control-alternative{{ $errors->has('user_name') ? ' is-invalid' : '' }}">
                    @if ($errors->has('user_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('user_name') }}</strong>
                        </span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="user_email">User Email:</label>
                    <input type="email" name="user_email" placeholder="example:joe@eazze.com" required class="form-control form-control-alternative{{ $errors->has('user_email') ? ' is-invalid' : '' }}">
                    @if ($errors->has('user_email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('user_email') }}</strong>
                        </span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="user_phone">Phone Number:</label>
                    <input type="text" name="user_phone" placeholder="+880xxxxxxxxxx" required class="form-control form-control-alternative{{ $errors->has('user_phone') ? ' is-invalid' : '' }}">
                    @if ($errors->has('user_phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('user_phone') }}</strong>
                        </span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="user_password">Password:</label>
                    <input type="password" name="user_password" placeholder="type minimum 8 charecter password" required class="form-control form-control-alternative{{ $errors->has('user_password') ? ' is-invalid' : '' }}">
                    @if ($errors->has('user_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('user_password') }}</strong>
                        </span>
                     @endif
                </div>
                
                <input type="submit" class="btn btn-success" value="submit">
            </div>
        </div>
    </div>
</form>

<?php } else{
   header("Location: /erorr404", true, 301);
exit();
} ?>
@endsection