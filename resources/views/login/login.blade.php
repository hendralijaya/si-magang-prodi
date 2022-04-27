<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Login Akun</title>
  </head>
  <body>
    
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="./78532865_p0_master1200.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                  <h1 class="font-weight-bold py-3">Login</h1>
                  <h4>Login into your account</h4>
                  <form action="{{ route('login.authenticate') }}" method='POST'>
                    @csrf
                    <div class="form-row">
                        <div class="col-lg-7">
                          <input type="email" placeholder="Email Address" class="form-control my-3 p-2" name="email">
                          @error("email")
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                          <input type="password" placeholder="Password" class="form-control my-3 p-2" name="password">
                          @error("password")
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    <div class="form-row">
                      <div class="col-lg-7">
                        <button type="submit" class="btn1 mt-3 mb-4">Login</button>
                  </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>