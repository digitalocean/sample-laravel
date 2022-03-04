@extends('layouts.master')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')
<br><br><br>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MEMBER LEVEL </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<img src="/img/membership2.jpg" width="150px" heigh="150px" align="center" style="margin-left:300px;">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Membersip Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$user->student_id}}</th>
      <td>{{$user->firstname}}</td>
      <td>{{$user->lastname}}</td>
      <td>{{$user->student_id}}</td>
    </tr>
    <tr>
        <td></td>
        <td>
        @foreach($member_level as $m_level)
       <button class="btn btn-success" >{{$m_level->levelname}}</button><?php echo '  '; ?>
       @endforeach
        </td>
    </tr>
    </table>
<br> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<br> 

@endsection