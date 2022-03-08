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
        <form action="updatecourse" method="post">
                @csrf


                


<table class="table">
<tr><td><lable>Course Name : </lable></td><td>
            <input type="hidden" name="id0" value="{{$subject->id}}"  >
            <input type="text" name="id" value="{{$subject->id}}" placeholder="Insert Sub">
            <br>             </td> </tr>

<tr><td>
            <lable>Course Name : </lable></td><td><input type="text" name="name" value="{{$subject->name}}" placeholder="Insert comment"><br> 
            </td> </tr>
            <tr><td>

                <lable>Teacher Name : </lable></td><td>
                <select name="teacher_id" >
                    <?php $teachers = DB::table('teachers')->get(); ?>
                    <option value="{{$subject->teacher_id}}"><?php $tet = DB::table('teachers')->where('id',$subject->teacher_id)->first(); echo $tet->name; ?> </option><br>

                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option><br>
                    @endforeach
                </selecct>
               </td> </tr>
                <tr><td>
                <lable>Course Fee : </lable></td><td><input type="text" name="fee" value="{{$subject->fee}}" placeholder="Insert comment"><br>
                 </td> </tr>
                <tr><td>
                <lable>Course Comment : </lable></td><td><input type="text" name="comment" value="{{$subject->comment}}" placeholder="Insert comment"><br>
                 </td> </tr>
                <tr><td>
                <input type="submit" class="btn btn-success"  value="Insert Teacher"  > </td> </tr></table>
            </form>
            <br />
            <br />
            <?php $courses =  DB::table('subjects')->get(); ?>
        <table class="table">
        <tr><td>ID</td><td>Name</td><td>teacher</td><td>fee</td><td>Comment</td><td>Action</td></tr>
        @foreach($courses as $course)
        <tr><td>{{$course->id}}</td><td>{{$course->name}}</td><td>{{$course->teacher_id}}</td><td>{{$course->fee}}</td><td>{{$course->comment}}</td><td><a href="/deletecourse/{{$course->id}}" >Delete</a> <a href="/editcourse/{{$course->id}}" >Edit</a></td></tr>
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