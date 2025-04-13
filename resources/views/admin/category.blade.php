<!DOCTYPE html>
<html>

<head>
  @include('admin.css')

  <style type="text/css">
    input[type=text] {
      width: 400px;
      height: 50px;
    }

    .div_deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 15px;
    }

    .table_deg {
      width: 600px;
      text-align: center;
      margin: auto;
      border: 2px solid yellowgreen;
      margin-top: 50px;
    }

    th {
      background-color: skyblue;
      padding: 15px;
      font-size: 20px;
      font-weight: bold;
      color: white;
    }

    td {
      color: white;
      padding: 10px;
      border: 1px solid skyblue;
    }
  </style>
</head>

<body>

  @include('admin.header')

  @include('admin.sidebar')
  <!-- Sidebar Navigation end-->
  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">

        <div class="div_deg">
          <h2 style="color: white;">Add Category</h2>
        </div>

        <div class="div_deg">
          <form action="{{url('add_category')}}" method="post">
            @csrf
            <div>
              <input type="text" name="category">
              <input class="btn btn-info" type="submit" value="Add Category">
            </div>
          </form>
        </div>

        <div>
          <table class="table_deg">

            <tr>
              <th>Category Name</th>
            </tr>

            @foreach($data as $data)
            <tr>
              <td>{{$data->category_name}}</td>
            </tr>
            @endforeach

          </table>
        </div>

      </div>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
  <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
  <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('admincss/js/charts-home.js')}}"></script>
  <script src="{{asset('admincss/js/front.js')}}"></script>
</body>

</html>