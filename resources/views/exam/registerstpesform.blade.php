<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
 <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
 <style>
   body {
     background-color: #eee
 }

 .form-control:focus {
     color: #495057;
     background-color: #fff;
     border-color: #80bdff;
     outline: 0;
     box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25)
 }

 .btn-secondary:focus {
     box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
 }

 .close:focus {
     box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
 }

 .mt-200 {
     margin-top: 200px
 }
 
 </style>
 
 <script>
$(document).ready(function(){

$('#smartwizard').smartWizard({
selected: 0,
theme: 'dots',
autoAdjustHeight:true,
transitionEffect:'fade',
showStepURLhash: false,

});

});
 </script>
 </head>
 <title>Register Form</title>
 <body>
 <div class="container">
     <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Launch multistep Wizard </button> </div> <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Smart Wizard modal</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                 </div>
                 <div class="modal-body">
                     <div id="smartwizard">
                         <ul>
                             <li><a href="#step-1">Step 1<br /><small>Account Info</small></a></li>
                             <li><a href="#step-2">Step 2<br /><small>Personal Info</small></a></li>
                             <li><a href="#step-3">Step 3<br /><small>Payment Info</small></a></li>
                             <li><a href="#step-4">Step 4<br /><small>Confirm details</small></a></li>
                         </ul>
                         <div>
                             <div id="step-1">
                                 <div class="row">
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Name" required> </div>
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Email" required> </div>
                                 </div>
                                 <div class="row mt-3">
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Password" required> </div>
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Repeat password" required> </div>
                                 </div>
                             </div>
                             <div id="step-2">
                                 <div class="row">
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Address" required> </div>
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="City" required> </div>
                                 </div>
                                 <div class="row mt-3">
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="State" required> </div>
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Country" required> </div>
                                 </div>
                             </div>
                             <div id="step-3" class="">
                                 <div class="row">
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Number" required> </div>
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Holder Name" required> </div>
                                 </div>
                                 <div class="row mt-3">
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="CVV" required> </div>
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="Mobile Number" required> </div>
                                 </div>
                             </div>
                             <div id="step-4" class="">
                                 <div class="row">
                                     <div class="col-md-12"> <span>Thanks For submitting your details with BBBootstrap.com. we will send you a confirmation email. We will review your details and revert back.</span> </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
 <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 </body>
 </html>