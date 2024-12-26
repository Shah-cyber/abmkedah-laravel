//add event
document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: successMessage.innerText,
        });
    }

    const errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errorMessage.innerText || 'There were some problems with your input!',
        });
    }
});

//event update

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

    // SweetAlert confirmation before form submission for event update
    const updateForm = document.getElementById('update-event-form');
    if (updateForm) {
        updateForm.onsubmit = function (e) {
            e.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
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
});

//delete event
document.addEventListener('DOMContentLoaded', function () {
    // Existing SweetAlert code...

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
});