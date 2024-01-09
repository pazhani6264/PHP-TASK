<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<p style="font-size:20px;text-align:center;margin:20px">Welcome to <b>{{ auth()->user()->name }}</b></p>


<h2>Order</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">Product name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($successData as $key=>$succData)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $succData->uname }}</td>
            <td>{{ $succData->pname }}</td>
            <td>{{ $succData->price }}</td>
            <td>
                @if($succData->status == 1) 
                    <span class="badge bg-success">Success</span>
                @else
                    <span class="badge bg-danger">Cancel</span>
                @endif
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

