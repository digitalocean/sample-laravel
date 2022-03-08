@extends('layouts.mastermap')
@section('title')
Dashboard | Funda of web IT
@endsection

@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Courses Activites</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">

                  <table class="table">
                     <thead class=" text-primary">
                      <th>ID</th>
                      <th>coursetitle</th>
                      <th>description</th>
                      <th>numberhourse</th>
                      <th>coursestartdate</th>
                      <th>courselocation</th>

                      <th>User_id</th>
                    </thead>
                    <tbody>
                  <!--  @ foreach($data as $row)
                      <tr>
                        <td>{ { $row->id }} </td>
                        <td>{ { $row->coursetitle }} </td>
                        <td>{ { $row->numberhourse }} </td>
                        <td>{ { $row->coursestartdate }} </td>
                        <td>{ { $row->courselocation }} </td>
                        <td>{ { Auth::user()->id}} </td>
                        <td><a href="/coursesactivites/data/{ { $row->id }}" class="btn btn-success">Edit</a></td>
 <!--Delete-->          <!-- <td><form action="/***/{ { $row->id }}" method="post">
                            { { csrf_field() }}
                            { { method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form></td>
                      </tr>
                      @ endforeach-->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <br>


@endsection

@section('scripts')

@endsection
