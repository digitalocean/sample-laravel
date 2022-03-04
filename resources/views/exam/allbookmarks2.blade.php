<!DOCTYPE html>
<html lang="en">
@include('includes.head')
 @include('includes.messages')
@include('inc.messages')
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Amaranth|Source+Sans+Pro" rel="stylesheet">
    <title></title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <!-- Bootstrap Core CSS -->
    <link href=" https://acpaglobal.net/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href=" https://acpaglobal.net/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=" https://acpaglobal.net/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
   </head>
<body>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container"> <img src=" https://acpaglobal.net/images/nbclogo.jpg" style="width:100px; height: 100px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
                <a class="navbar-brand" href=" https://acpaglobal.net/home" style="margin-top:25px; color:#fff;font-family: 'Amaranth', sans-serif;
font-family: 'Source Sans Pro', sans-serif; font-face:'Amaranth'">Nazlawi Bussiness College</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top:30px;padding-bottom:30px; ">
 
               <ul class="nav navbar-nav navbar-left">              
               <li><a href=" https://acpaglobal.net/pass/examhall">Welcome</a></li>
         
                
   
                </ul>
            </div>

 </div>
        <!-- /.container -->
    </nav>
    <br><br><br>

       
<div class="container">    
    <div class="row">
        <div class="col-lg-12">
           <div class="panel panel-default">   
                <p style="margin-top:10px; padding:10px;">
                Name: {{$user->name}}  - Member ID:  {{$user->student_id}} <br/>
                </p>
                <br><br><br>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table class="table"><tr><td>#</td><td>Result Status</td><td>ExamCode</td><td>Delete</td></tr>
                            @foreach($ref_results as $ref_result)
                            <tr>
                                <td> {{$ref_result->id}} :</td><td> {{$ref_result->pass}} :</td><td> {{$ref_result->examcode}}</td><td><a href="https://acpaglobal.net/deleteattemp/{{$ref_result->id}}">Delete </a></td>
                                <td><a href="/finishexam/{{$ref_result->id}}"  class="btn btn-danger pull-right" id="view-fullscreen" >Finished</a></td>

                            </tr>
                            @endforeach
                        </table>


                        <table class="table"><tr><td>#</td><td>Ques_id</td><td>Selected_option</td><td>AttempNO</td><td>Givenmark</td><td>Timer</td><td>Serial</td><td>Order</td></tr>
                            <tr>
                            @foreach($results as $result)
                                <td>{{$result->id}}</td><td> {{$result->ques_id}}</td><td> {{$result->selected_option}} </td><td> {{$result->attempno}} </td><td> {{$result->givenmarks}}</td><td> {{$result->timing}}</td><td> {{$result->serial}}</td><td> {{$result->order}}</td><td> {{$result->created_at}}</td><td> {{$result->updated_at}}</td></tr>
                            @endforeach  
                        </table>
                
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

                              <div class="col-lg-12 " style="height:10px;">

                              </div>
  <footer class="footer">
      <div class="container">
        <p class="text-muted"><a href="http://www.muhtarif.unaux.com">Sirelkhatim Gamal </a></p>
      </div>
    </footer>


    <!-- Bootstrap Core JavaScript -->
  
</body></html>