<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/app.js" charset="utf-8"></script>

    <!-- Styles -->
    <style>

        .nav-color {
            background-color: #4fef80;
        }

        .color-white {
            color: #fff;
        }
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            /* Margin bottom by footer height */
            margin-bottom: 80px;
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
        }
        footer {
            position: absolute;
            bottom: 0px;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 80px;
            background-color: #f5f5f5;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
        }

    </style>
</head>
<body>

    @yield('navbar')

    <div class="text-left mx-lg-5">
        <div class="px-lg-5">
         <div class="p-1">
              @yield('content')
         </div>
        </div>
    </div>

</body>

@yield('footer')

</html>