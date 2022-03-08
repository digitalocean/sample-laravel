@extends('layouts.masterpems')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')

 
<div class="container">    
    <div class="row">
        <div class="col-lg-12">
            <br><br><br>
                <div class="panel panel-default">   
                    <?php    $today = date('Y-m-d');
                        $n_today = strtotime($today);
                                // echo $today.'Date as number'.$n_today; ?>            
      
                         
  
        <form action="postinsertcourse" method="post">
                @csrf
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr><th>Insert New Course Here ..... !</th>         
                    </thead>            
                    <tbody>


                    <tr><td>
            <lable>Course Name : </lable></td>
                <td><input type="text" name="name" value="" placeholder="Insert Course Name"><br> 
            </td> </tr>
            <tr><td>
                <lable>Teacher Name : </lable></td><td>
                <select name="teacher_id" >
                    <?php $teachers = DB::table('teachers')->get(); ?>
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option><br>
                    @endforeach
                </selecct>
               </td> </tr>
                <tr><td>
                <lable>Course Fee : </lable></td><td><input type="text" name="fee" value="" placeholder="Insert Fee"><br>
                 </td> </tr>
                <tr><td>
                <lable>Course Comment : </lable></td><td><input type="text" name="comment" value="" placeholder="Insert comment"><br>
                 </td> </tr>
                <tr><td>
                <input type="submit" class="btn btn-success"  value="Insert Course"  > </td> </tr></table>
            </form>
            <br />
            <br />
            <?php $courses =  DB::table('subjects')->get(); ?>
        <table class="table">
        <tr><td>ID</td><td>Name</td><td>teacher</td><td>fee</td><td>Comment</td><td>Action</td></tr>
        @foreach($courses as $course)
        <tr><td>{{$course->id}}</td><td>{{$course->name}}</td><td>{{$course->teacher_id}}</td><td>{{$course->fee}}</td><td>{{$course->comment}}</td><td><a class="btn btn-danger" href="/deletecourse/{{$course->id}}" >Delete</a> <a class="btn btn-warning"  href="/editcourse/{{$course->id}}" >Edit</a></td></tr>
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