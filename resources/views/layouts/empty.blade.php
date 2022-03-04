<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <!-- CSRF Token -->
    <meta id="token" name="token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Nazlawi Business College ') }}</title>

    <meta name="description" content="All Exam Corner is an online system that allows you to conduct online test, We Support More than 100 Language. conduct exam like Maths, SSC , Bank , PO , RLY , JEE , JE, etc">
    <meta name="keywords" content="AllExamCorner , ALL, Exam, Corner, ExamPortal, Online Exam, Conduct on line Exam for institution, Android, Coaching, Organization Exam, creative app">
    <meta name="author" content="Sunny Singh Yadav">
      

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('public/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/jquery.mCustomScrollbar.css')}}">
        <!-- Fonts -->
        <link href="//fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/fontawesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//formvalidation.io/vendor/formvalidation/css/formValidation.min.css">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.8.3.js"></script>
<script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  src="//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML">
</script>

<script type="text/javascript" >

    var set_question = new Object();
    var colors = new Object();
    var active_process = 0;
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
.circle-btn{
    margin: 5px 2.5px;
}

[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #F87DA9;
    position: absolute;
    top: 2.8px;
    left: 2.5px;
    border-radius: 50%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
</style>

<script type="text/javascript">
//---------------------------------------------------------PERVENT BACK---------------------------------------------------
	function preback(){window.history.forward();}
setTimeout("preback()",0);
window.onunload=function(){null};
//------------------------------------------------------End-PERVENT BACK--------------------------------------------------
</script>

<script type="text/javascript">
	//-------------------------Prevent righ click context ------------------------
	document.oncontextmenu = preventDefaultAction;
	function preventDefaultAction(event)}
		event = event || wndow.event;
	if(event.preventDefault){
		event.preventDefault():
	}
	else{
		event.returnValue = false;
	}
}

</script>


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
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

                        <div class="navbar-logo text-white">
                            
                        <!--  <a class="mobile-search morphsearch-search" href="#">
                                <i class="ti-search"></i>
                            </a> --><span class="text-center" style="width:100%">
                            Timer : <span id="timmer"> Ready<span> </span>
                          <!--  <a href="#" >
                              <img class="img-fluid" src= '{{ Auth::user()->image }}' alt="Theme-Logo" />  
                           
                            </a> -->
                            
                        </div>

                    </div>
                </nav>
            </div>
            
        </div>
        <div class="pcoded-main-container" style="margin-top: 80px">
        @include('includes.messages')

                 @yield('content')
               
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    
    
    <!-- Scripts -->
    <script src="public/js/app.js"></script>
    <script src="{{asset('public/js/app.js') }}"></script>
        <!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('public/assets/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('public/assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('public/assets/js/modernizr/modernizr.js')}}"></script>
<!-- am chart -->
<script src="{{asset('public/assets/pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{asset('public/assets/pages/widget/amchart/serial.min.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{asset('public/assets/pages/todo/todo.js')}} "></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('public/assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/script.js')}}"></script>
<script type="text/javascript " src="{{asset('public/assets/js/SmoothScroll.js')}}"></script>
<script  type="text/javascript" src="{{asset('public/assets/js/pcoded.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('public/assets/js/demo-12.js')}}"></script>
<script  type="text/javascript" src="{{asset('public/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>



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

<script type="text/javascript">
/*$(document).ready(function() {
    
    $('#chosenForm')
        .find('[name="colors"]')
            .chosen({
                width: '100%',
                inherit_select_classes: true
            })
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#chosenForm').formValidation('revalidateField', 'colors');
            })
            .end()
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                colors: {
                    validators: {
                        callback: {
                            message: 'Please choose 2-4 color you like most',
                            callback: function(value, validator, $field) {
                                // Get the selected options
                                var options = validator.getFieldElements('colors').val();
                                return (options != null && options.length >= 2 && options.length <= 4);
                            }
                        }
                    }
                }
            }
        });
}); */
</script>

       <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

</body>
</html>
