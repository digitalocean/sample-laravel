@section('content')
<h1>Customer List</h1>
<a href="{{ URL::to('/customers/pdf') }}">Export PDF</a>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
    </tr>
  </thead>
  <tbody>
    @ foreach( $data as $customer)
      <tr>
        <td>{ { $customer->id }}</td>
        <td>{ { $customer->name }}</td>
        <td>{  { $customer->email }}</td>
        <td>{ { $customer->phone }}</td>
      </tr>
    @ endforeach
  </tbody>
</table>
@endsection
