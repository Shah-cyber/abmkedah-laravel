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
                    // SweetAlert with success animation and countdown timer
                    let timerInterval;
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        html: 'Redirecting to your dashboard in <b></b> seconds.',
                        timer: 1000, // Countdown duration in milliseconds
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getHtmlContainer().querySelector('b');
                            timerInterval = setInterval(() => {
                                timer.textContent = (Swal.getTimerLeft() / 1000).toFixed(1); // Convert to seconds
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        },
                    }).then(() => {
                        window.location.href = data.redirect; // Redirect to the dashboard
                    });
                } else {
                    // SweetAlert with error animation and countdown timer
                    let timerInterval;
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        html: 'Invalid email or password. Closing in <b></b> seconds.',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getHtmlContainer().querySelector('b');
                            timerInterval = setInterval(() => {
                                timer.textContent = (Swal.getTimerLeft() / 1000).toFixed(1); // Convert to seconds
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        },
                    });
                }
            } catch (error) {
                console.error(error);
                // SweetAlert for unexpected errors
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

//log out
document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: successMessage.innerText,
        });
    }
});