@extends('layouts.master')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')

<br>
<!-- Header Carousel -->

<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default" style="border:none;">
                    <div style="margin:0 auto; padding:10px; font-weight: bold; text-align: center;">
                        <h4>Professional Membership Levels  </h4>
                    </div>
                    <div class="panel-body">
                       <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Member Levels <h4>
                    </div>
                    <div class="panel-body">
                          
    <table style="background-color:#FF8C00; boarder:solid 1px #FF8C00;">
     <tr><td><h4>Membership<h4></td><td>Name</td><td></td></tr>
        <tr><td>{{$user->student_id}}</td><td>{{$user->name}}</td><td></td></tr>
        
    </table>
    <h1 align="center">Levels</h1>
    <style>
        tr{boarder:solid 1px #FF8C00;}
        td{boarder:solid 1px #FF8C00;}
    </style>
    <table class="table">
        <tr><th>Level</th><th>Certificate</th><th>Professional Membership</th></tr>
        @foreach($levels as $level)
        <?php $certificate = DB::table('levels')->where('levelcode',$level->levelname)->first(); ?>
        <tr><td style="background-color:#FF8C00; boarder:solid 1px #FF8C00;">{{$level->levelname}}</td>
        <td style="color:#FF8C00"> {{$certificate->certificate}} </td>
        <td style="color:#FF8C00">{{$certificate->certificate2}} {{$certificate->level}}</td>
        <td style="color:#FF8C00"></td>
        </tr>
        @endforeach
    </table>






     </div>
 





                </div>
            </div>
                <!-- end of irst -->
        </div>

 
</div>

                    </div>
                </div>


            </div>
            </div>
            </div>
          
@endsection
