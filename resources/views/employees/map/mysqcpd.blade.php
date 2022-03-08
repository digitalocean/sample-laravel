@extends('layouts.mastermap')
@section('content')
<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>  </h4>
                    </div>
                    <div class="panel-body">
                    <div style="width:100%">


<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">STEP 1: Enter & Save a Course/Activity</div>
		  <div class="panel-body">
		  <form  action="/create1" method="post" accept-charset="UTF-8">
		    @csrf
            <div class="form-group">
				<label for="courseid2">Member: </label>
     <input class="form-control" disabled="disabled" name="courseid2" type="text" value='{{Auth::user()->id}}' id="courseid2">
			</div>
		  	<div class="form-group">
				<label for="coursetitle">Course Title: </label>
				<input class="form-control" required="required" type="text" id="coursetitle" name="coursetitle" >
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<input class="form-control" required="required" name="description" type="text" id="description">
			</div>
			<div class="form-group">
				<label for="numberhourse">Number of Hours:</label>
				<input class="form-control" required="required" name="numberhourse" type="number" id="numberhourse">
			</div>
			<div class="form-group">
				<label for="coursestartdate">Course StartDate:</label>
				<input class="form-control" required="required" id="coursestartdate" name="coursestartdate" type="date">
			</div>
			<div class="form-group">
				<label for="courselocation">Course Location: </label>
				<input class="form-control" required="required" name="courselocation" type="text" id="courselocation">
			</div>
		    <input class="btn btn-success" type="submit" value="Save to your CPD record">


			</form>
		  </div>
		</div>
	</div>

<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Avialabe Courses/Activities</div>
			  <div class="panel-body">
      
              <ul>
               @foreach($courseactivites as $corse)
                <li>
                {{$corse->coursetitle}}
                </li>
                @endforeach
            </ul>
			  </div>
			</div>
	</div>
	<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">STEP 2: Upload Supporting Evidence </div>
			  <div class="panel-body">
			  	<!--<form method="POST" action="/uploadfile" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">-->
<<form enctype="multipart/form-data" method="POST" action="{!! route('coursePictureUpload') !!}">
    @csrf

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Course Picture Upload </label>

        <div class="col-md-6">
            <input  type="file" class="form-control" name="coursepic">
            <input  type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">

        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-success">Submit
            </button>
        </div>
    </div>
</form>
<!--
			<form method="POST" action="/coursePictureUpload" enctype="multipart/data" accept-charset="UTF-8">
                @ csrf
                <!--
		        { {csrf_field()}}
                { {method_field('post')}}-- >
                    <input class="btn btn-default" name="coursepic" type="file">
                    <input  type="hidden" class="form-control" name="_token" value="{ { csrf_token() }}">

			  		<input class="btn btn-primary" type="submit" value="Upload">
			  	</form>-->
			  </div>
			</div>
	</div>

	<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Uploaded Course / Activity Supporting Documents: </div>
			  <div class="panel-body">
   <table class="table">
   <thead>
    <tr>
    <th>Course Title</th>
    <th>Description</th>
    <th>No of Hours</th>
    <th>ID</th>
    </tr>
    </thead>
        <tbody>
        <?php
        $id = Auth::user()->id;
        // echo $id;
        $corses = DB::table('courseactivites')->where('user_id','=',$id)->get();
        $corseimage = DB::table('courseimg')->where('user_id','=',$id)->get();
        ?>
           @foreach($corses as $corse)
        <tr>
            <td>{{$corse->coursetitle}}</td>
            <td>{{$corse->description}}</td>
            <td>{{$corse->numberhourse}}</td>
            <td>{{$corse->id}}</td>
            </tr>@endforeach


        </tbody>
        </table>
        <table>
 @foreach($corseimage as $img)
<tr>
<td><p><img src="{{asset('/public/img1/'.$img->courseimg)}}" heigh="200"></p></td>
</tr>
@endforeach
</table>



        </div>
</div>
    </div>

</div>

    </div>
</div>


</div>
</div>

@endsection



