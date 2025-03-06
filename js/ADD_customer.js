$(document).ready(function(){
    var modalContent = `
        <form id="addCustomerForm">
            <div class="mb-3">
                <label for="storeId" class="form-label">Store ID</label>
                <input type="number" min="1" max="10" class="form-control" id="storeId" value="">
                <span class="text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" value="">
                <span class="text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" value="">
                <span class="text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="">
                <span class="text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" value="">
                <span class="text-danger"></span>
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
        </form>
    `;

    $('#addDetails').html(modalContent);

    $(document).on('submit', '#addCustomerForm', function(e){
        e.preventDefault();

        let addCustomer = {
            storeId: $('#storeId').val(),
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val(),
            email: $('#email').val(),
            address: $('#address').val(),
        }

        $.ajax({
            url: 'add_customer.php',
            method: 'POST',
            data: addCustomer,
            dataType: 'json',
            success: function(response) {
                if (response.status === "error" && response.errors) {
                    //clear previous error messages
                    $('.text-danger').text('');

                    //loop through validation errors and display them
                    Object.keys(response.errors).forEach(function (key) {
                        //target the error span next to the input field
                        let errorElement = $("#" + key).siblings(".text-danger");
                        //check if error span exists
                        if (errorElement.length) {
                            errorElement.text(response.errors[key]);
                        } else {
                            console.warn("Could not find error span for", key);
                        }
                    });
                } else if (response.status === "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Customer added successfully!',
                        icon: 'success',
                        background: "#343a40",
                        color: "#ffffff",
                        confirmButtonColor: "#28a745",
                    }).then(() => {
                        $('#addModal').modal('hide');
                        location.reload();
                    })
                }
            },
            error: function (xhr, status, error) {
                let errorResponse = JSON.parse(xhr.responseText);
                let errorMessages = "";
            
                if (errorResponse.errors) {
                    errorMessages = Object.values(errorResponse.errors).join("<br>");
                } else {
                    errorMessages = xhr.responseText;
                }
                Swal.fire({
                    title: "Error!",
                    text: "Failed to add customer details.<br><br>" + errorMessages,
                    icon: "error",
                    background: "#343a40",
                    color: "#ffffff",
                    confirmButtonColor: "#dc3545"
                });
            }
        });
    });

    // Clear error messages from form inputs when the user starts typing
    $(document).on('input change', '#addCustomerForm  input', function () {
        $(this).next(".text-danger").text("");
    });

});