@extends('layouts.mastermap')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')

<br>
 

<div class="container">    
 
 	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                
                
                {{$subject_id}}
                <?php $subject = DB::table('subjects')->where('id',$subject_id)->first(); echo $subject->name; ?>
                </div>
                    <div class="panel-body">
                        <P>  </P>
                            
          
         
            
<?php $lectures =  DB::table('lectures')->where('subject_id',$subject_id)->get(); ?>
        <table class="table table-hover">
        <thead class="thead-dark">
        <tr><th>ID</th><th>Leccture Name</th><th>Download</th></tr>
        </thead>
<?php $i = 1; ?>
        @foreach($lectures as $lecture)
        <tbody class="table-hover">
        <tr><td>{{$i}}</td><td>{{$lecture->name}}</td>
        <td>

        <form action="downloadxx" method="POST" accept-charset="UTF-8">
        @csrf
        <input type="hidden" name="" value="">
        <input type="hidden" name="filename" value="{{$lecture->file}}">
        <input type="submit" class="btn btn-warning" value="Download">
        </form>
<?php $i = $i + 1; ?>
        </td>
         </tr>
        @endforeach
        </tbody>
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