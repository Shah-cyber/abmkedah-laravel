// Function to show success message
function showSuccess(message) {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        showConfirmButton: false,
        timer: 1500
    });
}

// Function to show error message
function showError(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message,
        confirmButtonText: 'OK'
    });
}

// Handle update form submission
document.addEventListener('DOMContentLoaded', function() {
    const userUpdateForm = document.getElementById('userUpdateForm');
    
    if (userUpdateForm) {
        userUpdateForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const userId = this.dataset.userId;
            const userType = this.dataset.userType;

            // Check if passwords match
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (newPassword && newPassword !== confirmPassword) {
                showError('Passwords do not match!');
                return;
            }

            try {
                const response = await fetch(`/admin/setting/users/update/${userId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        username: document.getElementById('username').value,
                        email: document.getElementById('email').value,
                        password: newPassword,
                        acc_status: document.getElementById('select-status').value,
                        role: document.getElementById('select-role').value,
                        user_type: userType
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    showSuccess('User updated successfully!');
                    // Redirect after 1.5 seconds
                    setTimeout(() => {
                        window.location.href = '/admin/setting/users';
                    }, 1500);
                } else {
                    showError(data.message || 'Something went wrong!');
                }
            } catch (error) {
                showError('An error occurred while updating the user.');
            }
        });

        // Disable role selection for members
        const userType = userUpdateForm.dataset.userType;
        const roleSelect = document.getElementById('select-role');
        if (userType === 'member') {
            roleSelect.disabled = true;
            roleSelect.value = 'member';
        }
    }
});

// ... existing code ...

// Handle add admin form submission
document.getElementById('adminAddForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Success Alert
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.message,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/setting/users'; // Redirect to users page
                }
            });
        } else {
            // Error Alert
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message,
                confirmButtonColor: '#d33'
            });
        }
    })
    .catch(error => {
        // Catch any network or unexpected errors
        Swal.fire({
            icon: 'error',
            title: 'Unexpected Error',
            text: 'An unexpected error occurred. Please try again later.',
            confirmButtonColor: '#d33'
        });
        console.error('Error:', error);
    });
});


