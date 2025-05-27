document.addEventListener('DOMContentLoaded', function () {
    const registrationForm = document.getElementById('registrationForm');

    if (!registrationForm) {
        console.error('Registration form not found!');
        return;
    }

    registrationForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Processing...',
            text: 'Please wait...',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading();
            }
        });

        const formData = new FormData(this);
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.disabled = true;

        try {
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
            });

            const data = await response.json();
            console.log('Server Response:', data);

            // Check if the backend has returned a failure response for joined events
            if (!data.success && data.message === 'You have already joined this event.') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: data.message,
                    confirmButtonText: 'OK'
                });
                submitButton.disabled = false;
                return; // Stop further execution if the user has already joined
            }

            // If the event is paid, handle redirection
            if (data.success && data.redirect_url) {
                window.location.href = data.redirect_url;
            } else if (data.success) {
                // Success message for nonpaid events or other success responses
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.reload();
                });
            } else {
                // Handle the case where success is false
                Swal.fire({
                    icon: 'error',
                    title: 'Sorry!',
                    text: data.message || 'Registration failed',
                    confirmButtonText: 'OK'
                });
            }
        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An unexpected error occurred. Please try again.',
                confirmButtonText: 'OK'
            });
        } finally {
            submitButton.disabled = false;
        }
    });
});
