<!DOCTYPE html>
<html>
  <head>
    <title>Make Autocomplete search using jQuery UI in Laravel</title>
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
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('jqueryui/jquery-ui.min.css')}}">

    <!-- Script -->
    <script src="{{asset('jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script>

  </head>
  <body>
  <?php   
    $exams = DB::table('exam')->limit(18)->get();
    ?>

<div class="container">
    <div class="row">
        <div class="col-lg-20">

                <div class="panel panel-default">


    <h2>Exam Hall Welcome Page: <br/>
    You are Signed In as: {{Auth::user()->student_id}} {{Auth::user()->name}}</h2>
        <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">PassPort Home Page: You are Signed In as: {{Auth::user()->name}}</div>
                <div class="panel-body">
                
				<P>Welcome {{Auth::user()->name}} to the Nazlawi Bussiness College Examination Hall. </P>
                <div id="examstatus">
                Please Confirm Below the Exam you Wish to Sit... <br/>
                If the Exam is set to Open you'll be allowed to enter the Exam room.  <br/>
                Once inside, you'll still have the opportunity to cancel your sitting before the exam starts, without any consequences.
                </div>
                <?php $exam = DB::table('exam')->get();  ?>
                <form action="/employees2" method="post">
                    <!-- For defining autocomplete -->
                    <input type="text" id='employee_search' value="" onclick="myFunction()">
                <br>
                    <!-- For displaying selected option value from autocomplete suggestion -->
                    <span><input type="text" id='employeeid' readonly></span>
                    <input type="text" id='employeeid2' readonly>
                    <input type="submit" class="btn btn-success" value="Start Exam" hidden>
                </form> 
                <?php /*
                        $date1 = date('Y-m-d');
                        echo 'TODAY is : ::::::'.$date1.'<br>';
                        $date1_nmber = strtotime($date1);
                        $userid = Auth::user()->student_id;
                        $proctor = DB::table('proctordate')->where('user_id',$userid)->where('procrordate',$date1)->where('used',0)->get();
                          
                        $long = strtotime('2020-05-29');
                        $long2 = date('Y-m-d');
                        $long3 = strtotime($long2);
                        echo '<br>DATE to Number :'.$long.'<br>'; 
                        echo '<br>DATE to Number2 :'.$long2.'<br>'; 
                        echo '<br>DATE to Number3 :'.$long3.'<br>'; 
                        echo date('Y-m-d H:I:S', $long)  ; 
                        
                        ?><br><br><br>Start::::::::::::::::::::::::::::<br>
                        <?php
$proctors1 = DB::table('proctordate')->where('user_id',$userid)->get() ;
            foreach( $proctors1 as $p1){
                $today = date('Y-m-d');
                $n_today = strtotime($today);
                $n_pro_date = strtotime($p1->procrordate);
            echo '<h6 style="color:black;"><br>Today'.$n_today.' '.$n_pro_date.' '.$today.' '.$p1->procrordate.' '.$p1->subject_id.' '.$p1->used.'/h6>' ;
            }*/

?>


                        

                        
                </div></div></div> 

<div class="col-lg-6">
<div class="panel panel-default">
<div class="panel-heading">Ready Exams: {{Auth::user()->name}}</div>
<div class="panel-body">Select Your Exam Form Here To start ...


<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table" id="table">
    <thead>
    <tr>
        <th width="150px">No.</th>
            <th>Contact No.</th>
        <th class="text-center" width="150px">   <!--<i class="glyphicon glyphicon-plus"></i>-->
            Select Exam&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </th>
        </tr>
        <input type="hidden" name="_token" value="YH0xCDzFfvBxSL5wiutSVQm4DSYSFgQ9amrhTc6J">
    </thead>
<tbody>
        
        @foreach($exams as $exam)
        <tr>
        <td>{{$exam->realcode}}  </td>
        <td>{{$exam->examtitle}} </td>
        <td>
        <?php 
        $userid = Auth::user()->student_id;
        $proctors = DB::table('proctordate')->where('subject_id',$exam->examtitle)->where('used',0)->where('user_id',$userid)->count() ;
        if($proctors != 0){  
            $proctors1 = DB::table('proctordate')->where('subject_id',$exam->examtitle)->where('used',0)->where('user_id',$userid)->orderby('created_at','DESC')->limit(1)->get() ;
            foreach( $proctors1 as $p1){
                    $today = date('Y-m-d');
            $n_today = strtotime($today);
            $n_pro_date = strtotime($p1->procrordate);
                if($n_today == $n_pro_date ){
                        echo '<a href="http://127.0.0.1:8001/exam/start/'.$exam->examcode.'/'.$exam->examtitle.'/NBC/SSC/'.$exam->examtitle.'>Start Exam</button</a>';
                } else{echo '<button class="btn btn-warning" disabled>Not Ready</button>';}
            }    
          }else{ echo '<button class="btn btn-danger" disabled>Not Ready</button>'; }
?>

        </td>
    </tr>
    @endforeach
    <tr>
    <td>9.9 </td>
    <td>Mook Exam</td>
    <td><a href="http://127.0.0.1:8001/exam/start/66/Mook%20Exam/NBC/SSC/30"><button class="btn btn-success">Start Exam</button></td>
        </tr>                        
    </tbody>
    </table>


</div>
</div>
</div>
</div>
</div> 


<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "YOU CLICKED ME!";
}
</script>
    <!-- Script -->
    <script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#employee_search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('employees.getEmployees')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           // Set selection
           $('#employee_search').val(ui.item.label); // display the selected text
           $('#employeeid').val(ui.item.value); // save selected id to input
           $('#employeeid2').val(ui.item.examcode); // save selected id to input
           return false;
        }
      });

    });
    </script>
  </body>
</html>