@extends('layouts.masterpems')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')

<br>
<br>
<br>

<div class="container">    
    <div class="row">
        <div class="col-lg-12">
            <br><br><br>
                <div class="panel panel-default">   
                    <?php    $today = date('Y-m-d');
                        $n_today = strtotime($today);
                                // echo $today.'Date as number'.$n_today; ?>            
            <h2>Insert Teacher to Explain Courses..! <br/>
 	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">This Page to Insert Teachers Explain Subjects of  ACCPA/ACCEA Courses..</div>
                    <div class="panel-body">
                        <P>  </P>
                            
                    </div>
            </div>
        </div>
    </div>
 
    <br/>
    <div class='col-lg-12'>
        <div class="panel panel-default">
        <form action="updateteacher" method="post">
                @csrf
                <table class="table">
<tr><td>
                <lable>Teacher ID : </lable></td><td><input type="text" name="id" value="{{$teacher->id}}" placeholder="Insert Teacher Name">
                <input type="hidden" name="id0" value="{{$teacher->id}}" ><br>
               </td> </tr>        <table class="table">
<tr><td>
                <lable>Teacher Name : </lable></td><td><input type="text" name="name" value="{{$teacher->name}}" placeholder="Insert Teacher Name"><br>
               </td> </tr>
                <tr><td>

                <lable>Teacher Comment : </lable></td><td><input type="text" name="comment" value="{{$teacher->comment}}" placeholder="Insert comment"><br> </td> </tr>
                <tr><td>
                <input type="submit" class="btn btn-success"  value="Insert Teacher"  > </td> </tr></table>
            </form>
            <br />
            <br />
            <?php $teachers =  DB::table('teachers')->get(); ?>
        <table class="table">
        <tr><td>ID</td><td>Name</td><td>Comment</td><td>Action</td></tr>
        @foreach($teachers as $teacher)
        <tr><td>{{$teacher->id}}</td><td>{{$teacher->name}}</td><td>{{$teacher->comment}}</td><td><a href="/deleteteacher/{{$teacher->id}}" >Delete</a> <a href="/editteacher/{{$teacher->id}}" >Edit</a></td></tr>
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
        </div>
    </div>
</div>
@endsection()