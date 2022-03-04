@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')
<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container"> <img src="images/nbclogo.jpg" style="width:100px; height: 100px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>
            <!-- Brand and toggle get grouped for better mobile display - ->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="pems/home" style="margin-top:25px; color:#fff;font-family: 'Amaranth', sans-serif;
font-family: 'Source Sans Pro', sans-serif; font-face:'Amaranth'">Nazlawi Bussiness College</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -- >
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top:30px;padding-bottom:30px; ">

               <ul class="nav navbar-nav navbar-left">
               <li><a href="/pems/home">Welcome</a></li>



                </ul>
            </div>

 </div>
        <!-- /.container - ->
    </nav>-->
<?php
  $id = Auth::user()->id;
  $user = DB::table('users')->where('id',$id)->first();
  ?>

          <div class="container">
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">


<h2>Exam Hall Welcome Page: <br/>
You are Signed In as: {{$user->student_id}} {{$user->name}}</h2>
	<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">PassPort Home Page: You are Signed In as: {{$user->name}}</div>
			<div class="panel-body">
				<P>Welcome {{$user->name}} to the Nazlawi Bussiness College Examination Hall. </P>
<div id="examstatus">
Please Confirm Below the Exam you Wish to Sit... <br/>
If the Exam is set to Open you'll be allowed to enter the Exam room.  <br/>
Once inside, you'll still have the opportunity to cancel your sitting before the exam starts, without any consequences.
</div>
<br/>
<div class='col-lg-8'>
<form method="POST" action="127.0.0.1:8000pass/examhall" accept-charset="UTF-8"><input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">
	<div class="form-group">
	<label for="examid">Select the Exam you wish to Sit:</label>
	<select id="selectsubject" class="form-control" name="subject"><option value="0">Select an Exam</option><option value="11905">1.1 Financial Accounting</option><option value="11906">1.2 Management Accounting</option><option value="11907">1.3 Business Maths And Quantitive Methods</option><option value="11908">1.4 Economics</option><option value="11909">2.1 Information Technology</option><option value="11910">2.2 Business Law</option><option value="11911">2.3 Audit</option><option value="11912">2.4 Taxation</option><option value="11913">3.1 Advanced Accountancy</option><option value="11914">3.2 Project Management</option><option value="11915">3.3 Pm Body Of Knowledge</option><option value="11916">3.4 Project Accounting</option><option value="11917">3.5 Performance Management</option><option value="11918">3.6 Decision Making Management</option><option value="11919">3.7 Risk And Control Management</option><option value="11920">4.1 Strategic Business Planning</option><option value="11921">4.2 Strategic Financial Planning</option><option value="11922">4.3 Strategic I.C.T. Planning</option><option value="11923">9.9 Mock Exam</option></select>
</div>

		<div class="form-group">
					<label for="examcode">Exam Code</label> <input id="examcode" name="examcode" type="text" value="">
					<input id="examcode1" name="examcode1" type="hidden" value="">
					<label for="examtitle">Exam Title</label>
					<input id="examtitle" style="width:300px" name="examtitle" type="text" value="">
					<input id="examtitle1" name="examtitle1" type="hidden" value="">

					<br/><br/>
					<input class="btn btn-sucess" disabled="false" id="submitsubmit" type="submit" value="Enter Exam Room">
					<a href="" class="btn btn-danger">Abort Exam</a>
					</div>

</form>

</div>




			</div>
		</div>
	</div>



</div>


 <script src="127.0.0.1:8000js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="127.0.0.1:8000js/bootstrap.min.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {



    $("#selectsubject").change(function(){
       var subid = $(this).val();

       if(subid!=0){
       var linkk= '127.0.0.1:8000pass/getsubjectdet'+ '/' + subid;

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
      <div class="container">
        <p class="text-muted">seralkhatem.net</p>
      </div>
    </footer>


@endsection


 