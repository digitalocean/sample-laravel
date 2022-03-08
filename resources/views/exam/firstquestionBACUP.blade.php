@extends('layouts.master')
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
         <div class="modal-body">

        @foreach($resultdata as $q)

        <?php $question = DB::table('exam_question')->where('id',$q->ques_id)->first(); 
        echo '<br>This is timiiiiiiiiiiiiiiiiing'.$q->timing.'<br><br>';
        ?>
        
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
    <form action="firstquestion" method='POST'>
    @csrf


<p class="col-sm-12">
    <table class="table">
        <tr><td>
            </td><td>  
<script>
 var countDownDate = 
 <?php 
 $date = date('d-m-Y');
 $h = 2;
 $m = 0;
 $s = 0;
echo strtotime("$date $h:$m:$s" ) ?> * 1000;
var now = <?php echo time() ?> * 1000;

// Update the count down every 1 second
var x = setInterval(function() {
now = now + 1000;
// Find the distance between now an the count down date
var distance = countDownDate - now;
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
document.getElementById("demo").innerHTML = days + ": " + hours + ": " +
minutes + ": " + seconds ;
// If the count down is over, write some text 
if (distance < 0) {
clearInterval(x);
 document.getElementById("demo").innerHTML = "EXPIRED";
}
    
}, 1000);

    </script>     
<h5 id='demo'>pp</h5>       

<input name="timetime" id='demo' />
:::::
<?php
echo "<script>document.writeln(distance);</script>";
?>
</h5>  
 <input name="timetime" id='demo' value="<?php
echo "<script>document.writeln(distance);</script>";
?>"/>
:::
<?php
echo "<script>document.writeln(x);</script>";
?>

</h5>       
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
<div>Exam closes in <span id="time">88:00</span> minutes!</div> 

<input  id="demo" type="text" name="timeing" value="{{$timeing}}" ></div> 
 <!-----------------------TIMERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR__________________________________________________>-->

</td></tr>
                            
        <tr><td>
            <input type="radio" id="optionA{{$question->id}}" name="selected_option" value="A" required></td><td>
            <label for="optionA{{$question->id}}">{!!$question->option_A!!}</label></td></tr>
            @if ($question->image_A != NULL)
                <div>
                    <img class="img-responsive center-block" style="max-width: 250px; max-height: 359px;"  src="http://www.ACPA-Global.org">
                </div>
            @endif
        </p>
        <p class="col-sm-12">
        <tr><td>
            <input type="radio" id="optionB{{$question->id}}" name="selected_option" value="B" required></td><td>
            <label for="optionB{{$question->id}}" >{!!$question->option_B!!}</label></td></tr>
            @if ($question->image_B != NULL)
                <div>
                    <img class="img-responsive center-block" style="max-width: 250px; max-height: 359px;"  src="http://www.ACPA-Global.org/aecapp/public/images/{!!$question->image_B!!}">
                </div>
            @endif
        </p>
        <p class="col-sm-12">
        <tr><td>

            <input type="radio" id="optionC{{$question->id}}" name="selected_option" value="C" required></td><td>
            <label for="optionC{{$question->id}}">{!!$question->option_C!!}</label></td></tr>
            @if ($question->image_C != NULL)
                <div>
                    <img class="img-responsive center-block" style="max-width: 250px; max-height: 359px;" src="http://www.ACPA-Global.org/aecapp/public/images/{!!$question->image_C!!}">
                </div>
            @endif
        </p>
        <p class="col-sm-12">
        <tr><td>

            <input type="radio" id="optionD{{$question->id}}" name="selected_option" value="D" required></td><td>
            <label for="optionD{{$question->id}}">{!!$question->option_D!!}</label></td></tr>
            </table>
            @if ($question->image_D != NULL)
                <div>
                    <img style="max-width: 250px; max-height: 359px;" class="img-responsive center-block"  src="http://www.ACPA-Global.org/aecapp/public/images/{!!$question->image_D!!}">
                </div>
            @endif
            </p><?php $serial=$q->serial +1; //echo $serial; ?>



     <input type="hidden" name="serial" value="{{$serial}}" />
    <input type="hidden" name="attempno" value="<?php echo $attempdata->id;  ?>" />
        <!--------- btn btn-outline-success select-button ---->
        <input type="submit"   class="btn btn-success" value="Save & Next">
        <!--------- btn btn-outline-info select-button ---->
        <button type="button"  class="btn btn-info">BookMark This Question</button>
            <button type="button" onclick="finish()" class="Finshexam btn btn-outline-primary select-button hidden">Finish</button>
        
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
<style>

</style>
<button>Launch Popup</button>

<div id="popup" class="white-popup mfp-with-anim mfp-hide">
  <img src="https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2014/03/1396310862SitePoint-Logo-Small.jpg">
  <h1>Hello, World!</h1>
</div>

<p id="error"></p>

<?php /*
echo 'Now Time From Server:'.$nowtime.'<br><br><br><br>';
echo 'Now Time From Server:'.$nowplusa120.'<br><br><br><br>';
$now = date('h:i:s A');echo 'Now Time From Device:'.$now.'<br><br><br><br>';
        echo "<script>document.writeln(res);</script><br>";
        $time1 = date('h:i:s A', strtotime('+0 minutes'));
        $time2 = date('h:i:s A', strtotime('+40 minutes'));
echo $time1.'<br><br>'.$time2.'<br><br>';

$timesplit1=explode(':',$time1);
$min1=($timesplit1[0]*60)+($timesplit1[1])+($timesplit1[2]>30?1:0);
echo $min1.'<br><br>';


$timesplit2=explode(':',$time2);
$min2=($timesplit2[0]*60)+($timesplit2[1])+($timesplit2[2]>30?1:0);
echo $min2.'<br><br>';
$m = $min2 - $min1;
echo $m.'<br><br>';

$time='01:02:10';
    $timesplit=explode(':',$time);
    $min=($timesplit[0]*60)+($timesplit[1])+($timesplit[2]>30?1:0);
    echo '<br><br>'.$min.' Min'.'<br><br>';  // 62 Min



        $yourdatetime1 = date('h:i:s A', strtotime('+0 hours'));
        $yourdatetime2 = date('h:i:s A', strtotime('+2 hours'));
        $yourdatetime = strtotime($yourdatetime2) - strtotime($yourdatetime1);
       //$yourdatetime = "09:04:07";
        $timestamp = strtotime($yourdatetime);

$time2 = date('h:i', $timestamp);
echo '<br><br>'.$time2.' Min'.'<br><br>';  // 62 Min


$timesplit=explode(':',$time);
        $min=($timesplit[0]*60)+($timesplit[1])+($timesplit[2]>30?1:0);
        echo '<br><br>'.$min.' Min'.'<br><br>';  // 62 Min
    
        echo 'Hours:' . date('h', $timestamp);  // Hours: 04
        echo 'Minutes:' . date('i', $timestamp); // Minutes: 04
        echo 'Seconds:' . date('s', $timestamp); // Seconds: 07
   */
  
  
  
  ?>






<!-----------------------TIMERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
 <script type="text/javascript">

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

}
</script>
<div id="status"></div>
<script type="text/javascript">countDown(10,"status");</script>
RRRRRRRRRRRRRRRRR__________________________________________________>-->


@endforeach

@endsection