
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Amaranth|Source+Sans+Pro" rel="stylesheet">
    <title>MAP Home Page</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link id="bsdp-css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
   </head>
<body>
<!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container"> <img src="/images/nbclogo.jpg" style="width:100px; height: 100px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/home" style="margin-top:25px; color:#fff;font-family: 'Amaranth', sans-serif;
font-family: 'Source Sans Pro', sans-serif; font-face:'Amaranth'">Nazlawi Bussiness College</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  style="margin-top:30px;padding-bottom:30px; margin-left:100px;">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/map">Home</a></li>



                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Map <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                <li><a href="/map/myaccount">My Account</a></li>
                          <li><a href="/map/myaddresses">My Addresses</a></li>
                <li><a href="/map/mycertificates">My Certificates</a></li>
                <li><a href="/map/mysqcpd">My CPD</a></li>
                <li><a href="/map/myemail">My Email</a></li>
                <li><a href="/map/mypassword">My Password</a></li>
                <li><a href="/map/myqualifications">My Qualifications</a></li>
                <li><a href="/map/myreferences">My References</a></li>

                                  </ul>
                    </li>





                                              <li><a href="/pass">Sign In to PassPort</a></li>
                                             <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>MAP Home Page  </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default">
					<div class="panel-heading"><strong>Welcome {{$student->name}} {{$student->student_id}}</strong></div>
					<div class="panel-body">
<p>
Welcome <strong>{{$student->name}}</strong> to the Nazalwi Bussiness College Access Portal <strong>(MAP)</strong>.
</p><p>
MAP is a web based application designed to provide NBC Members with the support they need. <br/>
It is a system which currently gives you access to your Member Details. As we move forward we will be adding more applications to MAP, and we hope that you will get involved by making suggestions about how we can improve it.
</p><p>
Please feel free to make suggestions to the Membership Officer about how you feel we can improve MAP.
</p><p>
To sit an Exam you need to sign in to the Assessment Portal (PassPort). You can use the same credentials as for your MAP Sign In. <br/>
To access PassPort select: "Sign In to Passport" from the above menu. <br/>
We have introduced this additional Sign In to enhance the security of the Assessment system.
</p><p>
Important: Please ensure your Certificate Name is Correct. Click here to check or change it.
</p>
					</div>
		</div>
	</div>


	<div class="col-lg-4">
	<img src="images/WorldMap.jpg"/>
	<div style="padding:10px; background-color: #5280c7; border-radius: 5px; width:280px; margin-top:15px; color:#fff;">

"You are the point of origin for
everything in your world:<br/>
You set the standard for yourself." <br/>
(Steve Maraboli) 1975−
</div>
	</div>
</div>


                    </div>
                </div>


            </div>
        </div>

<div class="row">
            <div class="col-lg-12">

            <center>
            <div>
            All rights reserved and Copyright © is exclusively owned by Nazlawi Business College
            <Br/>
                <a href="copyright">Copyright</a>
                |
                <a href="termsandconditions">Terms and Conditions</a>


            </div>

                <p style="font-size:8px;">seralkhatem.net</p>
            </center>
                </div>
        </div>
   </div>
</div>



  <!-- /.container -->

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  });
  </script>
</body></html>



