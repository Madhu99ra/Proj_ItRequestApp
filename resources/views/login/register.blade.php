<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container-custom {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-card {
      background-color: #add8e6;
      
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 250px;
    }

    .login-title {
      text-align: center;
      font-size: 1.5em;
      font-weight: bold;
      color: #000000;
     
      margin-bottom: 20px;
    }

    label {
      color: #000000;
      
      font-weight: bold;
    }

    .form-control {
      margin-bottom: 15px;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      color: #ffffff;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .text-center {
      margin-top: 10px;
    }

    .btn-floating {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      margin: 0 5px;
    }
  </style>
</head>

<body>
  <div class="container-custom">
    <div class="login-card">
      <h2 class="login-title">REGISTER</h2>
      <form action="{{route('store-users')}}" method="POST">

      @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      @if(Session::has('fail'))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
      @endif

        @csrf
        <div class="form-outline mb-3">
          <label class="form-label" for="username">Create a User Name</label>
          <input type="username" id="username" name="username" class="form-control" value="{{ old('username') }}"/>
          <span class="text-danger">@error('username'){{ $message }}@enderror</span>
        </div>

        <div class="form-outline mb-3">
          <label class="form-label" for="email">Email Address</label>
          <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"/>
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>

        <div class="form-outline mb-3">
          <label class="form-label" for="password">Create Password</label>
          <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}"/>
          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>

        <div class="row mb-3">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="showpassword" />
              <label class="form-check-label" for="showpassword"> Show Password </label>
            </div>
          </div>

        </div>

        <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>

        <div class="text-center">
          <p><a href="/" class="text-decoration-none">Back to Login</a></p>
        </div>



      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>