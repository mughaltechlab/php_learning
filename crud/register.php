<?php 
session_start();

if (isset($_GET['data'])) {
  # code...
  $arr = unserialize(urldecode($_GET['data']));
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    :root {
      --grd1: rgba(0, 0, 0, 0.4);
      --grd2: rgba(0, 255, 255, 0.267);
    }

    .mycard-container {
      background: linear-gradient(110deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 300%);
    }

    .myform-card {
      background: rgba(0, 0, 0, 0.4);
      box-shadow: 0 0 15px 0 rgba(200, 200, 200, .2),
        0 0 15px 0 rgba(200, 200, 200, .2) !important;
      color: rgb(185, 180, 180);
      transition: transform .55s ease-in-out;
    }

    .myform-card:hover {
      /* background: linear-gradient(10deg,var(--grd1),var(--grd1),var(--grd2),var(--grd1),var(--grd1)); */
      transition: background .22s linear;
      animation: shade .55s ease-in-out reverse;
      animation-delay: 1s;
      animation-timing-function: linear;
    }

    @keyframes shade {
      0% {
        background: linear-gradient(10deg, var(--grd2), var(--grd1), var(--grd1), var(--grd1), var(--grd1));
      }

      25% {
        background: linear-gradient(10deg, var(--grd1), var(--grd2), var(--grd1), var(--grd1), var(--grd1));
      }

      50% {
        background: linear-gradient(10deg, var(--grd1), var(--grd1), var(--grd2), var(--grd1), var(--grd1));
      }

      75% {
        background: linear-gradient(10deg, var(--grd1), var(--grd1), var(--grd1), var(--grd2), var(--grd1));
      }

      100% {
        background: linear-gradient(10deg, var(--grd1), var(--grd1), var(--grd1), var(--grd1), var(--grd2));
      }
    }

    .error{
      color: tomato;
      font-size: 12px;
    }
  </style>
</head>

<body>
  <?php
    // $firstnameErr = "";
    // $lastnameErr = "";
    // $emailErr = "";
    // $passwordErr = "";
    // $genderErr = "";
    // $religionErr = "";
    // $descErr = "";
    // if (isset($_SESSION['firstname'])) {
    //   # code...
    //   $firstnameErr = $_SESSION['firstname'];
    // }
    //  if (isset($_SESSION['lastname'])) {
    //   # code...
    //   $lastnameErr = $_SESSION['lastname'];
    // } if (isset($_SESSION['email'])) {
    //   # code...
    //   $emailErr = $_SESSION['email'];
    // } if (isset($_SESSION['password'])) {
    //   # code...
    //   $passwordErr = $_SESSION['password'];
    // }  if (isset($_SESSION['gender'])) {
    //   # code...
    //   $genderErr = $_SESSION['gender'];
    // }  if (isset($_SESSION['religion'])) {
    //   # code...
    //   $religionErr = $_SESSION['religion'];
    // }  if (isset($_SESSION['desc'])) {
    //   # code...
    //   $descErr = $_SESSION['desc'];
    // }
  ?>
  <section class="mycard-container p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
          <div class="myform-card card border-0 shadow-sm rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5">
              <div class="row">
                <div class="col-12">
                  <div class="mb-5">
                    <h2 class="h3">Registration</h2>
                    <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                  </div>
                </div>
              </div>
              <form action="./db/process.php" method="post" enctype="multipart/form-data">
                <div class="row gy-3 overflow-hidden">
                  <div class="form-group d-flex justify-content-between ">
                    <!--//* first name -->
                    <div class="">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" value="<?php echo isset($_GET['data'])? $arr['firstName'] :"" ; ?>" >
                        <label for="firstName" class="form-label">First Name</label>
                        <span class="error"> <?php 
                        if (isset($_SESSION['firstname'])) {
                          # code...
                          $firstnameErr = $_SESSION['firstname'];
                          echo $firstnameErr; 
                        }
                        ?> </span> 
                      </div>
                    </div>
                    <!--//* last name -->
                    <div class="">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="First Name" value="<?php echo isset($_GET['data'])? $arr['lastName'] :"" ; ?>" >
                        <label for="lastName" class="form-label">Last Name</label>
                        <span class="error"> <?php 
                        if (isset($_SESSION['lastname'])) {
                          # code...
                          $lastnameErr = $_SESSION['lastname'];
                          echo $lastnameErr; 
                        }
                        ?> </span> 
                      </div>
                    </div>
                  </div>
                  <!-- //* email -->
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?php echo isset($_GET['data'])? $arr['email'] :"" ; ?>" >
                      <label for="email" class="form-label">Email</label>
                      <span class="error"> <?php 
                        if (isset($_SESSION['email'])) {
                          # code...
                          $emailErr = $_SESSION['email'];
                          echo $emailErr; 
                        }
                        ?> </span> 
                    </div>
                  </div>
                  <!-- //* password -->
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" value="<?php echo isset($_GET['data'])? $arr['password'] :"" ; ?>">
                      <label for="password" class="form-label">Password</label>
                      <span class="error"> <?php 
                        if (isset($_SESSION['password'])) {
                          # code...
                          $passwordErr = $_SESSION['password'];
                          echo $passwordErr; 
                        }
                        ?> </span> 
                    </div>
                  </div>
                  <!-- //* gender -->
                  <div class="gender form-group d-flex justify-content-between">
                    <label for="gender" class="form-label">Gender</label>
                    <div class=" col-10 d-flex justify-content-around">

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="male" id="gender1" <?php echo isset($_GET['data']) ? ($arr['gender'] == 'male' ? "checked" :"") :"" ; ?> >
                        <label class="form-check-label" for="gender1">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="female" id="gender2" <?php echo isset($_GET['data']) ? ($arr['gender'] == 'female' ? "checked" :"") :"" ; ?>>
                        <label class="form-check-label" for="gender2">
                          Female
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="other" id="gender3" <?php echo isset($_GET['data']) ? ($arr['gender'] == 'other' ? "checked" :"") :"" ; ?>>
                        <label class="form-check-label" for="gender3">
                          Other
                        </label>
                      </div>
                    </div>
                    
                  </div>
                  <span class="error"> <?php 
                        if (isset($_SESSION['gender'])) {
                          # code...
                          $genderErr = $_SESSION['gender'];
                          echo $genderErr; 
                        }
                        ?> </span> 
                  <!-- //* religion -->
                  <div>
                    <select class="form-select" name="religion" aria-label="Default select example">
                      <option selected disabled>Select your religion</option>
                      <option value="Islam" <?php echo isset($_GET['data']) ? ($arr['religion'] == 'Islam' ? "selected" :"") :"" ; ?> >Islam</option>
                      <option value="Hinduism" <?php echo isset($_GET['data']) ? ($arr['religion'] == 'Hinduism' ? "selected" :"") :"" ; ?> >Hinduism</option>
                      <option value="Christian" <?php echo isset($_GET['data']) ? ($arr['religion'] == 'Christian' ? "selected" :"") :"" ; ?> >Christian</option>
                    </select>
                    <span class="error"> <?php 
                        if (isset($_SESSION['religion'])) {
                          # code...
                          $religionErr = $_SESSION['religion'];
                          echo $religionErr; 
                        }
                        ?> </span>
                  </div>
                  <!-- //* profile image -->
                  <div class="mb-3">
                    <label for="formFileSm" class="form-label text-secondary" style="font-size: 12px;">Upload profile image upto 1mb</label>
                    <input class="form-control" name="image" accept='image/jpeg,image/jpg,image/png' id="formFileSm" type="file">
                    <span class="error"> <?php 
                        if (isset($_SESSION['image'])) {
                          # code...
                          $imageErr = $_SESSION['image'];
                          echo $imageErr; 
                        }
                        ?> </span>
                  </div>
                  <!-- //* description -->
                  <div class="form-group mb-3">
                    <label class="form-label" class="p-2" for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="6"></textarea>
                  </div>
                  <?php 
                    if (
                      isset($_SESSION['firstname']) ||
                      isset($_SESSION['lastname']) ||
                      isset($_SESSION['email']) ||
                      isset($_SESSION['password']) ||
                      isset($_SESSION['gender']) ||
                      isset($_SESSION['religion']) 
                    ) {
                      # code...
                      session_unset();
                    }
                  ?>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" >
                      <label class="form-check-label text-secondary" for="iAgree">
                        I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button class="btn bsb-btn-2xl btn-primary" type="submit" name="register">Sign up</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-12">
                  <hr class="mt-5 mb-4 border-secondary-subtle">
                  <p class="m-0 text-secondary text-center">Already have an account? <a href="./login.php" class="link-primary text-decoration-none">Sign in</a></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>
<script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>