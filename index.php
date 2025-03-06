<?php
$msg="";
$errors = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
    <script src="js/datatables.min.js"></script>
    <link href="css/datatables.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-dark text-light">
    <nav class="navbar navbar-light bg-dark border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand text-light ms-3" href="index.php">
                <i class="bi bi-house fs-3"></i>
            </a>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-content-center mb-3">
                <h2>Customers</h2>
                <button type="button" class="btn btn-success float-end" data-bs-toggle='modal' data-bs-target='#addModal'>Add Customer</button>
            </div>


            <table id="customerTable" class="table table-dark table-hover table-bordered w-100">
                <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>Store Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                    try {
                        include("config/dbConfig.php");
                        $query = 
                            "SELECT 
                            CUSTOMER_ID,
                            STORE_ID,
                            FIRST_NAME,
                            LAST_NAME,
                            EMAIL,
                            ADDRESS 
                            FROM customers";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                    } catch (PDOException $e) {
                        //show error in apache/logs/error.log
                        error_log($e->getMessage());
                        
                        $errors["DatabaseError"] = "Database error occured. Please try again.";
                        $json_error = json_encode(htmlspecialchars($errors['DatabaseError'], ENT_QUOTES, 'UTF-8'));

                        echo <<<EOD
                        <script type="text/javascript">
                            Swal.fire({
                                icon: 'error',
                                title: 'Database Error',
                                text: {$json_error},
                                background: '#343a40',
                                color: '#ffffff',
                                confirmButtonColor: '#dc3545'
                            });
                        </script>
                        EOD;
                    }
                ?>
                <tbody>
                    <?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            extract($row);

                            echo"<tr>";
                                echo"<td>{$CUSTOMER_ID}</td>";
                                echo"<td>{$STORE_ID}</td>";
                                echo"<td>{$FIRST_NAME}</td>";
                                echo"<td>{$LAST_NAME}</td>";
                                echo"<td>{$EMAIL}</td>";
                                echo"<td>{$ADDRESS}</td>";
                                echo"<td>";    
                                    echo"<button type='button' class='btn btn-warning btn-sm customerEdit' data-customer-id='$CUSTOMER_ID'>Edit</button>";
                                    echo"<button onclick='delete_customer($CUSTOMER_ID, event)' class='btn btn-danger btn-sm'>Del</button>";
                                echo"</td>";
                            echo"</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Customer -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Customer</h5>
                    <button type="button" class="btn-close bg-dark-subtle" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="addDetails">
                </div>
            </div>
        </div>
    </div>

    <!-- Info Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Info</h5>
                    <button type="button" class="btn-close bg-dark-subtle" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="customerDetails">
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title">Update Customer Info</h4>
                </div>
                <div class="modal-body" id="customerEdit"></div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="js/dataTable.js"></script>
<script src="js/UPDATE_customer.js"></script>
<link href="css/custom_dataTable.css" rel="stylesheet"/>
