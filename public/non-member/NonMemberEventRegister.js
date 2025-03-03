document.addEventListener('DOMContentLoaded', function () {
    const registrationForm = document.getElementById('registrationForm');

    if (!registrationForm) {
        console.error('Registration form not found!');
        return;
    }

    registrationForm.addEventListener('submit', function (e) {
        e.preventDefault();
        console.log('Form submitted');

        // Show loading state
        if (typeof Swal === 'undefined') {
            console.error('SweetAlert2 is not defined!');
            return;
        }

        Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we process your registration.',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading();
            }
        });

        const formData = new FormData(this);
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.disabled = true;

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            },
        })
        .then(async (response) => {
            const data = await response.json();
            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'Registration Successful',
                    html: `<p>${data.success}</p><p>${data.message}</p>`,
                    confirmButtonText: 'OK',
                }).then(() => {
                    window.location.href = '/';
                });
            } else {
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
            submitButton.disabled = false;
        });
    });
}); 


