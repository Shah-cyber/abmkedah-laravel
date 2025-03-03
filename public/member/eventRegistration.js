// Listen for form submission
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm'); // Ensure this ID matches your form's ID

    if (!form) {
        console.error('Registration form not found!');
        return;
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Show loading state
        Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we process your registration.',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading();
            }
        });

        // Get the CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Submit the form
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(Object.fromEntries(new FormData(form)))
        })
        .then(response => response.json())
        .then(data => {
            Swal.close(); // Close the loading state

            if (data.success) {
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message,
                    allowOutsideClick: true, // Allow closing by clicking outside
                    showConfirmButton: true,
                    confirmButtonColor: '#000000' // Set the OK button color to black
                }).then(() => {
                    window.location.href = '/member/event'; // Redirect after success
                });
            } else {
                // Handle different error messages
                if (data.errors) {
                    // Show validation errors
                    let errorMessage = 'Please fix the following errors:\n';
                    for (const [key, value] of Object.entries(data.errors)) {
                        errorMessage += `${value.join(', ')}\n`;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Failed',
                        text: errorMessage,
                        showConfirmButton: true,
                        confirmButtonColor: '#000000' 
                        
                    });
                } else {
                    // Show other error messages
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                        showConfirmButton: true,
                        confirmButtonColor: '#000000' 
                    });
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An unexpected error occurred. Please try again.',
                showConfirmButton: true
            });
        });
    });
});