// public/member/memberSetting-personal-information.js

// Personal Information Form Handler
document.getElementById('personal-info-form')?.addEventListener('submit', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to update your personal information?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EAB308',
        cancelButtonColor: '#dc2626',
        confirmButtonText: 'Yes, update it!',
        customClass: {
            confirmButton: 'swal2-confirm bg-yellow-500 text-white',
            cancelButton: 'swal2-cancel bg-red-600 text-white'
        },
        buttonsStyling: true
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.success,
                        confirmButtonColor: '#EAB308',
                        customClass: {
                            confirmButton: 'swal2-confirm bg-yellow-500 text-white'
                        }
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    throw new Error(data.error || 'Something went wrong');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                let errorMessage = 'An error occurred while updating your information.';
                
                if (error.errors) {
                    errorMessage = Object.values(error.errors).flat().join('\n');
                } else if (error.message) {
                    errorMessage = error.message;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                    confirmButtonColor: '#EAB308',
                    customClass: {
                        confirmButton: 'swal2-confirm bg-yellow-500 text-white'
                    }
                });
            });
        }
    });
});

// Account Settings Form Handler
document.getElementById('account-details-form')?.addEventListener('submit', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Update Account',
        text: "Are you sure you want to update your account details?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EAB308',
        cancelButtonColor: '#dc2626',
        confirmButtonText: 'Yes, update it!',
        customClass: {
            confirmButton: 'swal2-confirm bg-yellow-500 text-white',
            cancelButton: 'swal2-cancel bg-red-600 text-white'
        },
        buttonsStyling: true
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.success,
                        confirmButtonColor: '#EAB308',
                        customClass: {
                            confirmButton: 'swal2-confirm bg-yellow-500 text-white'
                        }
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    throw new Error(data.error || 'Something went wrong');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.message || 'Failed to update account details',
                    confirmButtonColor: '#EAB308',
                    customClass: {
                        confirmButton: 'swal2-confirm bg-yellow-500 text-white'
                    }
                });
            });
        }
    });
});

// Deactivate Account Handler
document.getElementById('deactivate-account-btn')?.addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Your account will be deactivated. You can reactivate it by contacting support.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#3B82F6',
        confirmButtonText: 'Yes, deactivate it!',
        cancelButtonText: 'No, keep it',
        customClass: {
            confirmButton: 'swal2-confirm bg-red-600 text-white',
            cancelButton: 'swal2-cancel bg-blue-500 text-white'
        },
        buttonsStyling: true
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('/member/settings/deactivate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Account Deactivated',
                        text: data.message,
                        icon: 'success',
                        confirmButtonColor: '#EAB308',
                        customClass: {
                            confirmButton: 'swal2-confirm bg-yellow-500 text-white'
                        }
                    }).then(() => {
                        window.location.href = data.redirect;
                    });
                } else {
                    throw new Error(data.message || 'Failed to deactivate account');
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error',
                    text: error.message || 'An error occurred while deactivating your account.',
                    icon: 'error',
                    confirmButtonColor: '#EAB308',
                    customClass: {
                        confirmButton: 'swal2-confirm bg-yellow-500 text-white'
                    }
                });
            });
        }
    });
});