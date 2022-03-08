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
					<div class="panel-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewquestion">Add New Question</button>
           <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Question id</th>
             <th> Question </th>
             <th> Action</th>
              
             </tr></thead><tbody>
             @foreach($exam as $exam1)
             <tr>
             <td>{{$exam1->id}}</td>
             <td>{{$exam1->question}}</td>
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
  <div class="modal-dialog" role="document">
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
             {{Form::label('question', 'Question')}} </th><td>
             {{Form::textarea('question', $exam1->question, ['class' => 'from-control', 'placeholder' => 'Question','required'=>'required'])}}
             </td></tr></thead>
              </div> 
              
              <div class="form-group"><tr><td>
              <span class="btn btn-danger">             
             {{Form::label('Online-Offline', 'Online or Offline')}}</span></td><td>
             {!! Form::select('online', array('1' => 'Online', '0' => 'Offline'), 'S'); !!}</td></tr>
             </div>

              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-A')}} </td><td>
             {{Form::text('option_A', $exam1->option_A, ['class' => 'from-control', 'placeholder' => 'option_A','required'=>'required'])}}
             </td></tr>
</div>  
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-B')}} </td><td>
             {{Form::text('option_B', $exam1->option_B, ['class' => 'from-control', 'placeholder' => 'option_B','required'=>'required'])}}
             </td></tr>
 </div> 
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-C')}} </td><td>
             {{Form::text('option_C', $exam1->option_C, ['class' => 'from-control', 'placeholder' => 'option_C','required'=>'required'])}}
             </td></tr>
 </div> 
              <div class="form-group"><tr><td>
             {{Form::label('realcode', 'Option-D')}} </td><td>
             {{Form::text('option_D', $exam1->option_D, ['class' => 'from-control', 'placeholder' => 'option_D','required'=>'required'])}}
             </td></tr>
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
             {!! Form::open(['action' => ['PemsController@addnewquestion',$examcode], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
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


 