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
            <div class="panel panel-default">
                <div class="panel-heading">This Page to Insert Teachers Explain Subjects of  ACCPA/ACCEA Courses..</div>
                    <div class="panel-body">
                        <P>  </P>
                            
            <div class="col-lg-8">

 <h2>Insert New Teatcher Here...</h2>
        <form action="postinsertteachers" method="post">
                @csrf
                <table class="table">
<tr><td>
                <lable>Teacher Name : </lable></td><td><input type="text" name="name" value="" placeholder="Insert Teacher Name"><br>
               </td> </tr>
                <tr><td>

                <lable>Teacher Comment : </lable></td><td><input type="text" name="comment" value="" placeholder="Insert comment"><br> </td> </tr>
                <tr><td>
                <input type="submit" class="btn btn-success"  value="Insert Teacher"  > </td> </tr></table>
            </form>
    </div>
            <br />
            <br />
            <?php $teachers =  DB::table('teachers')->get(); ?>
        <table class="table">
        <tr><td>ID</td><td>Name</td><td>Comment</td><td>Action</td></tr>
        @foreach($teachers as $teacher)
        <tr><td>{{$teacher->id}}</td><td>{{$teacher->name}}</td><td>{{$teacher->comment}}</td><td><a class="btn btn-danger" href="/deleteteacher/{{$teacher->id}}" >Delete</a> <a  class="btn btn-warning"  href="/editteacher/{{$teacher->id}}" >Edit</a></td></tr>
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