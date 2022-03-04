@extends('layouts.masterpems')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')
  
<div class="container">    
  	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">This Page to Insert Lectures to existing courses..</div>
                    <div class="panel-body">
                        <P>  </P>
                    
  
        <form action="uploadlectures" method="post"  enctype="multipart/form-data">
                @csrf
            <table class="table table-hover">
                <thead class="thead-dark">
            
                    <tr>
                        <td>
                            <lable>Lecture Name : </lable></td><td><input type="text" name="name" value="" placeholder="Insert Lecture Name"><br>
                        </td> 
                    </tr> 
               </thead>
               <tbody>
                 <tr>
                    <td>

                        <lable>Lecture subject_id : </lable></td><td>
                            <select  name="subject_id" >
                            <?php $subjects =  DB::table('subjects')->get(); ?>
                            @foreach($subjects as $subject)

                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                        <br>
                            @endforeach
                            
                     </td> </tr>
                <tr><td>

                <lable>Lecture file : </lable></td><td><input type="file" name="filename" value="" placeholder="Insert file"><br> </td> </tr>
                
                <tr><td>

                <lable>Lecture Comment : </lable></td><td><input type="text" name="comment" value="" placeholder="Insert comment"><br> </td> </tr>
               <tr><td>
                <input type="submit" class="btn btn-success"  value="Insert Lecture"  > </td> </tr></table>
            </form>
            <br />
            <br />
            <?php $lectures =  DB::table('lectures')->get(); ?>
                <table class="table">
                    <tr><td>ID</td><td>Name</td><td>Comment</td><td>Action</td></tr>
                    @foreach($lectures as $lecture)
                    <tr><td>{{$lecture->id}}</td><td>{{$lecture->name}}</td><td>{{$lecture->comment}}</td><td><a href="/deletelecture/{{$lecture->id}}" >Delete</a> <a href="/editlecture/{{$lecture->id}}" >Edit</a></td></tr>
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