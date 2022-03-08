@extends('layouts.mastermap')
@section('content')
<div class="container">

<style>
body {
  font-family: 'Eczar';font-size: 22px;}
nav {
  font-family: 'Eczar';font-size: 18px;}
  .panel-heading{background-color:yellow;color:white;padding:10px;margin-bottom:5px;}
  .panel-title{background-color:#1E90FF;color:#fff;padding:10px;}
  .panel-body{border:1px solid #1E90FF;padding:15px;}
  .col-lg-12{border:1px solid #1E90FF;padding:15px;}
  .col-lg-8{border:1px solid #1E90FF;padding:15px;}
  .col-lg-6{border:1px solid #1E90FF;padding:15px;}
  .col-lg-4{border:1px solid #1E90FF;padding:15px;}
  select{border:1px solid #1E90FF;font-family: 'Archivo Black';font-weight:bold;height:50px;color:#00008B !important;background-color:#1E90FF;}
  input{padding:5px;margin:5px;}
  
</style>
    <!-- Marketing Icons Section -->
  
    <div class="col-lg-12">
        <div class="panel panel-default">

                    <div class="panel-heading">
                    <h3>Part Five</h3>
                    <strong>Session 1:   Video -1 </strong></div>
                    <div class="panel-body">

                    <link href="//example.com/path/to/video-js.min.css" rel="stylesheet">
                    <script src="//example.com/path/to/videojs-vtt.js"></script>
                    <script src="//example.com/path/to/video.min.js"></script>
                    <script>
                    videojs.options.flash.swf = "http://example.com/path/to/video-js.swf"
                    </script>


                <!--    <video id="example_video_1" class="video-js vjs-default-skin"
                        controls preload="auto" width="100%" height="100%"
                        poster="http://video-js.zencoder.com/oceans-clip.png"
                        data-setup='{"example_option":true}'>
                        <source src="{{URL::asset('/public/videos/part5/001/001.flv')}}" type="rtmp/flv">
                </video>-->

                <video width="100%" height="100%" controls>
                    <source src="{{URL::asset('/public/videos/part5/001/001.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>
        </div>

  
        <div class="col-lg-12">
        <div class="panel panel-default">

                    <div class="panel-heading">
                    <h3>Part Five</h3>
                    <strong>Session 1:   Video -2 </strong></div>
                    <div class="panel-body">
<!-- 
                    <object width="100%" height="100%">
                    <param name="movie" value="file.swf">
                    <embed src="{{URL::asset('/public/videos/part5/001/CFMS2T1.swf')}}" width="100" height="100">
                    </embed>
                </object>-->
<video width="100%" height="100%" controls>
                    <source src="{{URL::asset('/public/videos/part5/001/002.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>
        </div>

       
  
    <div class="col-lg-12">
        <div class="panel panel-default">

                    <div class="panel-heading">
                    <h3>Part Five</h3>
                    <strong>Session 1:   Video -3 </strong></div>
                    <div class="panel-body">
                     

                <video width="100%" height="100%" controls>
                    <source src="{{URL::asset('/public/videos/part5/001/003.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>
        </div>
 
 
  
        <div class="col-lg-12">
        <div class="panel panel-default">

                    <div class="panel-heading">
                    <h3>Part Five</h3>
                    <strong>Session 1:   Video -4 </strong></div>
                    <div class="panel-body">
                     

                <video width="100%" height="100%" controls>
                    <source src="{{URL::asset('/public/videos/part5/001/004.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>
        </div>

  
        <div class="col-lg-12">
        <div class="panel panel-default">

                    <div class="panel-heading">
                    <h3>Part Five</h3>
                    <strong>Session 1:   Video -5 </strong></div>
                    <div class="panel-body">
                     

                <video width="100%" height="100%" controls>
                    <source src="{{URL::asset('/public/videos/part5/001/005.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>
        </div>

        
  
    <div class="col-lg-12">
        <div class="panel panel-default">

                    <div class="panel-heading">
                    <h3>Part Five</h3>
                    <strong>Session 1:   Video -6 </strong></div>
                    <div class="panel-body">
                     

                <video width="100%" height="100%" controls>
                    <source src="{{URL::asset('/public/videos/part5/001/006.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>
        </div>

  
                <div class="col-lg-12">
        <div class="panel panel-default">

                    <div class="panel-heading">
                    <h3>Part Five</h3>
                    <strong>Session 1:   Video -7 </strong></div>
                    <div class="panel-body">
                     

                <video width="100%" height="100%" controls>
                    <source src="{{URL::asset('/public/videos/part5/001/007.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>
        </div>
            

                
  
    <div class="col-lg-12">
        <div class="panel panel-default">

                    <div class="panel-heading">
                    <h3>Part Five</h3>
                    <strong>Session 1:   Video -8 </strong></div>
                    <div class="panel-body">
                     

                <video width="100%" height="100%" controls>
                    <source src="{{URL::asset('/public/videos/part5/001/008.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>
        </div>
        

            </div>
                </div>



            </div>            </div>

        </div>
        </div>
@endsection