@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')
<h3>Pems Exams</h3>
    
<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Exams Home Page  </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">

					<div class="panel-heading"><strong>Welcome  {{Auth::user()->student_id}} : {{Auth::user()->name}}</strong></div>
					<div class="panel-body"><table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Question id</th>
                <th> Question </th>
                <th> examcode </th>
             <th> Action</th>
              <?php $exams = DB::table('exam')->get(); ?>
             </tr></thead><tbody>
             @foreach($exams as $exam12)
             <tr>
             <td>{{$exam12->realcode}}</td>
             <td>{{$exam12->examtitle}}</td>
             <td>{{$exam12->examcode}}</td>
             <td> <a type="button" class="btn btn-warning" href="editexam/{{$exam12->examcode}}">
                Edit Exam 
                </a></td>
             </tr>
            @endforeach
            </tbody></table>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewquestion">Add New Question</button>
           <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Question id</th>
                <th> Question </th>
                <th> examcode </th>
             <th> Action</th>
              
             </tr></thead><tbody>
             @foreach($exam as $exam1)
             <tr>
             <td>{{$exam1->id}}</td>
             <td>{{$exam1->question}}</td>
             <td>{{$exam1->examcode}}</td>
             <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$exam1->id}}">
                Edit Question 
                </button></td>
             </tr>
            @endforeach
            </tbody></table>
            
  </div>
		</div>
	</div>
  <!--examquestionedit-->

     </div>

    </div>
    </div>
    </div>
    </div>
    @foreach($exam as $exam1)
 
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$exam1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width:900px;">
        <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
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
             {!! Form::open(['action' => ['PemsController@exameditquestion',$exam1->examcode], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
 
             {{Form::hidden('id', $exam1->id, ['class' => 'from-control', 'placeholder' => 'ID','required'=>'required'])}}
             


             <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">
             {{Form::label('question', 'Question')}} <br>
             {{Form::textarea('question', $exam1->question, ['class' => 'description', 'placeholder' => 'Question','required'=>'required'])}}
             </th>
             <td>
              <span class="btn btn-danger">             
             {{Form::label('Online-Offline', 'Online or Offline')}}</span><br>
             {!! Form::select('online', array('1' => 'Online', '0' => 'Offline'), 'S'); !!}</td>
             </tr></thead>
              </div> 
               

              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-A')}}<br>
             {{Form::textarea('option_A', $exam1->option_A, ['class' => 'description', 'placeholder' => 'option_A','required'=>'required'])}}

 </td><td>
            {{Form::label('realcode', 'Option-B')}}<br>
            {{Form::textarea('option_B', $exam1->option_B, ['class' => 'description', 'placeholder' => 'option_B','required'=>'required'])}}

             </td></tr>
</div>  
              <div class="form-group"><tr><td>
              </td><td>
             </td></tr>
 </div> 
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-C')}}<br>
             {{Form::textarea('option_C', $exam1->option_C, ['class' => 'description', 'placeholder' => 'option_C','required'=>'required'])}}
             </td>
             <td>
             {{Form::label('realcode', 'Option-D')}} <br>
             {{Form::textarea('option_D', $exam1->option_D, ['class' => 'description', 'placeholder' => 'option_D','required'=>'required'])}}
             </td>
             </tr>
 </div> 
               
               
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Correct_Option')}}</td><td>
             {{Form::text('correct_option', $exam1->correct_option, ['class' => 'from-control', 'placeholder' => 'correct_option','required'=>'required'])}}
             </td></tr>
  </div> 
           <tr><td></td><td>   {{Form::submit('submit', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}</td></tr></table>
		  </div>
		<!--</div>
	</div>
</div>-->
<!----------------------------------------------------------------------------------------------------------------------------------------------->
      </div>
    </div>
  </div>
</div>
@endforeach

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

        <form method="POST" action="/addnewquestion/{{$exam1->examcode}}" accept-charset="UTF-8">
					{{ csrf_field() }}

         <div class="form-grounp">    
                   <span class="btn btn-danger">  Online/Offline :   </span>

            <select name="online" type="text" >
                <option value="1">Online</option>
                <option value="0">Offline</option>
                </select>
         </div> <br><br><br><br>

        <div class="form-grounp">    
            <span>Question :</span>
            <input class="form-control" name="question" type="textarea" value="" placeholder="Write Qestion Here ... " required>
         </div> 


         <div class="form-grounp">    
            Option A :
            <input class="form-control" name="Option_A" type="textarea" value="" placeholder="Option_A" required>
         </div> 

         <div class="form-grounp">    
            Option B :
            <input class="form-control" name="Option_B" type="textarea" value="" placeholder="Option_B" required>
         </div> 

         <div class="form-grounp">    
            Option C :
            <input class="form-control" name="Option_C" type="textarea" value="" placeholder="Option_C" required>
         </div> 

         <div class="form-grounp">    
            Option D :
            <input class="form-control" name="Option_D" type="textarea" value="" placeholder="Option_D" required>
         </div> 

             Correct_Option :
            <select class="form-control" name="correct_option" type="text" >
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
 
         <div class="form-grounp">
         <input name="process" type="hidden" value="q">
         </div>
         

         <div class="form-grounp">
            <input class="btn btn-success" type="submit" value="Add New Qestion">
            <a href="/examQedit/{{$exam1->examcode}}" class="btn btn-danser">Clear Qestion Details</a>
         </div>
  </form>



            <!-- {!! Form::open(['action' => ['PemsController@addnewquestion',$examcode], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!} 
             <div class="form-group">
             <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">
             {{Form::label('question', 'Question')}} </th><td>
             {{Form::textarea('question', '', ['class' => 'from-control', 'placeholder' => 'Question','required'=>'required'])}}
             </td></tr></thead>
              </div> 
                   
              <div class="form-group"><tr><td>
              <span class="btn btn-danger">             
             {{Form::label('Online-Offline', 'Online or Offline')}}</span></td><td>
             {!! Form::select('online', array('1' => 'Online', '0' => 'Offline'), 'S'); !!}</td></tr>
             </div>

              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-A')}} </td><td>
             {{Form::text('option_A', '', ['class' => 'from-control', 'placeholder' => 'option_A','required'=>'required'])}}
             </td></tr>
</div>  
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-B')}} </td><td>
             {{Form::text('option_B', '', ['class' => 'from-control', 'placeholder' => 'option_B','required'=>'required'])}}
             </td></tr>
 </div> 
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-C')}} </td><td>
             {{Form::text('option_C', '', ['class' => 'from-control', 'placeholder' => 'option_C','required'=>'required'])}}
             </td></tr>
 </div> 
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-D')}} </td><td>
             {{Form::text('option_D', '', ['class' => 'from-control', 'placeholder' => 'option_D','required'=>'required'])}}
             </td></tr>
  </div> 
               
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Correct_Option')}}</td><td>
             {{Form::text('correct_option', '', ['class' => 'from-control', 'placeholder' => 'correct_option','required'=>'required'])}}
             </td></tr>
  </div> 
           <tr><td></td><td>   {{Form::submit('submit', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}</td></tr></table>
		  </div>
		<!--</div>
	</div>
</div>-->
<!----------------------------------------------------------------------------------------------------------------------------------------------->
      </div>
    </div>
  </div>
</div>
 
@endsection


 