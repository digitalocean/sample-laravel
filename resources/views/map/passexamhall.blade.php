
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>The Global College For Professional Accountants - NBC</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/public/assets/img/favicon.png" rel="icon">
  <link href="/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/public/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/public/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/public/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/public/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/public/assets/vendor/aos/aos.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="/public/assets/css/style.css" rel="stylesheet">

  
  <!-- =======================================================
  * Template Name: Anyar - v2.1.0
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 <!-- Bootstrap Core CSS -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/public/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 --><link href='https://fonts.googleapis.com/css?family=Eczar' rel='stylesheet'>

  <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>

  <style>
  body {
    font-family: 'Eczar';font-size: 18px;}
  	.panel-heading{background-color:#1E90FF;color:white;padding:10px;margin-bottom:5px;}
    .panel-title{background-color:#1E90FF;color:#fff;padding:10px;}
    .panel-body{border:1px solid #1E90FF;padding:15px;}
    .col-lg-12{border:1px solid #1E90FF;padding:15px;}
    .col-lg-8{border:1px solid #1E90FF;padding:15px;}
    .col-lg-6{border:1px solid #1E90FF;padding:15px;}
    .col-lg-4{border:1px solid #1E90FF;padding:15px;}
    select{border:1px solid #1E90FF;font-family: 'Archivo Black';font-weight:bold;height:50px;color:red !important;background-color:#1E90FF;}
    input{padding:5px;margin:5px;}
    
  </style>

</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top " style="background-color:#00008B;padding15px;">
  <div class="container d-flex align-items-center">
<div class="contact-info mr-auto">
    <ul>
      <li><i class="icofont-envelope"></i><a href="info@acpaglobal.net">info@acpaglobal.net</a></li>
      <li><i class="icofont-phone"></i> 00249912327066</li>
      <li><i class="icofont-clock-time icofont-flip-horizontal"></i> <?php  echo date('Y-m-d'); ?></li>
    </ul>
  </div>
  <div class="cta">
    <a href="register2" class="scrollto">Get Started</a>
  </div>
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top " style="background-color:#00008B;padding15px;">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="#header" class="scrollto">
  <img src="{{asset('public/logonbcfull3.png')}}" style="width:200px; height: 150px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>

    </a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="#header" class="logo mr-auto scrollto"><img src="/public/assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav class="nav-menu d-none d-lg-block">
  <ul>
  
     @if(Auth::user()->fee > 22) <li><a href="/pass">Sign In to PassPort</a></li>@endif
      <li><a href="/pass/examhall">Welcome</a></li>
      
<!--------------------------------LOGOUT----------------------------------------------->
          <li>
            <a class="item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
          </li>
<!--------------------------------END  LOGOUT----------------------------------------------->

<li style="float:right">
            <a href="#">
            <img src="{{asset('public/'.Auth::user()->avatar)}}" style="border-radius: 50%; width:100px; height: 100px; float :right;  margin-right:10px; margin-top:-35px;  ">
            </a>
            <!--  <li><a href="/logout">/////////////////Logout</a></li> -->
</li>
     

    </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= 
<section id="hero" class="d-flex justify-cntent-center align-items-center">
  <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
</div>
</section>-->

@if(Auth::user()->scholarship == 1)
<div style="float:right">
<img src="{{asset('public/scholarship.png')}}"  
style="border-radius: 50%; width:120px; height: 120px; float :right;  margin-right:-410px; margin-top:-5px;  ">
</div>
@endif
<br><br><
   
<main id="main">

        
<div class="container">    
<div class="row">
  <div class="col-lg-12">
  <br><br><br>
        <div class="panel panel-default">   
<?php    $today = date('Y-m-d');
         $n_today = strtotime($today);
                 // echo $today.'Date as number'.$n_today; ?>            
<h2>Exam Hall Welcome Page: <br/>
You are Signed In as: {{Auth::user()->student_id}} {{Auth::user()->name}}</h2>
	<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">PassPort Home Page: You are Signed In as: {{Auth::user()->name}}</div>
			<div class="panel-body">
				<P>Welcome {{Auth::user()->name}} to the Nazlawi Bussiness College Examination Hall. </P>
<div id="examstatus">
Please Confirm Below the Exam you Wish to Sit... <br/>
If the Exam is set to Open you'll be allowed to enter the Exam room.  <br/>
Once inside, you'll still have the opportunity to cancel your sitting before the exam starts, without any consequences. 
</div>
<br/>
<div class='col-lg-12'>
<form method="POST" action="/pass/selectpassexamhall" accept-charset="UTF-8">
@csrf
	<div class="form-group">
	<label for="examcode">Select the Exam you wish to Sit:</label><br>
 	<select  style="height:50px !important;" name="examcode" class="form-control">
  
        <option value="0">Select an Exam</option>
        @foreach($exams as $exam)
        <option value="{{$exam->examcode}}">{{$exam->realcode}} {{$exam->examtitle}}</option>
        @endforeach 
        </select>
        <input type="submit" class="btn btn-success" value="Select">
</div>
</form>


		<div class="form-group">
					<label for="examcode">Exam Code</label> <input id="examcode" name="examcode" type="text" value="{{$exam1code}}">
					<input id="examcode1" name="examcode1" type="hidden" value="">
					<label for="examtitle">Exam Title</label> 
					<input id="examtitle" style="width:300px" name="examtitle" type="text" value="{{$exam1title}}">
					<input id="examtitle1" name="examtitle1" type="hidden" value="">
          </form>
          <div class="form-group">


					<br/><br/>
<form action="/pass/startexam" method="post" accept-charset="UTF-8">
@csrf
        <input type="hidden" name="examcode" value="{{$exam1code}}">
        @if($exam1code !=0)
        {{$proctor}}
          @if($exam1code != 66)
          <input 
          <?php 
if($proctor == 0){echo 'disabled';}

?>
          
          style="height:50px !important;"  class="btn btn-success" type="submit" value="Enter Exam Room">

    @elseif($proctor > 0)
    <input type="hidden" name="examcode" value="{{$exam1code}}">

    <input class="btn btn-success" type="submit" value="Enter Exam Room">

    @endif
    <a href="" class="btn btn-danger">Abort Exam</a>
    </div>

</form>
@endif
</div>




			</div>
		</div>
	</div>



</div>
	

 <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {

  
    
    $("#selectsubject").change(function(){
       var subid = $(this).val();
      
       if(subid!=0){ 
       var linkk= '/pass/getsubjectdet'+ '/' + subid;
      
       $.get( linkk ,{ subid: subid }, function( data ) {
          dd= $.parseJSON(data);
          $("#examcode").val(dd['subjectcode']);
          $("#examcode1").val(dd['subjectcode']);
          
       $("#examtitle").val(dd['subjecttitle']);
       $("#examtitle1").val(dd['subjecttitle']);
      // alert(dd['message']);
      var str=dd['message'];
       $("#examstatus").html(str);
          //alert(dd['status'])
          if(dd['open']==0){
          	$("#submitsubmit").attr ("disabled","disabled");
          }else{
          	$("#submitsubmit").removeAttr("disabled");
          }
         
       });
     }  else{
       $("#examcode").val('');
          $("#examcode1").val('');
          
       $("#examtitle").val('');
       $("#examtitle1").val('');
      $("#submitsubmit").attr("disabled","disabled");
     }


        
    });


    function checkvalues (){
      if((dd['status']=='Open')||(dd['status']=='Available')||(dd['status']=='Failure'))
          {
            if($("#examdate").val().length === 0){
              $("#submitsubmit").attr ("disabled","disabled");
            } else {
              $("#submitsubmit").removeAttr("disabled");
            }
            
          } else {
            $("#submitsubmit").attr("disabled","disabled");
          }


    }
  });

</script>
 
                </div>
            </div>
        </div>
        </div>
                              <div class="col-lg-12 " style="height:10px;">

                              </div>
  <footer class="footer">
      <div class="container"><a href="http://sirelkhatim.unaux.com">
        <p class="text-muted">Powered By sirelkhatim.unaux.com</p> </a>
      </div>
    </footer>


    <!-- Bootstrap Core JavaScript -->
  
</body></html>