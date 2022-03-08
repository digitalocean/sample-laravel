@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')      
     <br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading " style="background-color:#DC143C;color:white;">bulkemail</div>
      <div class="panel-body">
   

  <div class="col-lg-8"style="background-color:#FFFAF0;color:white;">
		<form action="sendbulkemail" method="post" enctype="multipart/form-data">
      @csrf
        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
        <input type="text" class="form-control" data-rule="required" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
        <input type="hidden" class="form-control" name="student_id" value="{{Auth::user()->student_id}}" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
         <textarea class="form-control" name="body" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
        <input class="form-control" type="file" name="file" id="upload_file">
          <button style="background-color:#DC143C;color:white;" type="submit" >Send Message</button></div>
      </form>
          </div>

        </div>

      </div>

 						<!--	<img src='images/PEMS-Logo.png' style="float:left"/>-->
                </div>
            </div>
       </div>
 </div>     

  
</div>
@endsection