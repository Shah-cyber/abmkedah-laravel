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
document.addEventListener('DOMContentLoaded', function() {
    const adminAddForm = document.getElementById('adminAddForm');
    
    if (adminAddForm) {
        adminAddForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Check if passwords match
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (password !== confirmPassword) {
                showError('Passwords do not match!');
                return;
            }

            try {
                const response = await fetch('/admin/setting/users/store', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        username: document.getElementById('username').value,
                        email: document.getElementById('email').value,
                        password: password,
                        phone_number: document.getElementById('phone-number').value,
                        'select-status': document.getElementById('select-status').value,
                        'select-role': document.getElementById('select-role').value
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    showSuccess('Admin added successfully!');
                    // Redirect after 1.5 seconds
                    setTimeout(() => {
                        window.location.href = '/admin/setting/users';
                    }, 1500);
                } else {
                    showError(data.message || 'Something went wrong!');
                }
            } catch (error) {
                showError('An error occurred while adding the admin.');
            }
        });
    }
});