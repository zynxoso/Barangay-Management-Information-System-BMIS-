<html lang="en">
<?php
    include 'pages/connection.php';
    session_start();
?>
 <head>

<link rel="icon" href="includes/assets/image/logo.png" type="image/icon type">
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Login</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      content: [
        './login.php',
        './pages/**/*.php',
        './includes/**/*.php'
      ],
      theme: {
        extend: {},
      },
      plugins: [],
    }
  </script>
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            background-image: url('includes/assets/image/BGLOGIN.png');
            background-size: cover;
            background-position: center;
        }
  </style>
 </head>
 <body class="bg-gray-100 bg-opacity-75 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
   <div class="flex justify-center mb-6">
                <?php 
                    $query = mysqli_query($con, "SELECT image,certL,certR FROM dashboard");
                    while($row = mysqli_fetch_array($query)) {
                        echo '<img src="pages/settings/img/'.basename($row['certL']).'" style="width:80px; height:80px ; border-radius: 50%; border-color: white;">';
                    }
                ?>
   </div>
   <h2 class="text-2xl font-bold mb-6 text-center text-green-500">
    Login
   </h2>
   <form class="space-y-6" method="POST" action="">
    <div class="mb-4">
     <label class="block text-gray-700 font-medium mb-2" for="username">
      Username
     </label>
     <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" id="username" name="username" placeholder="Enter your username" required="" type="text"/>
    </div>
    <div class="mb-4 relative">
     <label class="block text-gray-700 font-medium mb-2" for="password">
      Password
     </label>
     <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" id="password" name="password" placeholder="Enter your password" required="" type="password"/>
     <span class="absolute inset-y-0 right-0 mt-7 pr-3 flex items-center text-sm leading-5">
      <i class="far fa-eye cursor-pointer text-gray-500" id="togglePassword">
      </i>
     </span>
    </div>
    <div class="flex items-center justify-between">
     <div class="flex items-center">
      <input class="h-4 w-4 text-green-500 focus:ring-green-400 border-gray-300 rounded" id="remember_me" name="remember_me" type="checkbox"/>
      <label class="ml-2 block text-sm text-gray-900" for="remember_me">
       Remember me
      </label>
     </div>
    </div>
    <button class="w-full bg-green-500 text-white py-2 rounded-lg font-medium hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50" name="LogIn" type="submit">
     Log In
    </button>
   </form>
  </div>
  <script>
   const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
  </script>
 </body>
</html>

<?php
// function.php and database.php are now together
// but this statement will be read first before the next statement of database.php
include_once("pages/connection.php");
// include_once("includes/login.php");
if (isset($_POST['LogIn'])) {
    // Retrieve user input //Kapag na detect na ni login, gagawin nya yung nasa loob ng curley braces {}
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Query the database for administrator
    $admin = mysqli_query($con, "SELECT * FROM tbluser WHERE username='$username' AND user_type='administrator'");
    $result_admin = mysqli_num_rows($admin);
    
    // Query the database for staff
    $staff = mysqli_query($con, "SELECT * FROM tblstaff WHERE username='$username'");
    $result_staff = mysqli_num_rows($staff);
    
    // Check the query result for administrator
    if ($result_admin > 0) {
        while ($row = mysqli_fetch_array($admin)) {
            // Verify the password using password_verify
            if (password_verify($password, $row['password'])) {
                $_SESSION['role'] = "Administrator";
                $_SESSION['userid'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                // if valid login credentials go to
                header('Location: pages/dashboard/dashboard.php');
                exit();
            } else {
                // Incorrect password for admin
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: 'Incorrect username and/or password!',
                            confirmButtonText: 'OK'
                        });
                      </script>";
            }
        }
    }
    
    // Check the query result for staff
    if ($result_staff > 0) {
        while ($row = mysqli_fetch_array($staff)) {
            // Verify the password using password_verify
            if (password_verify($password, $row['password'])) {
                $_SESSION['role'] = $row['firstname'];
                $_SESSION['staff'] = "staff";
                $_SESSION['userid'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                // if valid login credentials go to
                header('Location: pages/dashboard/dashboard.php');
                exit();
            } else {
                // Incorrect password for staff
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: 'Incorrect username and/or password!',
                            confirmButtonText: 'OK'
                        });
                      </script>";
            }
        }
    } else {
        // Username not found in either table
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: 'Incorrect username and/or password!',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
}
?>