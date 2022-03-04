@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
<?php 
    $exam = DB::table('exam')->where('examcode',$examcode)->first(); ?>
               
<div class="container">
    <div class="col-lg-14">
        <div class="panel panel-default">
    
<div class="row">
<div class="col-lg-14">
        <div class="panel panel-default">
            <div class="panel-heading"><h3> Subject:   {{$exam->examtitle}}</h3></div>
            <div class="panel-body">


            <!--------------------------EDITOR ----------------------------->
          
            <!--------------------------End EDITOR ----------------------------->




           
<form method="POST" action="/addnewquestion2" accept-charset="UTF-8">
                {{ csrf_field() }}

    <div class="form-grounp">    
          <span class="btn btn-danger">  Online/Offline :   </span>

   <select name="online" type="text" >
       <option value="1">Online</option>
       <option value="0">Offline</option>
                  </select>
               </div> <br><br><br><br>
               <table class="table>"><tr>
               <div class="form-grounp">    
                  <span>Question :</span>
                  <textarea class="ckeditor" id="editor" name="question"   value="" placeholder="Write Qestion Here ... " required></textarea>
               </div> 
               </tr><TR><td>

               <div class="form-grounp">    
               Option A :
               <textarea class="ckeditor" name="option_A"   value="" placeholder="Option_A" required></textarea>
            </div> 
            </td><td>
            <div class="form-grounp">    
               Option B :
               <textarea class="ckeditor" name="option_B" type="textarea" value="" placeholder="Option_B" required></textarea>
            </div> 
            </tr><TR><td>

            <div class="form-grounp">    
               Option C :
               <textarea class="ckeditor" name="option_C" type="textarea" value="" placeholder="Option_C" required></textarea>
            </div> 
            </td><td>
            <div class="form-grounp">    
               Option D :
               <textarea class="ckeditor" name="option_D" type="textarea" value="" placeholder="Option_D" required></textarea>
            </div> 
            </tr><TR><td>

               Correct_Option :
               <select class="form-control" name="correct_option" type="text" >
               <option value="A">A</option>
               <option value="B">B</option>
               <option value="C">C</option>
               <option value="D">D</option>
            </td><td></td>
            </table>

                     <div class="form-grounp">
                     </div>
         

         <div class="form-grounp">
         <input type="hidden" name="examcode" value="{{$examcode}}">
            <input class="btn btn-success" type="submit" value="Add New Qestion">
          </div>
  </form>
       </div>
    </div>
  </div>
</div>


@endsection