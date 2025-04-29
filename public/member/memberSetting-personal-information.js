// public/member/memberSetting-personal-information.js

document.addEventListener('DOMContentLoaded', function () {
    // Function to handle form submission with confirmation
    function handleFormSubmission(formId, confirmTitle, confirmText) {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                Swal.fire({
                    title: confirmTitle,
                    text: confirmText,
                    icon: 'warning',
                    showCancelButton: true,
                    buttonsStyling: true, // ✅ force SweetAlert button styling
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        confirmButton: 'swal-btn', // Add custom class for the confirm button
                        cancelButton: 'swal-btn-cancel' // Add custom class for the cancel button
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const formData = new FormData(form);

                        // Add confirmation parameter
                        formData.append('confirm', 'true');

                        // Log form data (optional for debugging)
                        console.log('Submitting Form Data:', Object.fromEntries(formData.entries()));

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: data.success,
                                    buttonsStyling: true, // ✅ add it here too
                                    confirmButtonColor: '#28a745',
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'swal-btn'
                                    }
                                }).then(() => {
                                    setTimeout(() => {
                                        Swal.close();
                                    }, 1000);
                                });
                            } else if (data.error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: data.error,
                                    buttonsStyling: true, // ✅ and here
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'swal-btn'
                                    }
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'There was an error updating your information: ' + error.message,
                                buttonsStyling: true, // ✅ and here
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'swal-btn'
                                }
                            });
                        });
                    }
                });
            });
        }
    }

    // Attach handler for personal-info-form
    handleFormSubmission(
        'personal-info-form',
        'Are you sure?',
        'Do you want to update your personal information?'
    );

    // Attach handler for account-details-form
    handleFormSubmission(
        'account-details-form',
        'Confirm Update',
        'Are you sure you want to update your personal information?'
    );
});
