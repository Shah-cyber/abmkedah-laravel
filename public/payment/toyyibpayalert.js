document.addEventListener('DOMContentLoaded', function () {
    // Get success or error messages from Laravel session
    let successMessage = document.body.getAttribute('data-success');
    let errorMessage = document.body.getAttribute('data-error');

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Payment Successful!',
            text: successMessage,
            confirmButtonColor: '#000000'
        });
    }

    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Payment Failed',
            text: errorMessage,
            confirmButtonColor: '#000000'
        });
    }
});
