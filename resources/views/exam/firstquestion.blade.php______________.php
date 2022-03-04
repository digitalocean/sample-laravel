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
                <div class="modal-footer" id="examover_footer">
                  <!--  <button type="button" onclick="home()" class="btn btn-warning">Home</button>
                    <button type="button" onclick="result()" class="btn btn-warning">Result</button>-->
                </div> 
                
        </div>
    </div>
</div>

<!-- Instruction -- -->
<!--- Error -- - -->
<div id="errorModal" class="modal fade" role="dialog">
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
 


<!--<div class="modal" tabindex="-1" role="dialog">-->
  
<div class="row">
    <div class="col-lg-12">
     <!--   <input id="time" type="text" value="{{$timeing}}" >-->
        <div class="modal-body">
     <script>   var timer2 = "{{$timeing}}:00";
var interval = setInterval(function() {
 var timer = timer2.split(':');
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  if(timer2 <1){
clearTimeout(timer);
element.innerHTML ='<h2>Countdown Complete!</h2>';
element.innerHTML += '<a herf="#">CliCK here now</a>';
}
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0) clearInterval(interval);
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  $('.countdown').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;
}, 1000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <div class="countdown"></div>-->


 

        @foreach($resultdata as $q)

        <?php $question = DB::table('exam_question')->where('id',$q->ques_id)->first(); 
      //  echo '<br>This is timiiiiiiiiiiiiiiiiing'.$q->timing.'<br><br>';
        ?>

<form action="subquestion" method='POST'>
    @csrf
        <b><lable>Timer Exam Finished At: </lable><select name="timeing">
            <option  class="countdown">Timer</option>
        </select>
        </b>
        <div class="card">
            <div class="alert alert-light text-justify col-sm-12">
                    <input type="hidden" class="current_qusetion_no" id="" value='{{$question->id}}'>
                    
                    <h4 class="modal-title"><b>Ques no. <span class="setqno">{{$q->serial}}</span> : </b> {!!$question->question!!}</h4>
                    @if ($question->image != NULL)
                        <div>
                        <img class="img-responsive center-block" src="https://acpaglobal.net">
                        </div>
                    @endif
                    </div>
                    <div class="card-block ">
                        <!-- radio button -->
                       


                            <p class="col-sm-12">
                            <table class="table">
                            
                            <tr><td>
                            <script>
                        var res = "success Test Java Script pass data to PHP";
                        </script>
                       
                    </td><td> <?php
                       // echo "<script>document.writeln(res);</script>::";
                        ?>

                            
<!-----------------------TIMERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR__________________________________________________>-->
  


<script>
/*
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
};*/
 
</script>
<!--<div>Exam closes in <span id="time">{{$timeing}}:00</span> minutes!</div> -->

<!-----------------------TIMERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR__________________________________________________>-->

</td></tr>
                            
        <tr><td>
            <input type="radio" name="selected_option" value="A" required></td><td>
            <label >{!!$question->option_A!!}</label></td></tr>
            @if ($question->image_A != NULL)
                <div>
                    <img class="img-responsive center-block" style="max-width: 250px; max-height: 359px;"  src="https://acpaglobal.net">
                </div>
            @endif
        </p>
        <p class="col-sm-12">
        <tr><td>
            <input type="radio" name="selected_option" value="B" required></td><td>
            <label>{!!$question->option_B!!}</label></td></tr>
            @if ($question->image_B != NULL)
                <div>
                    <img class="img-responsive center-block" style="max-width: 250px; max-height: 359px;"  src="https://acpaglobal.net/aecapp/public/images/{!!$question->image_B!!}">
                </div>
            @endif
        </p>
        <p class="col-sm-12">
        <tr><td>

            <input type="radio" name="selected_option" value="C" required></td><td>
            <label>{!!$question->option_C!!}</label></td></tr>
            @if ($question->image_C != NULL)
                <div>
                    <img class="img-responsive center-block" style="max-width: 250px; max-height: 359px;" src="https://acpaglobal.net/aecapp/public/images/{!!$question->image_C!!}">
                </div>
            @endif
        </p>
        <p class="col-sm-12">
        <tr><td>

            <input type="radio"  name="selected_option" value="D" required></td><td>
            <label  >{!!$question->option_D!!}</label></td></tr>
            </table>
            @if ($question->image_D != NULL)
                <div>
                    <img style="max-width: 250px; max-height: 359px;" class="img-responsive center-block"  src="https://acpaglobal.net/aecapp/public/images/{!!$question->image_D!!}">
                </div>
            @endif
            </p>
            
            <?php 
            
            $ques_id=$q->serial; echo $ques_id; 
            $serial=$q->serial +1; echo $serial; 
            ?>
 
<?php
                        echo "<script>document.writeln(res);</script>";
                        ?>

<?php echo $attempdata->id;  ?>
<input type="hidden" name="examcode" value="{{$question->examcode}}" />
<input type="hidden" name="serial" value="{{$serial}}" />
    <input type="text" name="attempno" value="<?php echo $attempdata->id;  ?>" />
        <!--------- btn btn-outline-success select-button ---->
        <input type="submit"   class="btn btn-success" value="Save & Next">
        <input type="submit" name="bookmarking" value="1"  class="btn btn-info" value="BookMark This Question ">
        <!--------- btn btn-outline-info select-button ---
        <button type="button"  class="btn btn-info">BookMark This Question</button>-->
           <!-- <button type="button" onclick="finish()" class="Finshexam btn btn-outline-primary select-button hidden">Finish</button>-->
        
</form> 
                        <!-- End Radio Button -->
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <?php //$tmarks = $tmarks + $question->marks; ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                    </div>
                    <div class="row">
                            <div class="col-xs-12 text-center" style="margin-bottom:20px;">
                                @if ($question->id > 2)
                                <!--------- btn btn-outline-warning select-button ---->
                                <!--
                                <button type="button" onclick="Previous('{ {$ no-1}}',{ {$question->id}})" class="btn btn-warning">Previous</button>-->
                                @endif
                               
                            </div>
             <form action="showlastresult/{!!$question->examcode!!}">
             @csrf
             <input type="hidden" name="examcode" value="{{$question->examcode}}" />

             <input name="student_id" type="hidden" value="">

                    </div>
                    
                </div>
            
            </div>
     
        
            
        </div>
    </div>
</div>

<div id="styleSelector">

</div>
</div>
</div>
</div>
</div>          

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
<div id="status"></div>
<script type="text/javascript"> /* countDown(99,"status"); */</script>


@endforeach

@endsection