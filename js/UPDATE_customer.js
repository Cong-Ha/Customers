$(document).ready( function () {

    $('#customerTable tbody').on('click', '.customerEdit', function () {
        console.log('update firing');
    
        let table = $('#customerTable').DataTable();
    
         // Get the customer ID from the button's data attribute
         var customerId = $(this).data('customer-id');
    
         // Get the row data corresponding to the clicked button
         var rowData = table.row($(this).closest('tr')).data();
    
         // Construct the modal content
         var modalContent = `
             <form id="updateCustomerForm">
                 <div class="mb-3">
                     <input type="hidden" class="form-control" id="customerId" value="${rowData[0]}" readonly="readonly">
                 </div>
                 <div class="mb-3">
                     <label for="firstName" class="form-label">First Name</label>
                     <input type="text" class="form-control" id="firstName" value="${rowData[2]}">
                     <span class="text-danger"></span>
                 </div>
                 <div class="mb-3">
                     <label for="lastName" class="form-label">Last Name</label>
                     <input type="text" class="form-control" id="lastName" value="${rowData[3]}">
                     <span class="text-danger"></span>
                 </div>
                 <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" value="${rowData[4]}">
                     <span class="text-danger"></span>
                 </div>
                 <div class="mb-3">
                     <label for="address" class="form-label">Address</label>
                     <input type="text" class="form-control" id="address" value="${rowData[5]}">
                     <span class="text-danger"></span>
                 </div>
                 <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                 </div>
             </form>
         `;
    
         $('#customerEdit').html(modalContent);
         $('#updateModal').modal('show');
     });

    
    // Handle form submission
    $(document).on('submit', '#updateCustomerForm', function (e) {
        e.preventDefault();
    
        var updatedCustomer = {
            customerId: $('#customerId').val(),
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val(),
            email: $('#email').val(),
            address: $('#address').val(),
        };
    
        $.ajax({
            url: 'update_customer.php',
            method: 'POST',
            data: updatedCustomer,
            dataType: 'json',
            success: function (response) {
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
                        text: 'Customer updated successfully!',
                        icon: 'success',
                        background: "#343a40",
                        color: "#ffffff",
                        confirmButtonColor: "#28a745",
                    }).then(() => {
                        $('#updateModal').modal('hide');
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
                    text: "Failed to update customer details.<br><br>" + errorMessages,
                    icon: "error",
                    background: "#343a40",
                    color: "#ffffff",
                    confirmButtonColor: "#dc3545"
                });
            }
        });
    });

    // Clear error messages from form inputs when the user starts typing
    $(document).on('input change', '#updateCustomerForm  input', function () {
        $(this).next(".text-danger").text("");
    });
});


