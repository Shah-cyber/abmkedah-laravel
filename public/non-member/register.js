document.addEventListener('DOMContentLoaded', function () {
    const registrationForm = document.getElementById('registration-form');

    if (registrationForm) {
        registrationForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            const formData = new FormData(this); // Create a FormData object
            const submitButton = this.querySelector('button[type="submit"]'); // Get the submit button
            submitButton.disabled = true; // Disable the submit button

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // Include CSRF token
                },
            })
                .then(async (response) => {
                    const data = await response.json();
                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration Successful',
                            html: `<p>${data.success}</p><p>${data.message}</p>`, // Include both messages
                            confirmButtonText: 'OK',
                        }).then(() => {
                            window.location.href = '/'; // Redirect on success
                        });
                    } else {
                        // Handle validation errors
                        Swal.fire({
                            icon: 'error',
                            title: 'Registration Failed',
                            text: Object.values(data.errors || {}).flat().join(', ') || 'Please correct the errors and try again.',
                            confirmButtonText: 'OK',
                        });
                    }
                })
                .catch((error) => {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Unexpected Error',
                        text: 'An unexpected error occurred. Please try again.',
                        confirmButtonText: 'OK',
                    });
                })
                .finally(() => {
                    submitButton.disabled = false; // Re-enable the submit button
                });
        });
    }
});


