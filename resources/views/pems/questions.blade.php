@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')
<h3>Questions</h3>
<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Questions Home Page  </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">

					<div class="panel-heading">Welcome <strong>{{Auth::user()->student_id}} : {{Auth::user()->name}} </strong></div>
					<div class="panel-body">
            <p>
            Welcome <strong>{{Auth::user()->name}}</strong> to the Nazalwi Bussiness College Access Portal <strong>(Questions)</strong>.
            </p> 
            <?php
           $exams =  DB::table('exam')->get();
           $i=0;
            ?>
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Exam Code</th>
                <th scope="col">Titile</th>
                <th scope="col" >Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($exams as $exam)
            <tr><td>
             
            <h4>{{$exam->realcode}} - </td>
            <td><b>{{$exam->examtitle}}</td> </h4>
            <td>
            <!------------------------------------------------------------------------------------------------------------------------------------------------------------->
            {!! Form::open(['action' => ['PemsController@examQedit',$exam->examcode], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">

              </div> 
              {{Form::submit('Add & Edit Questions', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}
            <!------------------------------------------------------------------------------------------------------------------------------------------------------------->
            </td>
            <!--<td><button type="submit" class="btn btn-warning">Edit Exam Questions111</button></td>-->
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

@endsection


 