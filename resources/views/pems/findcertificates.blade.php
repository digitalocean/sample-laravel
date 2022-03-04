@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')
<h3>Certificates</h3>
<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-16">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Certificates  Home Page  </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">

					<div class="panel-heading"><strong>Welcome  {{Auth::user()->student_id}} : {{Auth::user()->name}}</strong></div>
					<div class="panel-body">
                    
                    <a class="btn-floating btn-lg btn-default"><i class="fas fa-bolt"></i></a>
<a class="btn-floating btn-primary"><i class="fas fa-leaf"></i></a>
<a class="btn-floating btn-sm btn-secondary"><i class="fas fa-star"></i></a>
 <!--------------------------------------------------------------------------------------------------------------------------->
 <form action="/findcertificates" method="POST" role="search">
                    {{ csrf_field() }}
					<div class="form-grounp">
					<label for="memberid">Enter the Member ID below, or select from the list. </label>
                    <input type="text" class="form-control" name="q"
                     placeholder="Search users"> <span class="input-group-btn">
                     			</div>
					<div class="form-grounp">
					<input name="process" type="hidden" value="memberdetails">
					<input class="btn btn-success" type="submit" value="Get Member">
					<a href='/pems/certificates' class='btn btn-default'>Clear Member Details</a>
					</div>
				</form>
 
<!---------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------->

@foreach($account as $user)

<table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col">Member Id</th>
        <th scope="col">Level Code</th>
        <th scope="col">Level </th>
        <th scope="col">Certificate </th>
        </tr>
    </thead>
    <tbody>

        <?php     
          
        
        $memberlevel = DB::table('memberlevel')->where('student_id',$user->student_id)

        ->join('levels','levels.levelcode','=','memberlevel.levelname')
        ->select('memberlevel.*','levels.*')

        ->get(); 
         ?>
        @foreach($memberlevel as $mem_level)
        <tr>
        <td>{{$mem_level->id}}</td>
        <td style="background-color:Blue;color:silver;">{{$mem_level->levelname}}</td>
        <td  style="background-color:green;color:silver;">{{$mem_level->level}}</td>


        </tr>
        @endforeach


    </tbody>
</table>

@endforeach



<!--------------------------------------------------------->

        </div>
    </div>
</div>

    @foreach($account as $user)
   




    <div class="col-lg-6">
    <div class="panel panel-default">

        <div class="panel-heading"><strong>Certificates  {{$user->student_id}} : {{$user->name}} </strong></div>
        <div class="panel-body">

            <?php
            //$stu_id = $account->student_id;
            if($user->student_id != 0){
                echo $user->id ."  ".$user->student_id;
                $userresult = DB::table('ref_result')->where('student_id',$user->student_id)->get();
            }
            ?>
            <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Attemp Id</th>
                <th scope="col">Exam</th>
                <th scope="col">Total Marks</th>
                <th scope="col">Status</th>
                <th scope="col">Details</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($userresult as $re)
                        <?php     $attemp = DB::table('result')->where('attempno',$re->id)->get(); $tmark=0; ?>
                                @foreach($attemp as $att)
                            <!-- { {$ att->id}}-->
                                    <?php $tmark=$tmark+$att->givenmarks;        ?>
                                @endforeach
                        <tr><td><span>{{$re->id}}</span> :  </td>
                        <td><?php $exam=DB::table('exam')->where('examcode',$re->examcode)->first(); ?> {{$exam->examtitle}}</td>
                        <td>{{$tmark}}</td>
                        <td> {{$re->pass}}</td>
                        <td><a href="userresult1/{{$re->id}}"><button class="btn btn-warning">Details</button></a></td>
                        </tr>
                        @endforeach
                        </tbody></table>
                    </div>
                    </div>
    @endforeach
                </div>


<!--------------------------------------------------------------------------------------------------------------------------->


    </div>
    </div>
    </div>
    </div>

@endsection


 