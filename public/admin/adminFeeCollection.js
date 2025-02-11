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

// Handle form submission
document.addEventListener('DOMContentLoaded', function () {
    const feeCollectionForm = document.getElementById('feeCollectionForm');

    if (feeCollectionForm) {
        feeCollectionForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitButton = this.querySelector('button[type="submit"]');

            // Prevent multiple submissions
            if (submitButton.disabled) return;

            submitButton.disabled = true;
            
            try {
                const response = await fetch('/admin/fee-collection/store', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        payment_allocation_name: document.getElementById('payment-name').value,
                        amount: document.getElementById('amount').value,
                        allocation_date: document.getElementById('allocation-date').value,
                        payment_type: document.getElementById('payment-type').value,
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    showSuccess('Fee collection added successfully!');
                    feeCollectionForm.reset();
                    setTimeout(() => {
                        window.location.href = '/admin/fee-collection';
                    }, 1500);
                } else {
                    showError(data.message || 'Something went wrong!');
                }
            } catch (error) {
                showError('An error occurred while submitting the form.');
            } finally {
                // Enable submit button after some time (optional)
                setTimeout(() => {
                    submitButton.disabled = false;
                }, 2000);
            }
        });
    }
});


// Handle update form submission
document.addEventListener('DOMContentLoaded', function() {
    const feeCollectionUpdateForm = document.getElementById('feeCollectionUpdateForm');
    
    if (feeCollectionUpdateForm) {
        feeCollectionUpdateForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const paymentId = this.dataset.paymentId;

            try {
                const response = await fetch(`/admin/fee-collection/update/${paymentId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        payment_allocation_name: document.getElementById('payment-name').value,
                        amount: document.getElementById('amount').value,
                        allocation_date: document.getElementById('allocation-date').value,
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    showSuccess('Fee collection updated successfully!');
                    // Redirect after 1.5 seconds
                    setTimeout(() => {
                        window.location.href = '/admin/fee-collection';
                    }, 1000);
                } else {
                    showError(data.message || 'Something went wrong!');
                }
            } catch (error) {
                showError('An error occurred while updating the form.');
            }
        });
    }
});

// ... existing code ...

// Function to handle delete
function deletePayment(paymentId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const response = await fetch(`/admin/fee-collection/delete/${paymentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();

                if (response.ok) {
                    showSuccess('Fee collection deleted successfully!');
                    // Remove the row from the table
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    showError(data.message || 'Something went wrong!');
                }
            } catch (error) {
                showError('An error occurred while deleting the payment.');
            }
        }
    });
}