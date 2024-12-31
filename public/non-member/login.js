document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form'); // Use an explicit ID 

    if (loginForm) {
        loginForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this); // Create a FormData object
            const submitButton = this.querySelector('button[type="submit"]'); // Get the submit button
            submitButton.disabled = true; // Disable the submit button

            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // Include CSRF token
                    },
                });

                const data = await response.json();

                if (response.ok) {
                    // SweetAlert for success
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        text: data.message || 'Redirecting to your dashboard...',
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(() => {
                        window.location.href = data.redirect; // Redirect to the dashboard
                    });
                } else {
                    // SweetAlert for errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: data.message || 'Invalid email or password.',
                        confirmButtonText: 'OK',
                    });
                }
            } catch (error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Unexpected Error',
                    text: 'An unexpected error occurred. Please try again.',
                    confirmButtonText: 'OK',
                });
            } finally {
                submitButton.disabled = false; // Re-enable the submit button
            }
        });
    }
});
