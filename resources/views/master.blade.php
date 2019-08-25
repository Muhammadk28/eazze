
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ezzepro</title>
    <link rel="icon" href="{{asset('front/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>

<body>
    <div class="main_menu home_menu">
        <header>
            <div class="container-fluid ">
                <div class="row align-items-center bg-primary">
                    <div class="col-lg-12 d-flex">
                        <div class="col-md-2 logo ">
                            <h2>Eazze</h2>
                        </div>
                        <nav class="col-md-10 navbar navbar-expand-lg navbar-light ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Medicines
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/">Add Medicine</a>
                                            <a class="dropdown-item" href="/list-medicine">List Medicine</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Manufacturer
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                            <a class="dropdown-item" href="/add-manufacturer-name">Add Manufacturer</a>
                                            <a class="dropdown-item" href="/list-manufacture">List Manufacturer</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Generics
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_3">
                                            <a class="dropdown-item" href="/add-generic-name">Add Generic</a>
                                            <a class="dropdown-item" href="/list-generic-name">List Generic</a>
                                        </div>
                                    </li>
                                    
                                <?php
                                 $user_name =  Session::get('user_name');
                                 $user_id = Session::get('user_id');
                                 $user_type = Session::get('user_type');
                                    if($user_type =='admin') {?>        
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            User
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                            <a class="dropdown-item" href="/add-user">Add User</a>
                                            <a class="dropdown-item" href="/list-user">List User</a>
                                        </div>
                                    </li>
                                    
                                                
                                <?php } ?>

                                <li class="nav-item">
                                        <a class="nav-link" href="/logout">Logout</a>
                                    </li> 
                                </ul>
                            </div>
                            <a class="btn_2 d-none d-lg-block" href="">HOT LINE- +8801701676666</a>
                        </nav>
                    </div>
                </div>
            
            </div>
        </header>
        <div class="container">
            <div class="row aling-items-center">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
  @yield('script')  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</body>

</html>