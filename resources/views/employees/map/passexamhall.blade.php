
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Amaranth|Source+Sans+Pro" rel="stylesheet">
    <title></title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top:30px;padding-bottom:30px; ">
 
               <ul class="nav navbar-nav navbar-left">              
               <li><a href="/pass/examhall">Welcome</a></li>
         
                
   
                </ul>
            </div>

 </div>
        <!-- /.container -->
    </nav>
<br><br>
       
<div class="container">    
<div class="row">
  <div class="col-lg-12">
  <br><br><br>
        <div class="panel panel-default">   
<?php    $today = date('Y-m-d');
         $n_today = strtotime($today);
                  echo $today.'Date as number'.$n_today; ?>            
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
<div class='col-lg-8'>
<form method="POST" action="/pass/selectpassexamhall" accept-charset="UTF-8">
@csrf
	<div class="form-group">
	<label for="examcode">Select the Exam you wish to Sit:</label>
 	<select name="examcode" class="form-control">
  
        <option value="0">Select an Exam</option>
        @foreach($exams as $exam)
        <option value="{{$exam->examcode}}">{{$exam->realcode}} {{$exam->examtitle}}</option>
        @endforeach 
        </select>
        <input type="submit" id="submitsubmit" value="Select">
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
          <input class="btn btn-sucess"
          <?php 
if($proctor == 0){echo 'disabled';}

?>
          
    id="submitsubmit" type="submit" value="Enter Exam Room">

    @elseif($proctor > 0)
    <input type="hidden" name="examcode" value="{{$exam1code}}">

    <input class="btn btn-sucess" id="submitsubmit" type="submit" value="Enter Exam Room">

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