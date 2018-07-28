@include('admin.layout.header')

    <div class="wrapper app">
        @include('admin.layout.nav')
        @include('admin.layout.aside')

            @yield('content')

    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#adminuser-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#adminuser").change(function(){
          console.log('hello');
            readURL(this);
        });
    </script>
@include('admin.layout.footer')
