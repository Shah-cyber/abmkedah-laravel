document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');

    if (!form) {
        console.error('Registration form not found!');
        return;
    }

    form.addEventListener('submit', async function(event) {
        event.preventDefault(); // Prevent the default form submission

        Swal.fire({
            title: 'Processing...',
            text: 'Redirecting to payment page...',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            // Get the CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            // Submit the form via fetch
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(new FormData(form)))
            });

            const data = await response.json();
            Swal.close(); // Close the loading state

            if (data.success) { // Check if the registration was successful
                if (data.redirect_url) {
                    // ✅ Redirect to ToyyibPay
                    window.location.href = data.redirect_url;
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message || 'Successfully registered for the event!',
                    });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message || 'Something went wrong!',
                });
            }
        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An unexpected error occurred. Please try again.',
            });
        }
    });
});
