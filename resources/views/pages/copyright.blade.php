@extends('layouts.master')
@section('PageTitle', 'NBC')
@section('Description',('This is Contact Page Description'))
@section('content')
<h3>Contact</h3>
<!-- Header Carousel -->

<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default" style="border:none;">
                    <div style="margin:0 auto; padding:10px; font-weight: bold; text-align: center;">
                        <h4>Copyright </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                              Copyright
                                  </div>
                             <div class="panel-body">
  
                             <p>These pages are protected by copyright. No images, parts of images, or any other part of our website may be copied or reproduced in any form or reproduced on any other website or stored in or transmitted to or from any other electronic or digital form in whole or in part, nor may links to our website be included in any other website without our prior written permission. In addition you may not remove an image identification mark or alter, manipulate, add to or delete an image or any part of an image. You may access and download the contents of these pages and store a copy of them on a temporary basis for the sole purpose of viewing those pages. Links within our website may lead to other sites. We do not sponsor, endorse or otherwise approve of any information or statements appearing in those sites, not in sites referred to in or linked to those sites.<br />While every effort is taken to ensure the accuracy of the information on this website, due to the nature of the medium and the risks of interruptions and disruptions, any and all liability which might arise from your use or reliance on the information contained on the website is excluded.<br />All rights reserved and copyright is exclusively owned by Nazlawi Business College, except for recognized third-party brands included or referred to in this website</p>



                           
</div>
</div>
</div>
</div>

</div>
</div>
@endsection




 <!-- @/extends('layouts.master')
@/section('content')
<div class
    <div class="row">
    <div class="col-md-8">
        <h1>Contact Me</h1>
        <hr>
        <form action="{{ url('contact') }}" method="POST">
        {{ csrf_token() }}
        <div class="form-group">
            <label name="email">Email:</label>
            <input id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label name="subject">subject:</label>
            <input id="subject" name="subject" class="form-control">
        </div>
        <div class="form-group">
            <label name="message">Message:</label>
            <textarea id="message" name="message" class="form-control">
            </textarea>
            <input type="submit" value="Send message" name="submit">
        </div>
    </form>
</div>
</div>
@/endsection-->
