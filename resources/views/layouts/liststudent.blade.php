

<style type="text/css">
.chosen-choices {
    border: 1px solid #ccc;
    border-radius: 4px;
    min-height: 34px;
    padding: 6px 12px;
}
.chosenContainer .form-control-feedback {
    /* Adjust feedback icon position */
    right: -15px;
}
.chosenContainer .form-control {
    height: inherit; 
    padding: 0px;
}
</style>
@extends('layouts.app')

@section('content')
<form id="chosenForm" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-3 control-label">Favorite color</label>
        <div class="col-xs-8 chosenContainer">
            <select class="form-control chosen-select" name="colors" multiple data-placeholder="Choose 2-4 colors" style="width: 100%;">
                <option value="black">Black</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="orange">Orange</option>
                <option value="red">Red</option>
                <option value="yellow">Yellow</option>
                <option value="white">White</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-default">Validate</button>
        </div>
    </div>
</form>
  <!-- Pre-loader start -->
  <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

   
                <div class="pcoded-wrapper">
                    
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-file-code bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h4>Student List</h4>
                                                        <span>Add <code>Delete</code> & Update</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="index.html">
                                                                <i class="icofont icofont-home"></i>
                                                            </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Form Components</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Form Components</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        
                                    <!-- Page-header end -->

                                    <!-- Page body start -->
                                    
                                    <!-- Basic table card start -->
                                    <div class="container">
                                        
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="150px">No.</th>
                                                            <th>Name</th>
                                                            <th>User Id</th>
                                                            <th class="text-success">Created At</th>
                                                            <th class="text-danger">Epired At</th>
                                                            <th class="text-center" width="150px">
                                                                <a href="#" class="create-model btn btn-success btn-sm">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        {{ csrf_field() }}
                                                    </thead>
                                                    <tbody>
                                                    <?php $no=1; ?>
                                                    @foreach ($students as $value)
                                                        <tr class="student{{$value->id}}">
                                                            <td>{{ $no++}} </td>
                                                            <td>{{ $value->name }} </td>
                                                            <td>{{ $value->student_id }} </td>
                                                            <td class="text-success">{{ $value->created_at }} </td>
                                                            <td class="text-danger">{{ $value->validity }} </td>
                                                            <td>
                                                            
                                                                <a onclick="viewdetil( '{{ $value->name }}','{{ $value->student_id }}', '{{Auth::user()->id}}','{{ $value->created_at }}','{{ $value->validity }}' )" href="#" class="show-modal btn btn-info btn-sm" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-student_id ="{{ $value->student_id }}">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                                </a>
                                                                <a onclick="Editdetail( '{{ $value->id }}','{{ $value->name }}','{{ $value->student_id }}' )" href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-student_id ="{{ $value->student_id }}">
                                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                                </a>
                                                                <a onclick="Delete_user( '{{ $value->id }}','{{ $value->name }}','{{ $value->student_id }}' )" href="#" class="detete-modal btn btn-danger btn-sm" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-student_id ="{{ $value->student_id }}">
                                                                    <i class="glyphicon glyphicon-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Page body end -->
                                    </div>
                                    </div>
                                 </div>
                             </div>
                             <!-- Main-body end -->
                                   
                        </div>
                    </div>
                </div>
                                                  
                            <!--  form Create Post -->
                            <div id="create" class="modal fade" role="dialog">
                                      <div class="modal-dialog" >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"></h4>
                                                    <h5 id="msg" class="text-success"></h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group row add">
                                                            <label class="control-label col-sm-4" for="name">Student Name :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Full Name" required>
                                                                <p class="name_error text-center alert alert-danger hidden"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4" for="student_id">Create Student Id :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student Id" required>
                                                                <p class="student_id_error text-center alert alert-danger hidden"></p>
                                                            </div>
                                                        </div>
                                                        
                                                        <input type="hidden" disabled class="form-control" id="admin_id" name="admin_id" value=" {{ Auth::user()->id }}" placeholder="institution Id" required>
                                                             
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4" for="student_fee">Fee :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="fee" id="fee" style="height: unset;" required>
                                                                <option id="val" value = "10">Rs. 10 Validity 1 week</option>
                                                                <option id="val" value = "50">Rs. 50 Validity 3 Month</option>
                                                                <option id="val" value = "100">Rs. 100 Validity 1 year</option>
                                                                <option id="val" value = "200">Rs. 200 Validity 3 year</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4" for="contact">Contact No. :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="contact" name="contact" placeholder="Optional" >
                                                                <p class="student_id_error text-center alert alert-danger hidden"></p>
                                                            </div>
                                                        </div>
                                                        
                                                        <form id="chosenForm" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-3 control-label">Favorite color</label>
        <div class="col-xs-8 chosenContainer">
            <select class="form-control chosen-select" name="colors" multiple data-placeholder="Choose 2-4 colors" style="width: 100%;">
                <option value="black">Black</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="orange">Orange</option>
                <option value="red">Red</option>
                <option value="yellow">Yellow</option>
                <option value="white">White</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-default">Validate</button>
        </div>
    </div>
</form>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4" for="category">Select Category:</label>
                                                            <div class="col-sm-8">
                                                            
                                                            <select class="form-control chosen-select" name="colors" multiple data-placeholder="Choose 2-4 colors" style="width: 100%;">
                                                                <option value="black">Black</option>
                                                                <option value="blue">Blue</option>
                                                                <option value="green">Green</option>
                                                                <option value="orange">Orange</option>
                                                                <option value="red">Red</option>
                                                                <option value="yellow">Yellow</option>
                                                                <option value="white">White</option>
                                                            </select>
                                                                <p class="student_id_error text-center alert alert-danger hidden"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="control-label col-sm-4">Password</label>
                                                                <div class="col-sm-8">
                                                                    <input id="password" type="password" class="form-control" name="password" required>
                                                                    <p class="pass_error text-center alert alert-danger hidden"></p>
                                                                </div>
                                                            
                                                        </div>
                                                        

                                                        <div class="form-group">
                                                            <label for="password_confirmation" class="control-label col-sm-4">Confirm Password</label>

                                                            <div class="col-sm-8">
                                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                                                <p class="error text-center alert alert-danger hidden"></p>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" disabled  class="form-control" id="admin_email" name="admin_email" value=" {{ Auth::user()->email }}" placeholder="Institution Email" required>
                                                        
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-warning" type="submit" id="add">
                                                        <span class="glyphicon glyphicon-plus"></span>Add Student
                                                    </button>
                                                    <button class="btn btn-warning hidden" type="button" id="spin">
                                                    <i class="fa fa-spinner fa-spin" ></i> pls Wait...
                                                    </button>
                                                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                                                        <span class="glyphicon glyphicon-remobe"></span>Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <!--  End form Create Post -->                              
                            <!--  Show Post -->
                                <div id="show" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"></h4>
                                                    <h5 id="msg" class="text-success"></h5>
                                                </div>
                                                <div class="modal-body" style="margin: 0px auto;">
                                                    <p class="text-primary">Name : <span id = "view_name"></span> </p>
                                                    <p class="text-primary">Student Id :<span id = "view_student_id"></span>  </p>
                                                    <p class="text-primary">Institution Id :<span id = "view_institution_id"></span>  </p>
                                                    <p class="text-primary">Created At :<span id = "view_created_at"></span>  </p>
                                                    <p class="text-danger">Expired At : <span id = "view_validity"></span></p>
                                                </div>
                                                <div class="modal-footer">
                                                 
                                                    <button class="btn btn-warning hidden" type="button" id="spin">
                                                    <i class="fa fa-spinner fa-spin" ></i> pls Wait...
                                                    </button>
                                                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                                                        <span class="glyphicon glyphicon-remobe"></span>Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             <!--  End Show Post -->  


                                    <!--  Delete Post -->
                                    <div id="delete" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"></h4>
                                                    <h5 id="msg" class="text-success"></h5>
                                                </div>
                                                <div class="modal-body" style="margin: 0px auto;">
                                                    <p class="text-primary">ID : <span id = "delete_id"></span> </p>
                                                    <input type="text" id ="did" name="did">
                                                    <p class="text-primary">Name : <span id = "delete_name"></span> </p>
                                                    <p class="text-primary">Student Id :<span id = "delete_student_id"></span>  </p>
                                                    <div class="modal-footer">
                                                    
                                                    <button class="btn btn-danger" type="submit" id="delete">
                                                       <i class="glyphicon glyphicon-trash"></i> Delete
                                                    </button>
                                                    <button class="btn btn-danger hidden" type="button" id="dpspin">
                                                       <i class="fa fa-spinner fa-spin" ></i> pls Wait...
                                                    </button>
                                                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                                                        <span class="glyphicon glyphicon-remobe"></span>Close
                                                    </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             <!--  End Delete Post -->  
                        <!--  form Edit Post -->
                            <div id="edit" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"></h4>
                                                    <h5 id="umsg" class="text-success"></h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group row add">
                                                            <label class="control-label col-sm-4" for="name">Student Name :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" disabled class="form-control" id="uname" name="uname" placeholder="Enter Student Full Name" required>
                                                                <p class="name_error text-center alert alert-danger hidden"></p>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" disabled class="form-control" id="uid" name="uid" placeholder="Field Id" required>
                                                               
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4" for="student_id">Student Id :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" disabled class="form-control" id="ustudent_id" name="ustudent_id" placeholder="Enter Student Id" required>
                                                                <p class="student_id_error text-center alert alert-danger hidden"></p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="password" class="control-label col-sm-4">Create new Password</label>
                                                                <div class="col-sm-8">
                                                                    <input id="upassword" type="password" class="form-control" name="upassword" required>
                                                                    <p class="upass_error text-center alert alert-danger hidden"></p>
                                                                </div>
                                                            
                                                        </div>
                                                        

                                                        <div class="form-group">
                                                            <label for="password_confirmation" class="control-label col-sm-4">Confirm Password</label>

                                                            <div class="col-sm-8">
                                                                <input id="upassword_confirmation" type="password" class="form-control" name="upassword_confirmation" required>
                                                                <p class="uerror text-center alert alert-danger hidden"></p>
                                                            </div>
                                                        </div>
                                                       
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-warning" type="submit" id="update">
                                                        <span class="glyphicon glyphicon-plus"></span>Update
                                                    </button>
                                                    <button class="btn btn-warning hidden" type="button" id="upspin">
                                                    <i class="fa fa-spinner fa-spin" ></i> pls Wait...
                                                    </button>
                                                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                                                        <span class="glyphicon glyphicon-remobe"></span>Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <!--  End form edit Post -->  

@endsection

