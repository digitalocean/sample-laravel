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

                <p  style="margin-top:25px; color:#fff;font-family: 'Amaranth', sans-serif;
font-family: 'Source Sans Pro', sans-serif; font-face:'Amaranth'">Nazlawi Bussiness College</p>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->


 </div>
        <!-- /.container -->
    </nav>


          <div class="container">
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">



<p>
Name: seralkhatem Musa - Member ID: 10313<br/>
- This is Examination: 9.9
</p>
	<form method="POST" action="http://acpa-global.com/pass/exam" accept-charset="UTF-8">
	<input name="_token" type="hidden" value="Pv8KxeX5jVgDiyJ5YnBziGVKUMx3KmHT5UB9BNKt">
<div class="row">
	<div class="col-lg-12">
		<table style="width:100%">
			<tr>
			<th><a href="abort" class="btn btn-danger">Abort</a></th>
			<input type="hidden" name="orignalseconds" value="1800" id="orignalseconds"/>
			<th>Seconds Allowed: <input type="text" name="seconds" value="1800" id="seconds"/></th>
			<th><a href="bookmark"  class="btn btn-primary" id="bookmarkbutton">BookMark This Question</a></th>
			<th style="width:100px;">

			<select>
				<option>{Remaining Questions}</option>


				<option>UnAnswered</option><option>UnAnswered</option><option>UnAnswered</option><option>UnAnswered</option><option>UnAnswered</option><option>UnAnswered</option><option>UnAnswered</option><option>UnAnswered</option><option>UnAnswered</option><option>UnAnswered</option>

			    </select>
			</th>
			<th style="width:100px;">&nbsp;&nbsp;</th>
			</tr>
		</table>
	</div>
</div>


	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-size:15pt;">Please Answer the following Questions...
								<span style="float:right">
				Question 1 of 10

				</span></div>
				<div class="panel-body">
				<p>What is the capital of England?</p>								<input name="questionid" type="hidden" value="45912">

				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-size:15pt;">Please select the correct Answer and then press "Submit Answer" -->
						<input name="subject" type="hidden" value="9.9">
						<input id="bookmarked" name="bookmarked" type="hidden" value="no">
											<input style="float:right" class="btn btn-success" type="submit" value="Submit">
										<br/>
				</div>
				<div class="panel-body">
				<label><input type="radio" name="answer" value="Dublin" id='an1' required='required'/>Dublin</label><br/><label><input type="radio" name="answer" value="Birmingham" id='an2' required='required'/>Birmingham</label><br/><label><input type="radio" name="answer" value="London" id='an3' required='required'/>London</label><br/><label><input type="radio" name="answer" value="Cardiff" id='an4' required='required'/>Cardiff</label><br/><label><input type="radio" name="answer" value="Islamabad" id='an5' required='required'/>Islamabad</label><br/>				</div>
			</div>
		</div>
	</div>
</form>

<script>
var old= document.getElementById("orignalseconds").value;



var myVar = setInterval(myTimer, 1000);

function myTimer() {

    var d = new Date();
    var old= document.getElementById("orignalseconds").value;
    var ew= old-1;
    if(ew<=0){


		//window.location.href = "http://acpa-global.com/pass/finishexam/1328";

		window.location.href = "http://acpa-global.com/redirects/1328";

	} else {
    document.getElementById("seconds").value = ew;
     document.getElementById("orignalseconds").value = ew;
 	}
}
function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
</script>
  <script src="http://acpa-global.com/js/jquery.js"></script>
<script src="http://acpa-global.com/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {

		$("#bookmarkbutton").click(function(event ){
			event.preventDefault();
			var va= $("#bookmarked").val();
			if(va=='no'){
				$("#bookmarked").val('yes');
				$(this).text('Remove BookMark');
				$("#an1").removeAttr('required');
				$("#an2").removeAttr('required');
				$("#an3").removeAttr('required');
				$("#an4").removeAttr('required');
				//$("#an5").removeAttr('required');

			}
			else{
				$("#bookmarked").val('no')
				$(this).text('BookMark This Question');
				$("#an1").attr('required','required');
				$("#an2").attr('required','required');
				$("#an3").attr('required','required');
				$("#an4").attr('required','required');
				//$("#an5").attr('required','required');

			}

		});




  });


</script>

                </div>
            </div>
        </div>
        </div>
                              <div class="col-lg-12 " style="height:10px;">

                              </div>
  <footer class="footer">
      <div class="container">
        <p class="text-muted">seralkhatem.net</p>
      </div>
    </footer>


    <!-- Bootstrap Core JavaScript -->

</body></html>
