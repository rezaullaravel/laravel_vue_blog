<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
   <!DOCTYPE HTML>
   <head>
      <title>My blog</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="{{ asset('/') }}frontend/css/style.css" rel="stylesheet" type="text/css" media="all"/>
      <link href='//fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
      <link href='//fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
      <script src="{{ asset('/') }}frontend/js/jquery-1.11.1.min.js"></script>
   </head>
   <body>
      @include('frontend.body.header')
      <!--------------------- Main Content ------------------->

        <div class="wrap">
            <div class="main">
               @yield('main_content')

               <div class="clear"></div>
            </div>
         </div>

      <!--------------------- End Main Content ----------------------------------->
      @include('frontend.body.footer')

      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('/') }}frontend/js/jquery.swipebox.min.js"></script>
      <script type="text/javascript">
         jQuery(function($) {
             $(".swipebox").swipebox();
         });
      </script>
   </body>
   </html>
