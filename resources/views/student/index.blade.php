<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Students Export</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Students</h1>
    <div class="controller">
        <div class="row">
            <div class="col-md-12">
            <table class="table table-bordared">
            <thead><tr><th>#</th><th>Name</th><th style="text-align:right;">Amount</th><th style="text-align:right; width: 52px;">Action</th></tr></thead>
            <tbody>
            @if(count($students) < 1 )
            <tr><td>            No Student Found
</td><td></td><td></td></tr>
            @else
            @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td  style="text-align:right;">{{$student->amount}} $</td>
                <td  style="text-align:right;  width: 52px;">
                <a href="{{url('student/pdfexport/'.$student->id)}}" class="btn btn-primary btn-xs"><img src="img/PdfIcon.png" width="35" height="35">Invoice</a>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>

            </table>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
