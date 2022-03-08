<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <!-- CSRF Token -->
    <meta id="token" name="token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'All Exam Corner') }}</title>

    <meta name="description" content="All Exam Corner is an online system that allows you to conduct online test, We Support More than 100 Language. conduct exam like Maths, SSC , Bank , PO , RLY , JEE , JE, etc">
    <meta name="keywords" content="AllExamCorner , ALL, Exam, Corner, ExamPortal, Online Exam, Conduct on line Exam for institution, Android, Coaching, Organization Exam, creative app">
    <meta name="author" content="Sunny Singh Yadav">
      

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.mCustomScrollbar.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/fontawesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://formvalidation.io/vendor/formvalidation/css/formValidation.min.css">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
<script src="//cdn.polyfill.io/v2/polyfill.js"></script>                        

<style>
html {
-ms-touch-action: manipulation;
touch-action: manipulation;
}
.html {
-ms-touch-action: manipulation;
touch-action: manipulation;
}
</style>


<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    showProcessingMessages: false,
    tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] }
  });
</script>
<script type="text/javascript" 
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML">
</script>

<script>

var Preview = {
  delay: 0,        // delay after keystroke before updating
  preview: null,     // filled in by Init below
  buffer: null,      // filled in by Init below
  timeout: null,     // store setTimout id
  mjRunning: false,  // true when MathJax is processing
  mjPending: false,  // true when a typeset has been queued
  oldText: null,     // used to check if an update is needed
  //
  //  Get the preview and buffer DIV's
  //
  Init: function () {
    this.preview = document.getElementById("MathPreview");
    this.buffer = document.getElementById("MathBuffer");
  },
  //
  //  Switch the buffer and preview, and display the right one.
  //  (We use visibility:hidden rather than display:none since
  //  the results of running MathJax are more accurate that way.)
  //
  SwapBuffers: function () {
    var buffer = this.preview, preview = this.buffer;
    this.buffer = buffer; this.preview = preview;
    buffer.style.visibility = "hidden"; buffer.style.position = "absolute";
    preview.style.position = ""; preview.style.visibility = "";
  },
  //
  //  This gets called when a key is pressed in the textarea.
  //  We check if there is already a pending update and clear it if so.
  //  Then set up an update to occur after a small delay (so if more keys
  //    are pressed, the update won't occur until after there has been 
  //    a pause in the typing).
  //  The callback function is set up below, after the Preview object is set up.
  //
  Update: function () {
    if (this.timeout) {clearTimeout(this.timeout)}
    this.timeout = setTimeout(this.callback,this.delay);
  },
  //
  //  Creates the preview and runs MathJax on it.
  //  If MathJax is already trying to render the code, return
  //  If the text hasn't changed, return
  //  Otherwise, indicate that MathJax is running, and start the
  //    typesetting.  After it is done, call PreviewDone.
  //  
  CreatePreview: function () {
    Preview.timeout = null;
    if (this.mjPending) return;
    var text = document.getElementById("MathInput").value;
    if (text === this.oldtext) return;
    if (this.mjRunning) {
      this.mjPending = true;
      MathJax.Hub.Queue(["CreatePreview",this]);
    } else {
      this.buffer.innerHTML = this.oldtext = text;
      this.mjRunning = true;
      MathJax.Hub.Queue(
	["Typeset",MathJax.Hub,this.buffer],
	["PreviewDone",this]
      );
    }
  },
 
  PreviewDone: function () {
    this.mjRunning = this.mjPending = false;
    this.SwapBuffers();
  }
};

Preview.callback = MathJax.Callback(["CreatePreview",Preview]);
Preview.callback.autoReset = true;  // make sure it can run more than once
</script>


<script>
var PreviewA = {
  delayA: 0,         previewA: null,     bufferA: null,      // filled in by Init below
  timeoutA: null,    mjRunningA: false,  mjPendingA: false,  // true when a typeset has been queued
  oldTextA: null,   
 
  InitA: function () {
    this.previewA = document.getElementById("OptionPreview");
    this.bufferA = document.getElementById("OptionBuffer");
  },
  
  SwapBuffersA: function () {
    var bufferA = this.previewA, previewA = this.bufferA;
    this.bufferA = bufferA; this.previewA = previewA;
    bufferA.style.visibility = "hidden"; bufferA.style.position = "absolute";
    previewA.style.position = ""; previewA.style.visibility = "";
  },
 
  UpdateA: function () {
    if (this.timeoutA) {clearTimeout(this.timeoutA)}
    this.timeoutA = setTimeout(this.callback,this.delayA);
  },
   
  CreatePreviewA: function () {
    PreviewA.timeoutA = null;
    if (this.mjPendingA) return;
    var textA = document.getElementById("option_A").value;
    if (textA === this.oldtextA) return;
    if (this.mjRunningA) {
      this.mjPendingA = true;
      MathJax.Hub.Queue(["CreatePreviewA",this]);
    } else {
      this.bufferA.innerHTML = this.oldtextA = textA;
      this.mjRunningA = true;
      MathJax.Hub.Queue(
	["Typeset",MathJax.Hub,this.bufferA],
	["PreviewDoneA",this]
      );
    }
  },
  //
  //  Indicate that MathJax is no longer running,
  //  and swap the buffers to show the results.
  //
  PreviewDoneA: function () {
    this.mjRunningA = this.mjPendingA = false;
    this.SwapBuffersA();
  }
};
//
//  Cache a callback to the CreatePreview action
//
PreviewA.callback = MathJax.Callback(["CreatePreviewA",PreviewA]);
PreviewA.callback.autoReset = true;  // make sure it can run more than once
</script>


<script>
var PreviewB = {
  delayB: 0,         previewB: null,     bufferB: null,      // filled in by Init below
  timeoutB: null,    mjRunningB: false,  mjPendingB: false,  // true when a typeset has been queued
  oldTextB: null,   
 
  InitB: function () {
    this.previewB = document.getElementById("OptionBPreview");
    this.bufferB = document.getElementById("OptionBBuffer");
  },
  
  SwapBuffersB: function () {
    var bufferB = this.previewB, previewB = this.bufferB;
    this.bufferB = bufferB; this.previewB = previewB;
    bufferB.style.visibility = "hidden"; bufferB.style.position = "absolute";
    previewB.style.position = ""; previewB.style.visibility = "";
  },
 
  UpdateB: function () {
    if (this.timeoutB) {clearTimeout(this.timeoutB)}
    this.timeoutB = setTimeout(this.callback,this.delayB);
  },
   
  CreatePreviewB: function () {
    PreviewB.timeoutB = null;
    if (this.mjPendingB) return;
    var textB = document.getElementById("option_B").value;
    if (textB === this.oldtextB) return;
    if (this.mjRunningB) {
      this.mjPendingB = true;
      MathJax.Hub.Queue(["CreatePreviewB",this]);
    } else {
      this.bufferB.innerHTML = this.oldtextB = textB;
      this.mjRunningB = true;
      MathJax.Hub.Queue(
	["Typeset",MathJax.Hub,this.bufferB],
	["PreviewDoneB",this]
      );
    }
  },
  //
  //  Indicate that MathJax is no longer running,
  //  and swap the buffers to show the results.
  //
  PreviewDoneB: function () {
    this.mjRunningB = this.mjPendingB = false;
    this.SwapBuffersB();
  }
};
//
//  Cache a callback to the CreatePreview action
//
PreviewB.callback = MathJax.Callback(["CreatePreviewB",PreviewB]);
PreviewB.callback.autoReset = true;  // make sure it can run more than once
</script>

<script>
var PreviewC = {
  delayC: 0,         previewC: null,     bufferC: null,      // filled in by Init below
  timeoutC: null,    mjRunningC: false,  mjPendingC: false,  // true when a typeset has been queued
  oldTextC: null,   
 
  InitC: function () {
    this.previewC = document.getElementById("OptionCPreview");
    this.bufferC = document.getElementById("OptionCBuffer");
  },
  
  SwapBuffersC: function () {
    var bufferC = this.previewC, previewC = this.bufferC;
    this.bufferC = bufferC; this.previewC = previewC;
    bufferC.style.visibility = "hidden"; bufferC.style.position = "absolute";
    previewC.style.position = ""; previewC.style.visibility = "";
  },
 
  UpdateC: function () {
    if (this.timeoutC) {clearTimeout(this.timeoutC)}
    this.timeoutC = setTimeout(this.callback,this.delayC);
  },
   
  CreatePreviewC: function () {
    PreviewC.timeoutC = null;
    if (this.mjPendingC) return;
    var textC = document.getElementById("option_C").value;
    if (textC === this.oldtextC) return;
    if (this.mjRunningC) {
      this.mjPendingC = true;
      MathJax.Hub.Queue(["CreatePreviewC",this]);
    } else {
      this.bufferC.innerHTML = this.oldtextC = textC;
      this.mjRunningC = true;
      MathJax.Hub.Queue(
	["Typeset",MathJax.Hub,this.bufferC],
	["PreviewDoneC",this]
      );
    }
  },
  //
  //  Indicate that MathJax is no longer running,
  //  and swap the buffers to show the results.
  //
  PreviewDoneC: function () {
    this.mjRunningC = this.mjPendingC = false;
    this.SwapBuffersC();
  }
};
//
//  Cache a callback to the CreatePreview action
//
PreviewC.callback = MathJax.Callback(["CreatePreviewC",PreviewC]);
PreviewC.callback.autoReset = true;  // make sure it can run more than once
</script>



<script>
var PreviewD = {
  delayD: 0,         previewD: null,     bufferD: null,      // filled in by Init below
  timeoutD: null,    mjRunningD: false,  mjPendingD: false,  // true when a typeset has been queued
  oldTextD: null,   
 
  InitD: function () {
    this.previewD = document.getElementById("OptionDPreview");
    this.bufferD = document.getElementById("OptionDBuffer");
  },
  
  SwapBuffersD: function () {
    var bufferD = this.previewD, previewD = this.bufferD;
    this.bufferD = bufferD; this.previewD = previewD;
    bufferD.style.visibility = "hidden"; bufferD.style.position = "absolute";
    previewD.style.position = ""; previewD.style.visibility = "";
  },
 
  UpdateD: function () {
    if (this.timeoutD) {clearTimeout(this.timeoutD)}
    this.timeoutD = setTimeout(this.callback,this.delayD);
  },
   
  CreatePreviewD: function () {
    PreviewD.timeoutD = null;
    if (this.mjPendingD) return;
    var textD = document.getElementById("option_D").value;
    if (textD === this.oldtextD) return;
    if (this.mjRunningD) {
      this.mjPendingD = true;
      MathJax.Hub.Queue(["CreatePreviewD",this]);
    } else {
      this.bufferD.innerHTML = this.oldtextD = textD;
      this.mjRunningD = true;
      MathJax.Hub.Queue(
	["Typeset",MathJax.Hub,this.bufferD],
	["PreviewDoneD",this]
      );
    }
  },
  //
  //  Indicate that MathJax is no longer running,
  //  and swap the buffers to show the results.
  //
  PreviewDoneD: function () {
    this.mjRunningD = this.mjPendingD = false;
    this.SwapBuffersD();
  }
};
//
//  Cache a callback to the CreatePreview action
//
PreviewD.callback = MathJax.Callback(["CreatePreviewD",PreviewD]);
PreviewD.callback.autoReset = true;  // make sure it can run more than once
</script>


<script type="text/javascript">
$(function() {
    $(".chzn-select").chosen();

});
</script>

<style type="text/css">

.chosen-choices {
    border: 1px solid #ccc;
    border-radius: 4px;
    min-height: 34px;
    padding: 6px 12px;
}
.chosenContainer .form-control-feedback {
    /* Adjust feedback icon position */
    right: -15px;
}
.chosenContainer .form-control {
    height: inherit; 
    padding: 0px;
}

.chosen-container{
    min-width: 100% !important;
}

.tableformat {
    width: 60px;
}
</style>

</head>
<body>

    <!-- NAV ------------------------------------------------------------ -->

    <div id="app">
    
    @guest
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container" style="display: block">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'All Exam Corner') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="nav navbar-nav">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="display: block">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('Studentlogout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form4').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form4" action="{{ route('Studentlogout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
  @else  
     <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                      <!--  <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a> -->
                        <a href="#">
                          <!--  <img class="img-fluid" src= '{{ Auth::user()->image }}' alt="Theme-Logo" />  -->
                           All Exam Corner
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-pink"></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <!--<li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="{{ asset('assets/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                    <span>{{ Auth::user()->name }} </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                   <!-- <li>
                                        <a href="#!">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="#">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li>
                                    <li>
                                       
                                        <a href="/Studentlogout"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form5').submit();">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>

                                        <form id="logout-form5" action="/Studentlogout" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form> 
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-40 img-radius" src="{{ asset('assets/images/avatar-4.jpg')}}" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span>{{ Auth::user()->name }} </span>
                                        <span id="more-details">Student <i class="ti-angle-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                        <!--    <a href="#"><i class="ti-user"></i>View Profile</a>
                                            <a href="#!"><i class="ti-settings"></i>Settings</a> -->
                                            <a href="/Studentlogout"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form3').submit();">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>

                                        <form id="logout-form3" action="/Studentlogout" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                         
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="/home" >
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>H</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Home</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
                                <li class="pcoded-hasmenu">
                                    <a href="/home">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Exams</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                  <!--  <ul class="pcoded-submenu">
                                       
                                        <li class=" ">
                                            <a href="icon-themify.html">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Icon</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul> -->
                                </li>
                                <li class="pcoded">
                                    <a href="/result" >
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>R</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Result</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               
                            </ul>
                           
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Notes &amp; Study Material</div>
                            <ul class="pcoded-item pcoded-left-item">
                                 <li class="pcoded-hasmenu">
                                    <a href="#" onclick="Notfound('Quick Revision' , 'Data Not Found, Ask your Institute ')">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quick Revision</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                   <!-- <ul class="pcoded-submenu">
                                       
                                        <li class=" ">
                                            <a href="icon-themify.html">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Icon</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul> -->
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="#" onclick="Notfound('Study Material' , 'Study Material Not Found, Your Institute has not Added !!!')">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Study Material</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                 <!--   <ul class="pcoded-submenu">
                                       
                                        <li class=" ">
                                            <a href="icon-themify.html">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Icon</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>  -->
                                </li>
                                
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">NewsFeed</div>
                            <ul class="pcoded-item pcoded-left-item">
                                 <li class="pcoded-hasmenu">
                                    <a href="https://allexamcorner.firebaseapp.com/currentaffair" onclick="Notfound('Quick Revision' , 'Data Not Found, Ask your Institute ')">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">NewsFeed</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.other">Message</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="#" onclick="Notfound('Message' , 'No Message Found')">
                                        <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Message</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li> 
                            </ul>
                        </div>
                        
                    </nav>
                  
                </div>
                     <!-- Record Not Found -->
                        <div id="not_found" class="modal fade" role="dialog" >
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header text-left">
                                    <h4 class="modal-title not_found_title"></h4>
                                </div>
                                <div class="modal-body not_found_body text-center" id="show_detail_result_info" >
                                    
                                </div>
                                </div>

                            </div>
                        </div>
                
                @yield('content')
               
            </div>
        </div>
        </div>
    
    <!-- NAV ---------------------------------------------------------------- -->
    
  
        @endguest
        
    </div>
                                   



<!--
     <!-- Latest compiled and minified CSS --
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Latest compiled and minified CSS --
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
        <!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('assets/js/modernizr/modernizr.js')}}"></script>
<!-- am chart -->
<script src="{{asset('assets/pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{asset('assets/pages/widget/amchart/serial.min.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{asset('assets/pages/todo/todo.js')}} "></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>
<script type="text/javascript " src="{{asset('assets/js/SmoothScroll.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/js/pcoded.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/js/demo-12.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script type="text/javascript">

$(document).ready(function () {
    var $window = $(window);
    var nav = $('.fixed-button');
        $window.scroll(function(){
            if ($window.scrollTop() >= 200) {
            nav.addClass('active');
        }
        else {
            nav.removeClass('active');
        }
    });
});

</script>


<script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>


       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

</body>
</html>
