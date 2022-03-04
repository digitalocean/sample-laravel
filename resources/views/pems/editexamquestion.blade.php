@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')
<h3>Pems Exams</h3>
<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-16">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Questions Home Page  </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">

					<div class="panel-heading">Welcome <strong>  </strong></div>
					<div class="panel-body">
            <p>
            Welcome <strong> </strong> to the Nazalwi Bussiness College Edit exams titles and Codes <strong>(Pems Exams)</strong>.
            </p> <?php
          // $questions =  DB::table('exam')->get();
           $i=0;
            ?>
            <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Option A</th>
                <th scope="col">Option B</th>
                <th scope="col">Option C</th>
                <th scope="col">Option D</th>
                <th scope="col" >Answer</th>
                <th scope="col" >Change Correct Option</th>
                <th scope="col" >Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
            <tr>
            <td>
            <?php $i=$i+1; ?>
            
            <b>{{$question->id }}</b><?php echo " - "  ?></td>
            <td><b>{{$question->question}}</td> 
            <td><b>{{$question->option_A}}</td> 
            <td><b>{{$question->option_B}}</td> 
            <td><b>{{$question->option_C}}</td> 
            <td><b>{{$question->option_D}}</td> 
            <td><b>{{$question->correct_option}}</td> 
            <td><!--<a calss="btn btn-success" href="/examsedit/{{$question->examcode}}">Edit Exam Title</a>-->
                <!-- Button trigger modal -->
                
              <td> 
              <td><!--<a calss="btn btn-success" href="/examsedit/{{$question->examcode}}">Edit Exam Title</a>-->
                <!-- Button trigger modal -->

                <form method="POST" action="https://acpaglobal.net/pems/changequrrecroption" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$question->id}}">
                   <select name="select_option">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
            <input type="submit" value="Change Correct_Option">
                </form>


                </td>

              <td>
              <a href="/pems/deletequestion/{{$question->id}}/{{$question->examcode}}" class="btn btn-warning" >Delete </a>
            </td>
            <!--
            <button class="btn btn-warning">Edit</button>-->

            </tr>
            @endforeach
            </tbody>
            </table>
                        </div>
		</div>
	</div>


     </div>

    </div>
    </div>
    </div>
    </div>
    @foreach($questions as $question)
    <?php $i=$i+1; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$question->examcode}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Exam Title  </h5>
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
        <?php //echo 'THIS IS PHP TEXT';  ?>-->
             {!! Form::open(['action' => ['PemsController@examsedit2',$question->examcode], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
             {{Form::label('examtitle', 'Exam Title')}}<br>
             {{Form::text('examtitle', $question->question, ['class' => 'from-control', 'placeholder' => 'Exam Title','required'=>'required'])}}
              </div> 
              <div class="form-group">
             {{Form::label('realcode', 'Exam Code')}}<br>
             {{Form::text('realcode', $question->question, ['class' => 'from-control', 'placeholder' => 'Exam Code','required'=>'required'])}}
              </div> 
              {{Form::submit('submit', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}
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
@endsection


 