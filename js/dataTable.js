$(document).ready( function () {

    // data table access
    let table = $('#customerTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 20],
    });

    //td:not(:last-child) - exclude the last column
    $('#customerTable tbody').on('click', 'tr td:not(:last-child)', function () {
        var data = table.row(this).data();

        let modalContent = `
            <p><strong>Customer ID:</strong> ${data[0]}</p>
            <p><strong>Store ID:</strong> ${data[1]}</p>
            <p><strong>First Name:</strong> ${data[2]}</p>
            <p><strong>Last Name:</strong> ${data[3]}</p>
            <p><strong>Email:</strong> ${data[4]}</p>
            <p><strong>Address:</strong> ${data[5]}</p>   
        `

        $('#customerDetails').html(modalContent);
        $('#infoModal').modal('show');


        //console.log('Row data:', data);
    });

});
