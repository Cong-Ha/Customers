document.addEventListener("DOMContentLoaded", () => {
    window.delete_customer = async function (id) {
        console.log(id);

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            background: "#343a40",
            color: "#ffffff",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then(async (result) => {
            if (result.isConfirmed) {
                console.log("swal is firing");
                try {
                    const response = await fetch("delete_customer.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ id: id })
                    });
                    
                    // Get raw response
                    const text = await response.text();  
                   // console.log("Raw response from PHP:", text);  // Debugging

                    const data = JSON.parse(text);
                   // console.log(data);

                    if (data['status'] === 'success') {
                        Swal.fire("Deleted!", "The record has been deleted.", "success")
                            .then(()=> {
                                location.reload();
                            });
                    } else {
                        Swal.fire("Error", data.message, "error");
                    }
                } catch (e) {
                    console.log("Delete error:", e);
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to delete customer.<br><br>" + e,
                        icon: "error",
                        background: "#343a40",
                        color: "#ffffff",
                        confirmButtonColor: "#dc3545"
                    });
                }
            }
        });
    };
});