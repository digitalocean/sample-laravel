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
            <h2>Insert Subject For Teachers <br/>
 	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">This Page to Insert Subjects For explaining ACCPA/ACCEA Courses..</div>
                    <div class="panel-body">
                        <P>  </P>
                            
                    </div>
            </div>
        </div>
    </div>
 
    <br/>
    <div class='col-lg-12'>
        <div class="panel panel-default">
        <form action="insertexplainfee" method="post">
                @csrf
                <input type="text" name="student_id" value="" placeholder="Insert Member_id">
                <input type="text" name="subject_id" value="" placeholder="Subject_id">
                <input type="text" name="teacher_id" value="" placeholder="Teacher_id">
                <input type="text" name="fee" value="" placeholder="Fee">
                <input type="text" name="comment" value="" placeholder="Insert comment">
                <input type="submet"   value="Insert Teacher"  >
            </form>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection()