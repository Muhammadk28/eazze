<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ezzepro | Login</title>
    <link rel="icon" href="{{asset('front/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

</head>
<body class="">

    <div class="col-md-5 col-sm-12 mx-auto" style="margin-top:150px">
    <?php 
    $messege = Session::get('messege');
    if($messege){   
    ?>

    <p class="col-md-12 bg-danger text-white p-3">
        <?php echo $messege;?>
    </p>
    <?php Session::put('messege', null); }?>
        <div class="card bg-white">
            <div class="card-header bg-danger">
                <h1 class="text-white text-center">Login</h1>
            </div>
            <div class="card-body">
                <form action="/sign_in" method="post">
                    {{ csrf_field()}}
                    <div class="form-group">
                      <label for="user_email">Email Name</label>
                      <input type="email" name="user_email" id="" class="form-control form-control-alternative{{ $errors->has('user_email') ? ' is-invalid' : '' }}" placeholder="enter your email name">
                      @if ($errors->has('user_email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('user_email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="user_password">Password</label>
                      <input type="password" name="user_password" id="" class="form-control form-control-alternative{{ $errors->has('user_password') ? ' is-invalid' : '' }}" placeholder="enter your password" >
                        @if ($errors->has('user_password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user_password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <input type="submit" class="btn btn-success" value="Login">
                </form>
            </div>
            
        </div>

    </div>
    
</body>
</html>