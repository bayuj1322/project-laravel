<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield("title") | {{config("app.name")}}
    </title>
    <link rel="stylesheet" href="{{config('app.url')}}/assets/css/auth.css" />
    <link rel="stylesheet" href="{{config('app.url')}}/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" />
    <script type="text/javascript" src="{{config('app.url')}}/assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid container-auth">
        <div class="row w-100">
            @yield("content")
        </div>
    </div>
    <script type="text/javascript">
        $("body").on("focus", "input, iframe", function() {
            $(".auth-text").html("");
        });

        function ShowPassword() {
            var input = $('input[name="password"], input[name="password_confirmation"]');
            if (input.attr('type') == "password") {
                $("span i").removeClass("ri-eye-off-line").addClass("ri-eye-line");
                input.attr("type", "text");
            } else {
                $("span i").removeClass("ri-eye-line").addClass("ri-eye-off-line");
                input.attr("type", "password");
            }
        }
    </script>
</body>

</html>