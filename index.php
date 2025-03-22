<?php
session_start();
require  "config/dbConfig.php";
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['form_id'])) {
        
        $form_id = $_POST['form_id'];

        if($form_id == 'login') 
        {
            $username = isset($_POST['uname']) ? htmlspecialchars($_POST['uname']) : "";
            $password = isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : "";

            $query = "SELECT * FROM users WHERE user_name = :user_name";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':user_name', $username, PDO::PARAM_STR);
            $stmt ->execute();
            $user = $stmt->fetch();

            if($user && password_verify($password, $user['password']))
            {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['role'] = $user['role'];

                header('Location: table.php');
                exit();
            }
            else 
            {
                echo "Invalid credentials!";
            }
        }
        if($form_id == 'register') {

            //validate and sanitize input fields
            $full_name = isset($_POST['FullName']) ? trim(htmlspecialchars(($_POST['FullName']))) : '';
            $user_name = isset($_POST['UserName']) ? trim(htmlspecialchars(($_POST['UserName']))) : '';
            $email = isset($_POST['Email']) ? trim(htmlspecialchars(($_POST['Email']))) : '';
            $password = isset($_POST['Password']) ? trim(htmlspecialchars(($_POST['Password']))) : '';
            $role = "user";

            //hash password
            $options = ['cost' => 13]; 
            $hashed_pass = password_hash($password, PASSWORD_BCRYPT, $options);

            try
            {
                require  "config/dbConfig.php";

                $query = "INSERT INTO 
                    users(full_name, user_name, email, password, role) 
                    VALUES(:full_name, :user_name, :email, :password, :role)";
                $stmt = $conn -> prepare($query);
                $stmt->bindValue(':full_name', $full_name, PDO::PARAM_STR);
                $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $hashed_pass, PDO::PARAM_STR);
                $stmt->bindValue(':role', $role, PDO::PARAM_STR);

                if($stmt->execute()) {
                    header('Location: index.php?registered=1');
                    exit();
                }
            }
            catch(PDOException $e)
            {
                echo "Error:" . $e -> getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login & Registration</title>
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="css/sweetalert2.css" rel="stylesheet"/>
    <script src="js/sweetalert2.all.min.js"></script>
</head>
<body class="bg-dark text-light">
    <nav class="navbar navbar-light bg-dark border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand text-light ms-3" href="index.php">
                <i class="bi bi-house fs-3"></i>
            </a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-light border p-4">
                    <ul class="nav nav-tabs" id="authTabs">
                        <li class="nav-item" >
                            <a class="nav-link active" data-bs-toggle="tab" href="#login">Login</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" data-bs-toggle="tab" href="#register">Register</a>
                        </li>
                    </ul>
                    <!--Begin Login Form  -->
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="login">
                            <form method="POST">
                                <input type="hidden" name="form_id" value="login">
                                <div class="mb-3">
                                    <label class="form-label">User Name</label>
                                    <input type="text" class="form-control" name="uname">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass">
                                </div>
                                <button type="submit" class="btn btn-success w-100">Login</button>
                            </form>
                        </div>
                        <!-- End Login Form -->
                        <!-- Registration -->
                        <div class="tab-pane fade" id="register">
                            <form method="POST">
                                <input type="hidden" name="form_id" value="register">
                                <div class="mb-3">
                                    <label class="form-label">Full Name:</label>
                                    <input type="text" class="form-control" name="FullName">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">User Name:</label>
                                    <input type="text" class="form-control" name="UserName">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email:</label>
                                    <input type="text" class="form-control" name="Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password:</label>
                                    <input type="text" class="form-control" name="Password">
                                </div>
                                <button type="submit" class="btn btn-success w-100">Register</button>
                            </form>
                        </div>
                        <!-- Registration -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('registered') === '1') {
            Swal.fire({
                title: 'Success!',
                text: 'Registered successfully! Try logging in!',
                icon: 'success',
                background: "#343a40",
                color: "#ffffff",
                confirmButtonColor: "#28a745",
            });
            $('#authTabs a[href="#login"]').tab('show');
        }
    });
</script>