@extends('layouts.mastermap')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')
@if(Auth::user()->scholarship == 1 )
<div style="
    position: fixed;
    margin-top:5px;
    margin-left:-3px;
    padding:5px;
    font-size;10pt;
    border-radius: 5px;">
    <img src="{{ asset('/public/scholarship.png')}}" width='150px' heigh="150px" >
</div>
    @endif
 <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>MAP Home Page </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default">

					<div class="panel-heading"><strong>Welcome {{Auth::user()->name}} {{Auth::user()->student_id}}</strong></div>
					<div class="panel-body">
            <p>
             <!--  <li><a href="/logout">/////////////////Logout</a></li> -->
             Welcome <strong>{{Auth::user()->name}}</strong> to the Nazalwi Bussiness College Access Portal <strong>(MAP)</strong>.
            </p>

            
            <p>
            MAP is a web based application designed to provide NBC Members with the support they need. <br/>
            It is a system which currently gives you access to your Member Details. As we move forward we will be adding more applications to MAP, and we hope that you will get involved by making suggestions about how we can improve it.
            </p><p>
            Please feel free to make suggestions to the Membership Officer about how you feel we can improve MAP.
            </p><p>
            To sit an Exam you need to sign in to the Assessment Portal (PassPort). You can use the same credentials as for your MAP Sign In. <br/>
            To access PassPort select: "Sign In to Passport" from the above menu. <br/>
            We have introduced this additional Sign In to enhance the security of the Assessment system.
            </p><p>
            Important: Please ensure your Certificate Name is Correct. Click here to check or change it.
            </p>
                        </div>
		</div>
	</div>


        <div class="col-lg-4">
        <img src="{{ asset('images/WorldMap.jpg') }}"/>
        <div style="padding:10px; background-color: #5280c7; border-radius: 5px; width:280px; margin-top:15px; color:#fff;">

    "You are the point of origin for
    everything in your world:<br/>
    You set the standard for yourself." <br/>
    (Steve Maraboli) 1975−
    </div>
        </div>
    </div>

    </div>
<!--
    <div class="col-lg-12">
		<div class="panel panel-default">

					<div class="panel-heading"><strong>Welcome {{Auth::user()->name}} {{Auth::user()->id}}</strong></div>
					<div class="panel-body">
                    <h1>VIDEO <i class="fas fa-gears"></i>&nbsp; </h1>

 
        <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"
                controls preload="auto" height="600" width="980">

                <source src="{{url($video2)}}" type="{{$mime2}}" />
        </video>

    <script src="//vjs.zencdn.net/4.12/video.js"></script>

    <script>
        videojs(document.getElementById('example_video_1'), {}, function() {
            // This is functionally the same as the previous example.
        });
    </script>

                </div>
            </div>
        </div>
-->

                </div>
            </div>
        </div>
    </div>

@endsection


 