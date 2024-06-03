<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|login</title>
     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <!-- Theme style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <div class="container">
    <div class="col-left">
      <div class="login-text">
        <h2>Welcome Back</h2>
      </div>
    </div>
    <div class="col-right">
      <div class="login-form">
        <h2>Login</h2>
        <form action="{{ url('/loginchek')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label>Email<span>*</span></label>
            <input type="text" placeholder="Username or Email" name="email" >
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
          </div>
          <div class="form-group">
            <label>Password<span>*</span></label>
            <input type="password" placeholder="Password" name="password" >
            <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
            </span>
          </div>
          <div>
            <input type="submit" value="Sing In" />
          </div>
        </form>
      </div>
    </div>
  </div>
  
</div>


  <!-- cdn scripts -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>  

  @if(Session::has('success'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
            "showMethod": "slideDown",
            "hideMethod": "slideUp",
        }
        toastr.success("<span style='font-size:13px;'>{{ Session::get('success') }}" ,{timeOut:12000});
    </script>
    @elseif(Session::has('error'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.error("{{ Session::get('error') }}" ,{timeOut:12000});
    </script>
    @endif
    

</body>
</html>