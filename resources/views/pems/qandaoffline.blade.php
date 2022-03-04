@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  

   
       
  
     <?php $exam1 = $qcount; 
            $no = 1;
             ?>
<div class="container">
    <div class="col-lg-12">
        <div class="panel panel-default">
    
<div class="row">
<div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Subject {{$examcode}} {{$qno}}</div>
            <div class="panel-body">
                <form method="POST" action="/selectexamoffline" accept-charset="UTF-8">
                    {{ csrf_field() }}

                    <label for="subjectid"> Select Subject</label>
                        <select id="subjectid" name="subjectid">
                        <option value="0">Select a Subject</option>

                        @foreach($exam as $e)
                        <option value="{{$e->examcode}}">{{$e->examtitle}}</option>
                        @endforeach
                        </select>
                                                        
                    <input class="btn btn-default" type="submit" value="Choose">

                 </form>
                

                 <form action="/pems/addnewquestion1" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="examcode" value="{{$examcode}}">
                <input type="submit"  value="Add New Question ! ">
              </form>
 




<!-- Modal addnewquestion-->
<div class="modal fade" id="addnewquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 

<!----------------------------------------------------------------------------------------------------------------------------------------------->
<!--<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Exam Title</div>
		  <div class="panel-body">
        < -->

    <form method="POST" action="/addnewquestionoffline/{{$examcode}}" accept-charset="UTF-8">
					{{ csrf_field() }}

         <div class="form-grounp">    
                   <span class="btn btn-danger">  Online/Offline :   </span>

            <select name="online" type="text" >
                <option value="1">Online</option>
                <option value="0">Offline</option>
                </select>
         </div> <br><br><br><br>
<table class="table>"><tr>
        <div class="form-grounp">    
            <span>Question :</span>
            <textarea class="form-control" id="summernote" name="question"   value="" placeholder="Write Qestion Here ... " required></textarea>
         </div> 
</tr><TR><td>

         <div class="form-grounp">    
            Option A :
            <textarea class="form-control" name="option_A"   value="" placeholder="Option_A" required></textarea>
         </div> 
</td><td>
         <div class="form-grounp">    
            Option B :
            <textarea class="form-control" name="option_B" type="textarea" value="" placeholder="Option_B" required></textarea>
         </div> 
         </tr><TR><td>

         <div class="form-grounp">    
            Option C :
            <textarea class="form-control" name="option_C" type="textarea" value="" placeholder="Option_C" required></textarea>
         </div> 
</td><td>
         <div class="form-grounp">    
            Option D :
            <textarea class="form-control" name="option_D" type="textarea" value="" placeholder="Option_D" required></textarea>
         </div> 
         </tr><TR><td>

             Correct_Option :
            <select class="form-control" name="correct_option" type="text" >
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
 </td><td></td>
 </table>
         <div class="form-grounp">
          </div>
         

         <div class="form-grounp">
            <input class="btn btn-success" type="submit" value="Add New Qestion">
            <a href="/examQedit/{{$examcode}}" class="btn btn-danser">Clear Qestion Details</a>
         </div>
  </form>
       </div>
    </div>
  </div>
</div>

 
           </div>
    </div> 
</div>
 
@if($exam1 != 0)
	<div class="col-lg-6">
        <div class="panel panel-default">
        <div class="panel-heading">Subject Question 
        <?php 
        $no = 1;
        $exam = DB::table('exam')->where('examcode',$examcode)->first();
     $questions2 = DB::table('exam_question')->where([['examcode',$examcode],['online',0]])->get();
        echo $exam->examtitle; ?> {{$examcode}} {{$qno}}</div>
                <div class="panel-body">
                    <form method="POST" action="/selectexamquestionnooffline" accept-charset="UTF-8">
                    {{ csrf_field() }}

                        <label for="questionid"> Select Question</label>
                            <select id="qno" name="qno">
                                <option value="0">Select a Subject</option>
                                @foreach($questions2 as $qu)
                                
                              <option value="{{$qu->id}}">
                               {{$no}} {{$qu->question}}
                              </option>

                                     <?php   $no = $no+1; ?>
                                @endforeach
                    </select>
                     
                        <input class="btn btn-default" type="submit" value="Choose">
                    
                    </form>
 

               </div>
        </div> 
    </div>
</div>
@endif
<br>


@if($qno != 0)
		            <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">Subjected Question {{$examcode}} {{$qno}}</div>

                        <label for="questionid">  Question</label>
                            <div class="panel-body">
                           

                            {!! Form::open(['action' => ['PemsController@exameditquestionoffline',$qqq->examcode], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
 
             {{Form::hidden('id', $qqq->id, ['class' => 'from-control', 'placeholder' => 'ID','required'=>'required'])}}
             


             <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">
             {{Form::label('question', 'Question')}} <br>
             {{Form::textarea('question', $qqq->question, ['class' => 'ckeditor', 'placeholder' => 'Question','required'=>'required'])}}
             </th>
             <td>
              <span class="btn btn-danger">             
             {{Form::label('Online-Offline', 'Online or Offline')}}</span><br>
             {!! Form::select('online', array('1' => 'Online', '0' => 'Offline'), 'S'); !!}</td>
             </tr></thead>
              </div> 
               

              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-A')}}<br>
             {{Form::textarea('option_A', $qqq->option_A, ['class' => 'ckeditor', 'placeholder' => 'option_A','required'=>'required'])}}

 </td><td>
            {{Form::label('realcode', 'Option-B')}}<br>
            {{Form::textarea('option_B', $qqq->option_B, ['class' => 'ckeditor', 'placeholder' => 'option_B','required'=>'required'])}}

             </td></tr>
</div>  
              <div class="form-group"><tr><td>
              </td><td>
             </td></tr>
 </div> 
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-C')}}<br>
             {{Form::textarea('option_C', $qqq->option_C, ['class' => 'ckeditor', 'placeholder' => 'option_C','required'=>'required'])}}
             </td>
             <td>
             {{Form::label('realcode', 'Option-D')}} <br>
             {{Form::textarea('option_D', $qqq->option_D, ['class' => 'ckeditor', 'placeholder' => 'option_D','required'=>'required'])}}
             </td>
             </tr>
 </div> 
               
               
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Correct_Option')}}</td><td>
             {{Form::text('correct_option', $qqq->correct_option, ['class' => 'from-control', 'placeholder' => 'correct_option','required'=>'required'])}}
             </td></tr>
  </div> 
           <tr><td></td><td>   {{Form::submit('submit', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}</td></tr></table>               
                                    
                            </div>
                    </div> 
                </div>
            </div>
       @endif
        </div>
				
      
 			
	</div>
</div>
   
</div>
                             
  @endsection