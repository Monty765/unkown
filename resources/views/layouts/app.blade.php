<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/grid_horizontal_buttons_100.css" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.prettyPhoto.js" charset="utf-8"></script>
        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="js/jquery.func.js"></script>
        <script type="text/javascript" src="js/jquery.thumbGallery.min.js"></script>
        <script type="text/javascript" src="js/jquery.form.min.js"></script>
        <script type="text/javascript">
        
            function thumbGallerySetupDone(){
                //function called when component is ready to receive public function calls
                //console.log('thumbGallerySetupDone');
            }
        
            function detailActivated(){
                //function called when prettyphoto is opened (plus returned item number: i = first level, j = second level)
                //console.log('detailActivated');
            }
            
            function detailClosed(){
                //function called when prettyphoto is closed
                //console.log('detailClosed');
            }
            
            function overThumb(i,j){
                //function called when mouse over thumb holder (plus returned item number: i = first level, j = second level)
                //console.log('overThumb: ', i,' , ', j);
            }
            
            function outThumb(i,j){
                //function called when mouse out thumb holder (plus returned item number: i = first level, j = second level)
                //console.log('outThumb: ', i,' , ', j);
            }
            
            jQuery(document).ready(function($) {
                      
                $('#componentWrapper').thumbGallery({   
                    /* GENERAL */
                    /*layoutType: grid/line */
                    layoutType: 'grid',
                    /*thumbOrientation: horizontal/vertical */
                    thumbOrientation: 'horizontal',
                    /*moveType: scroll/buttons */
                    moveType: 'buttons',
                    /*scrollOffset: how much to move scrollbar and scrolltrack off the content (enter 0 or above) */
                    scrollOffset: 0,
                    
                    /* GRID SETTINGS */
                    /*verticalSpacing:  */
                    verticalSpacing: 10,
                    /*horizontalSpacing:  */
                    horizontalSpacing: 10,
                    /*buttonSpacing: button spacing from the grid itself */
                    buttonSpacing: 10,
                    /*direction: left2right/top2bottom (direction in which boxes are listed) */
                    direction: 'left2right',
                    
                    /* INNER SLIDESHOW */
                    /*innerSlideshowDelay: slideshow delay for inner items in seconds, random value between: 'min, max', 
                    enter both number the same for equal time delay like for example 2 seconds: '2,2' */
                    innerSlideshowDelay:[2,4],
                    /*innerSlideshowOn: autoplay inner slideshow, true/false */
                    innerSlideshowOn:true
                }); 
                
                jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({theme:'pp_default',
                                                deeplinking: false, 
                                                callback: function(){detailClosed();}/* Called when prettyPhoto is closed */}); 
           
           });
        
   
    </script>
</body>
</html>