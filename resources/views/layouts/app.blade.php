<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PAGE TITLE HERE -->
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <!-- Theme style -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
     

    
    
</head>
<body>
    <!-- <div id="wrapper"> -->
    <div class="container-fluid">
        <div class="row">
            @include('layouts.dashboard.sidebar')
        

            <!-- <div class="main-container" > -->
            <div class="col-md-9 col-lg-10 ml-md-auto px-0">
                @include('layouts.dashboard.header')
                <!-- main content -->
                <main class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>


    <!-- Custom JS -->
    <script>
        $(document).ready(function () {
            $('#open-sidebar').click(function () {
                $('#sidebar').toggleClass('d-none');
                $('#sidebar-overlay').toggleClass('d-none');
            });

            $('#sidebar-overlay').click(function () {
                $('#sidebar').addClass('d-none');
                $('#sidebar-overlay').addClass('d-none');
            });

            $('.collapse').on('show.bs.collapse', function () {
                $(this).parent().find('.fas.fa-chevron-down').addClass('rotate-180');
            }).on('hide.bs.collapse', function () { 
                $(this).parent().find('.fas.fa-chevron-down').removeClass('rotate-180');
            });

            //dropdown profileaccount
            $('.admin_content').on('click',function(event){
             event.preventDefault();
                $(this).closest('.header_dropdown').find('.account_dropdown').toggle();
            });  

            $(document).on('click',function(e){
                if($(e.target).closest('.header_dropdown').length === 0){
                    $('.account_dropdown').hide();
                }
            });

        });
    </script>

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
    <!-- <script>
        $(document).ready(function(){
            $('.sidebar_content').on('click',function(event){
                event.preventDefault();
                $(this).closest('.sidebar_header').find('.sidebar_dropdown').toggle();
            });

            $(document).on('click',function(e){
                if($(e.target).closest('.sidebar_header').length === 0){
                    $('.sidebar_dropdown').hide();
                }
            });
        });
    </script> -->
</body>
</html>
