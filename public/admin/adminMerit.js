document.addEventListener('DOMContentLoaded', function () {
    // Handle success message
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: successMessage.innerText,
        });
    }

    // Handle error message
    const errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errorMessage.innerText || 'There were some problems with your input!',
        });
    }

    // SweetAlert confirmation before form submission for add merit
    const addMeritForm = document.getElementById('add-merit-form');
    if (addMeritForm) {
        addMeritForm.onsubmit = function (e) {
            e.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to add this merit!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form if confirmed
                }
            });
        };
    }

        //update
    // SweetAlert confirmation before form submission for update merit
    const updateMeritForm = document.getElementById('update-merit-form');
    if (updateMeritForm) {
        updateMeritForm.onsubmit = function (e) {
            e.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to update this merit!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form if confirmed
                }
            });
        };
    }

    //delete
    // SweetAlert confirmation before delete
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.onsubmit = function (e) {
            e.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form if confirmed
                }
            });
        };
    });

     // Search functionality
     $('#search-input').on('keyup', function () {
        var value = $(this).val().toLowerCase(); // Get the search input value

        $('table tbody tr').filter(function () {
            // Get the text from the relevant columns
            var eventName = $(this).find('td:nth-child(2)').text().toLowerCase(); // Event Name
            var allocationDate = $(this).find('td:nth-child(3)').text().toLowerCase(); // Allocation Date
            
            // Check if the search value is present in the specified columns
            return eventName.indexOf(value) > -1 || allocationDate.indexOf(value) > -1;
        }).toggle(); // Show or hide the row based on the search
    });

    //retrive phone number when choose the pic
    

});

