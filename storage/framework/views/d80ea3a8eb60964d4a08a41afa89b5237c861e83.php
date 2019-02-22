<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Forum')); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    
    <link href="<?php echo e(asset('css/hover-min.css')); ?>" rel="stylesheet">
    <!-- Styles -->
    <?php if(getenv('APP_ENV') == 'production'): ?>
        <link href="<?php echo e(secure_asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(secure_asset('css/main.css')); ?>" rel="stylesheet">
       
        <!-- <link href="<?php echo e(asset('sass/app.scss')); ?>" rel="stylesheet"> -->

    <?php else: ?>
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
        <!-- <link href="<?php echo e(asset('sass/app.scss')); ?>" rel="stylesheet"> -->
    <?php endif; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-left",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "10000",
            "timeOut": 0,
            "extendedTimeOut": 0,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false
            }
    </script>
    <script>
        window.App = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
            'users' => App\User::where('role_id' , 2)->pluck('name')->toArray(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app">
        <?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        
        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <!-- Scripts -->
    
    <?php if(getenv('APP_ENV') == 'production'): ?>
        <script src="<?php echo e(secure_asset('js/app.js')); ?>"></script>
    <?php else: ?>
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php endif; ?>
    
    <script language="javascript">
            function changeImage() {
                // document.getElementById("user-img").src = document.getElementById("display_img").value;
            }
            </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#user-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#display_img").change(function(){
            readURL(this);
        });
    </script>
   <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#thread-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#thread_img").change(function(){
            readURL(this);
        });
    </script>
</body>
</html>
