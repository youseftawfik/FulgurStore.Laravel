<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>

  <link rel="stylesheet" href="back/css/themify-icons.css"> 
  <link rel="stylesheet" href="back/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="back/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="back/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="back/css/style.css">

</head>
<body>
    
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <?php
                  $message = Session::get('message'); 
                  $error =  Session::get('error');
                ?>
                @if ($message)
                  <p class="alert alert-success">
                    <?php
                      echo $message;
                      Session::put('message',null);  
                    ?>
                  </p>
                @endif
                @if ($error)
                  <p class="alert alert-danger">
                    <?php
                      echo $error;
                      Session::put('error',null);  
                    ?>
                  </p>
                @endif
              <div class="brand-logo">
                <img src="back/images/profile.png" alt="logo">
              </div>
              <h3 class="font-weight-light">Sign In</h3>
              <br>
                 {!!Form::open(['action' => 'AuthController@login', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'])!!} 
                <fieldset>
                    <div class="form-group">
                      <label for="exampleInputEmail1" style="font-size: 20px">Email</label>
                      <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" style="font-size: 20px">Password</label>
                      <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter your password" name="password">
                    </div>
                    <div class="mt-3">
                        {{Form::submit('LOGIN', ['class' => 'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn'])}}
                    </div>
                    <br>
                    <div class="text-center">If you have an account?
                    <a class="small" href="{{URL::to('/registration')}}">Sign Up</a></div>
                </fieldset>
            {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="back/js/vendor.bundle.base.js"></script>
  <script src="back/js/vendor.bundle.addons.js"></script>
  <script src="back/js/off-canvas.js"></script>
  <script src="back/js/hoverable-collapse.js"></script>
  <script src="back/js/template.js"></script>
  <script src="back/js/settings.js"></script>
  <script src="back/js/todolist.js"></script>
  <script src="back/js/dashboard.js"></script> 
  <script src="back/js/data-table.js"></script>

</body>

</html>
