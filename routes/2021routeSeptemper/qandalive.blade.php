
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Amaranth|Source+Sans+Pro" rel="stylesheet">
    <title>Member Admin</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <!-- Bootstrap Core CSS -->
    <link href="http://acpa-global.com/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://acpa-global.com/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://acpa-global.com/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
   </head>
<body>
<!-- Navigation -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container"> <img src="http://acpa-global.com/images/nbclogo.jpg" style="width:100px; height: 100px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
                <a class="navbar-brand" href="http://acpa-global.com/home" style="margin-top:25px; color:#fff;font-family: 'Amaranth', sans-serif;
font-family: 'Source Sans Pro', sans-serif; font-face:'Amaranth'">Nazlawi Bussiness College</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  style="margin-top:30px;padding-bottom:30px; margin-left:100px;">
                <ul class="nav navbar-nav navbar-left">
                          <li><a href="http://acpa-global.com/pems/journal">Journal</a></li>
                           <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                 <li><a href="http://acpa-global.com/pems/memberadmin">Member Admin</a></li>
                          <li><a href="http://acpa-global.com/pems/memberstatus">Member Status</a></li>
                                    <li><a href="http://acpa-global.com/pems/pendingmembers">Pending Members</a></li>
                                  
                        </ul>
                    </li>
                         
                          <li><a href="http://acpa-global.com/pems/bulkemail">BulkEmail</a></li>
                         
                       
                        
                    </li>
                 

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Qualifications <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                 <li><a href="http://acpa-global.com/pems/qandalive">QandALive</a></li>
                                
                                    <li><a href="http://acpa-global.com/pems/qandaoffline">QandAOffline</a></li>
                                   
                                  
                        </ul>
                    </li>
                     
                   
                <li><a href="http://acpa-global.com/pems/invoicing">Invoicing</a></li>
                    <li><a href="http://acpa-global.com/pems/certificate">Certificate</a></li>
<li><a href="http://acpa-global.com/pems/rossusers">Admins</a></li>
<li><a href="http://acpa-global.com/pems/allresult">Results</a></li>
               <li><a href="http://acpa-global.com/pems/logout">Logout</a></li> 

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

       
              
     
<div class="container">
                              <div class="col-lg-12">
	<div class="panel panel-default">
			
																<div class="row">
			     	<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">Subject</div>
							<div class="panel-body">
						  		<form method="POST" action="http://acpa-global.com/pems/qandalive" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">
						  			
						  			<label for="subjectid"> Select Subject</label>
						  									  			<select id="subjectid" name="subjectid"><option value="0">Select a Subject</option><option value="1">Financial Accounting</option><option value="2">Management Accounting</option><option value="3">Business Maths And Quantitive Methods</option><option value="4">Economics</option><option value="5">Information Technology</option><option value="6">Business Law</option><option value="7">Audit</option><option value="8">Taxation</option><option value="9">Advanced Accountancy</option><option value="10">Project Management</option><option value="12">Pm Body Of Knowledge</option><option value="14">Project Accounting</option><option value="15">Performance Management</option><option value="16">Decision Making Management</option><option value="17">Risk And Control Management</option><option value="18">Strategic Business Planning</option><option value="19">Strategic Financial Planning</option><option value="20">Strategic I.C.T. Planning</option><option value="21">Mock Exam</option></select>
						  									  			
						  			<input class="btn btn-default" type="submit" value="Choose">
						  		
						  		</form>
						  		
						 </div>
					</div> 
					
					</div>


					

								

			</div>
 			
	</div>
</div>
<script src="http://acpa-global.com/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea',  menubar: false, forced_root_block : "" });</script>
  
</div>
                             
  <div class="row">
  <footer class="footer">
      <div class="container">
        <p class="text-muted">Powered By Sanhorytech.com</p>
      </div>
    </footer>
  </div>


    <!-- Bootstrap Core JavaScript -->
   
  <!-- /.container -->

    <!-- jQuery -->
    <script src="http://acpa-global.com/js/jquery.js"></script>
    
    <script src="http://acpa-global.com/js/jquery-ui.js"></script>
<script type="text/javascript" src="http://acpa-global.com/js/zebra_datepicker.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="http://acpa-global.com/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://acpa-global.com/css/default.css" type="text/css">
<script type="text/javascript">
$(document).ready(function() {
  $('#scheduleexamdate').Zebra_DatePicker();

$('#scheduleexamdate1').Zebra_DatePicker();
 $('#scheduleexamdate2').Zebra_DatePicker();   

});
</script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body></html>