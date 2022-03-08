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
	<div class="col-lg-8">
		<div class="panel panel-default">

					<div class="panel-heading"><strong>Welcome {{Auth::user()->name}} {{Auth::user()->id}}</strong></div>
					<div class="panel-body">
            <p>
            Welcome <strong>{{Auth::user()->name}}</strong> to the Nazalwi Bussiness College Access Portal <strong>(Pems Exams)</strong>.
            </p> 
            <h1>{{$exam->examtitle}}</h1>

<!----------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Exam Title</div>
		  <div class="panel-body">
        <?php echo 'THIS IS PHP TEXT';  ?>
            <div class="panel-heading">Exam</div>
            {!! Form::open(['action' => ['PemsController@examsedit2',$exam->examcode], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
             {{Form::label('examtitle', 'Exam Title')}}<br>
             {{Form::text('examtitle', $exam->examtitle, ['class' => 'from-control', 'placeholder' => 'Exam Title','required'=>'required'])}}

              </div> 
              {{Form::submit('submit', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}
		  </div>
		</div>
	</div>
</div>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
     </div>
		</div>
	</div>
 
     </div>

    </div>
    </div>
    </div>
    </div>
  
@endsection


 