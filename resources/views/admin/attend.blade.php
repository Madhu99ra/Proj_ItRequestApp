<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Request</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <style>
    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
    }

    form {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input[type="text"],
    input[type="date"],
    textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 12px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .btn-pending {
      background-color: red !important;
      color: white !important;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">View Attend</h1>
            </div><!-- /.col -->
            <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- TO DO List -->
          <div class="card" style="background-color: #f0f8ff;">
            <div class="card-body">
            <form action="{{ route('updateRequestStatus', ['id' => $request->id]) }}" method="POST" class="form" style="max-width: 400px; margin: 20px auto; padding: 20px; background-color: #faf9e0; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    @csrf
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $request->name }}" readonly>
    <label for="date">Date:</label>
    <input type="text" id="date" name="date" value="{{ $request->reqdate }}" readonly>
    <label for="issue" class="">Issue</label><br>
    <input type="text" id="issue" name="issue" value="{{ $request->issue }}" readonly>
    <label for="attended">Attended by:</label>
    <select id="attended" name="attended_by">
      <option value="IT Manager">IT Manager</option>
      <option value="IT Assistant">IT Assistant</option>
    </select><br><br>
    <label for="resloved_date">Resolved Date:</label>
    <input type="date" id="resloved_date" name="resloved_date" value="" readonly>
    <label for="distribution">Distribution:</label><br>
    <input type="text" id="distribution" name="distribution" value="">
    <label for="remark">Remark:</label>
    <input type="text" id="remark" name="remark" value="">

    <!-- Submit buttons -->
    <input type="submit" value="Done" name="status">
    <input type="submit" value="Pending" class="btn-pending" name="status">

    <script>
      // Set current date for the date input field
      document.getElementById('resloved_date').valueAsDate = new Date();
    </script>
</form>


            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="dist/js/adminlte.js"></script>

</body>

</html>
