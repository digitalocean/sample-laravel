@extends('layouts.master')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')

<br>
<br>
<?php $exams = DB::table('exam')->limit(5)->get();
$i=0;
$id2=0;
$j=-1;
$j=0;
$array=[1=>null,2=>null,3=>null,4=>null,5=>null,6=>null,7=>null];
 $ex_id=0;
 ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#1">
  Start Exam<i class="cil-arrow-thick-from-right"></i> 

</button>
<!--------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal -->
<div class="modal fade" id="1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <form action="#2">
		  
		  <h1> Modal 1</h1>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#2">Launch demo modal<i class="cil-arrow-thick-from-right"></i></button> 
	    </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------->
@foreach($exams as $exam)

<!-- Modal -->
<div class="modal fade" id="{{$exam->examcode}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <h1> Exam   :  {{$exam->examtitle}}</h1>
	   {{$exam->examcode}}
      </div>
      <div class="modal-footer">
      <!--  <button type="button" class="btn btn-se     ///data-dismiss="modal"// n  condary" data-dismiss="modal" ata-toggle="modal" data-target="< ?php $ex_id=$exam->examcode+1;echo '#'.$ex_id; ?>">Book Marking Question</button>-->
      <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="
      <?php
     if($ex_id<5){
      $ex_id=$exam->examcode+1;echo '#'.$ex_id;
      }
        ?>">Next<i class="cil-arrow-thick-from-right"></i></button> 

<button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="
      <?php
      $array[$j]=$exam->examtitle;
      $j=$j+1;
      $k=$j+1;
     if($ex_id<5){
      $ex_id=$exam->examcode+1;echo '#'.$ex_id;
      }else{echo $array[$j-1];}
        ?>">skip<i class="cil-arrow-thick-from-right"></i></button> 
<!--
    <button type="button" class="btn btn-danger"  data-dismiss="modal"  data-target="< ?php
                //$ex_id=$exam->examcode+1;
                  $array[$j]=$exam->examtitle;
                  $j=$j+1;
                  $k=$j+1;
                  echo '#'.$ex_id;  
     ?>">Book Marking Question<i class="cil-arrow-thick-from-right"></i></button>--> 
     <button>Finish <?php echo 'Arr: '.$array[$j-1].'J='.$j.' k = '.$k.' ex-id = '.$ex_id; ?></button>
      </div>
    </div>
  </div>
</div>
@endforeach
<h1>ARRAY </h1>
<?php
$i=0;

$testArray = [
    'first'  => 'The first value',
    'second' => 'The second value',
    'third'  => 'The third value',
    $i => 'Item 0'.$i,
];

// Create a new Fluent instance.
//$fluent = new Fluent($testArray);

// Accessing a value like an array.
//$value = $fluent['first'];

// Accessing a value like an object.
$secondValue = $testArray['first'];
echo $secondValue;
echo $testArray[$i];

?>
<!--------------------------------------------------------------------------------------------------------------------------------->
@endsection