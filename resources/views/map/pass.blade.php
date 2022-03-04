
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


            </div>

 </div>
        <!-- /.container -->
    </nav>

     <div class="container">
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">



<h2>PassPort Sign In</h2>
	<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">PassPort Sign In</div>
			<div class="panel-body">
				<form method="POST" action="/pass/examhall" accept-charset="UTF-8">
  		    {{csrf_field()}}
            {{method_field('post')}}
					<div class="form-group">
					<label for="name">Name:</label>
					<input class="form-control" required="required" name="name" type="text" value="" id="name">
					</div>
					<div class="form-group">
					<label for="memberid">MemberID:</label>
					<input class="form-control" required="required" name="memberid" type="text" value="" id="memberid">
					</div>

					<div class="form-group">
						<label for="password">Password:</label>
					<input class="form-control" required="required" name="password" type="password" value="" id="password">
					</div>

					<div class="form-group">
					<input class="btn btn-default" type="submit" value="Sign In">
					</div>


				</form>
			</div>
		</div>
	</div>



</div>




                              </div>
            </div>
        </div>
        </div>
                              <div class="col-lg-12 " style="height:10px;">

                              </div>
  <footer class="footer">
      <div class="container">
        <p class="text-muted">Powered By seralkhatem.net</p>
      </div>
    </footer>



  <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {





     $("#examdate").change(function(){
      //checkvalues();
      var endDate = Date.parse( $("#examdate").val() );
       var currentDate = Date.now();
     // var first=new Date($("#examdate").val());
     // var second= new Date("yy-mm-dd");
     // var result= compareDates(endDate,format,currentDate,format);
     if(endDate<currentDate)
      alert('gadeem');
    else
      alert('akbar');
      //alert( currentDate);
    });

    $("#selectsubject").change(function(){
       var subid = $(this).val();

       if(subid!=0){
       var linkk= 'http://acpa-global.com/ross/getsubjectdet'+ '/' + subid;

       $.get( linkk ,{ subid: subid }, function( data ) {
          dd= $.parseJSON(data);
          $("#examcode").val(dd['subjectcode']);
          $("#examcode1").val(dd['subjectcode']);

       $("#examtitle").val(dd['subjecttitle']);
       $("#examtitle1").val(dd['subjecttitle']);
          //alert(dd['status'])

          checkvalues();
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

    <script src="/js/jquery-ui.js"></script>

<script type="text/javascript" src="/js/zebra_datepicker.js"></script>


<link rel="stylesheet" href="/css/default.css" type="text/css">

<script type="text/javascript">
$(document).ready(function() {

    // assuming the controls you want to attach the plugin to
    // have the "datepicker" class set
        $('#examdate').Zebra_DatePicker({
      direction: ['2020-02-18', false]
    });

    $('#scheduleexamdate').Zebra_DatePicker();




});
</script>
</body></html>
