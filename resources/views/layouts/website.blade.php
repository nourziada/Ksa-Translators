<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png')}}"/>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png')}}"/>
    @include('includes.style')
    <title>{{$title}}</title>
</head>
<body>
<div class="container page-container">
    <div class="page">
        @include('includes.header')
        
        @yield('content')

        @include('includes.footer')
    </div>
</div>


@include('includes.javascript')

   <script>
        toastr.options = {
        "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "100000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            'body-output-type': 'trustedHtml'
        };


        function checkCode(e){
            e.preventDefault(); 
            var coupon = $('#v-code').val();     
            $.ajax({
                url: '/project/coupon/check/' + coupon,
                success: function (response) {

                    if (response.status_wish) {

                        toastr.success(response.message);
                    } else {                                            
                        toastr.error(response.message);
                    }
                                                            
                }
            });
                                    
        }
    </script>

    
</body>
</html>