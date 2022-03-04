@extends('layouts.masterpass1')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')
<script type="text/javascript">
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});
</script>






<style>
    .modal-ku {
        width: 750px;
        margin: auto;
    }
</style>

<?php   
                    $exams = DB::table('exam')->where([['examcode',$exam->examcode],['examtitle','!=','Empty']])->limit(20)->get();
                    ?>
  <!-- Pre-loader start -->
  <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>

<!-- Exam Over -- -------------------------------------- -->
<div class="container-fluid bg-secondary hidden" style="height:100vh" id="examover">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Exam Over</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body alert alert-primary">
                    <div class="row" style="margin:0px;">
                        <div class="col-sm-14" >
                        <h3> Please Wait ....<h3>
                        <h3> Don't Press Back Button<h3>
                        </div>
                        <div class="col-sm-14" >
                          <h3>  Don't Refresh <h3>
                        </div>
                        <div class="col-sm-14 hidden" id="active_process">
                            <span class="card-text "> <i class="fa fa-spinner fa-spin" ></i> Pls Wait Processing Your Response.... </span>
                        </div>
                    </div>
                </div>
                
                <!-- Modal footer --> 
                <div class="modal-footer"  >
                  <!--  <button type="button" onclick="home()" class="btn btn-warning">Home</button>
                    <button type="button" onclick="result()" class="btn btn-warning">Result</button>-->
                </div> 
                
        </div>
    </div>
</div>

    <!-- Instruction -- -->
    <!--- Error -- - -->
    <div  class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
                <p>We can’t connect to the server</p>
                <p>Try again later. </p>
                <p>Check your network connection.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
    </div>

<div class="container-fluid bg-secondary" id="instruction" >

<!--<div class="modal" tabindex="-1" role="dialog">-->
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" style="color:#FF4500;" >Exam Instruction</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<table>


<thead>
     
        @foreach($exams as $exam)
        <tr style="background-color:00f;">
        <th style="background-color:00f;"><h1 style="color:#DAA520;background-color:#F5FFFA;padding-top:20px;padding-bottom:20px;">{{$exam->realcode}} </h1> </th>
        <th><h1 style="color:#DAA520;background-color:#F5FFFA;padding-top:20px;padding-bottom:20px;">{{ $exam->examtitle}} </h1></th>
        <td>

        <?php 
        $userid = Auth::user()->student_id;
                $proctors = DB::table('proctordate')->where([['subject_id',$exam->examcode],['user_id',$userid],['used',0]])->count() ;
                if($proctors != 0){
                    //echo '<a href="http://127.0.0.1:8001/exam/start/'.$exam->examcode.'/'.$  title.'/NBC/SSC/120"><button class="btn btn-success">Start Exam</button></a>';
                }else{ //echo '<button class="btn btn-danger" disabled>Not Ready</button>';

                }
        ?>
        
        </td>
    </tr>
    @endforeach
</table>
        <?php //$timeing = 400; 
        $ref_result = DB::table('ref_result')->where('id',$attempno)->first();
        $ref_result = DB::table('result')->where('attempno',$attempno)->where('givenmarks',null)->first();
        $ref_results = DB::table('result')->where('attempno',$attempno)->where('givenmarks',null)->get();

        $yourdatetime = $ref_result->timing;
        $timestamp = strtotime($yourdatetime);
        //echo 'Minutes:' . date('i', $timestamp); // Minutes: 04


        $i=1;
        foreach($ref_results as $ref){
            $i = $i +1;
        }
        $totq = $i -1;

        ?>
     <!--   <p>Modal body text goes here.</p>-->
<table class="table table-bordered">
    <thead>
      <tr style="background-color:00f;">
        <th style="background-color:00f;">No. of Question : </th>
        <th><span class="text-right nopadding" >{{$totq}}</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Total Marks :</td>
        <td><span class="text-right nopadding" >100%</span></td>
      </tr>
    <!-- <tr>
        <td>Re-Attempt Allowed :</td>
        <td><span class="text-right nopadding"><?php //if($ qno>10){echo 'No';}else{echo 'Yes';}  ?></span></td>
      </tr>-->
      <tr>
        <td>Exam Time : </td>
        <td><span class="text-right nopadding">{{$ref_result->timing}}<?php //if($exam->examcode == 66){echo "30:00";}else{echo "120:00";} ?>  min</span></td>
      </tr>
      <tr>
        <td>Attempt No : </td>
        <td><span class="text-right nopadding">{{$attempno}} </span></td>
      </tr>
  </tbody>
  </table>

                        <h4 class="modal-title">Notes</h4>
                        <b>
                        <div class="col-sm-14">
                <input type="button" class="btn btn-outline-danger select-button" value="Don't press back Button"> 
                        </div>
                        <div class="col-sm-14">
                        <input type="button" class="btn btn-outline-danger select-button" value=" Result Declaration After Exam"> 
                                                   </div>
                        <div class="col-sm-14">
                       <input type="button" class="btn btn-outline-danger select-button" value="Marks and Neg. Marks Show during Exam"> 
                                                    </div>
                        <div class="col-sm-14">
                         </div>

                        </b>
    
      </div>
 
       <!-- Modal footer --> 
        <div class="modal-footer">
            <div id="examloader" class="hidden">
                <div class="ball-scale">
                    <div class='contain'>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                        <div class="ring"><div class="frame"></div></div>
                    </div>
                </div>
            </div> 
            <div class="alert alert-success hidden" id="pls_wait_preparing_exam_room">Pls wait ... Preparing Exam Room</div>
           
    <form action="firstquestion" method="post">
        @csrf
            <input type="hidden" name="attempno" value="{{$attempno}}">
            <input type="hidden" name="timeing" value="<?php if($exam->examcode == 66){echo "30:00";}else{echo "120:00";} ?>}"> 
            <input type="submit" value="Start Exam" class="btn btn-info">
    </form>
        </div> <!--
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
      </div>
    </div>
  </div>
</div >
<!-----------------------TIMERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR__________________________________________________>-->
  


<script>

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            window.close();
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * '{{$timeing}}',
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
 
</script>
 
<br><br><br><br>
<!-- <div>Exam closes in <span id="time">{{$timeing}}:00</span> minutes!</div> -->

<br><br><br><br>

<!-----------------------TIMERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR__________________________________________________>-->

 

<script type="text/javascript">
/*
function countDown(secs,elem){
var element = document.getElementById(elem);
element.innerHTML = "Please wait for "+secs+" Seconds";
if(secs <1){
clearTimeout(timer);
element.innerHTML ='<h2>Countdown Complete!</h2>';
element.innerHTML += '<a herf="#">CliCK here now</a>';
}
secs--;
var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);

}*/
</script>
<!--<div id="status"></div>
<script type="text/javascript">countDown(10,"status");</script>-->


 

@endsection