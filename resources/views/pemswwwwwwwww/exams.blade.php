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
                        <h4>Exams Home Page  </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">

					<div class="panel-heading">Welcome <strong>{{Auth::user()->name}} {{Auth::user()->student_id}}</strong></div>
					<div class="panel-body">
            <p>
            Welcome <strong>{{Auth::user()->name}}</strong> to the Nazalwi Bussiness College Edit exams titles and Codes <strong>(Pems Exams)</strong>.
            </p> <?php
           $exams =  DB::table('exam')->get();
           $i=0;
            ?>
            <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Titile</th>
                <th scope="col" >Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($exams as $exam)
            <tr><td>
            <?php $i=$i+1; ?>
            
            <h4><b>{{$exam->realcode }}</b><?php echo " - "  ?></td>
            <td><b>{{$exam->examtitle}}</td> </h4>
            <td><!--<a calss="btn btn-success" href="/examsedit/{{$exam->examcode}}">Edit Exam Title</a>-->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$exam->examcode}}">
                Edit Exam Title
                </button>

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
    @foreach($exams as $exam)
    <?php $i=$i+1; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$exam->examcode}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
             {!! Form::open(['action' => ['PemsController@examsedit2',$exam->examcode], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
             {{Form::label('examtitle', 'Exam Title')}}<br>
             {{Form::text('examtitle', $exam->examtitle, ['class' => 'from-control', 'placeholder' => 'Exam Title','required'=>'required'])}}
              </div> 
              <div class="form-group">
             {{Form::label('realcode', 'Exam Code')}}<br>
             {{Form::text('realcode', $exam->realcode, ['class' => 'from-control', 'placeholder' => 'Exam Code','required'=>'required'])}}
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


 