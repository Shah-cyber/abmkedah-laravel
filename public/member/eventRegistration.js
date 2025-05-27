document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registrationForm');
    const registerButton = document.getElementById('registerButton');

    if (!form) {
        console.error('Registration form not found!');
        return;
    }

    // Check if button is disabled
    const isButtonDisabled = registerButton && (
        registerButton.classList.contains('cursor-not-allowed') || 
        registerButton.textContent.trim() === 'Already Registered' ||
        registerButton.textContent.trim() === 'Event Fully Booked'
    );

    // If button is disabled, prevent any click behavior
    if (isButtonDisabled) {
        registerButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Show appropriate message based on button text
            if (registerButton.textContent.trim() === 'Event Fully Booked') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Event Full',
                    text: 'We apologize, but this event has reached its maximum capacity. Please check our other upcoming events.',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'swal-btn',
                    }
                });
            } else if (registerButton.textContent.trim() === 'Already Registered') {
                Swal.fire({
                    icon: 'info',
                    title: 'Already Registered',
                    text: 'You have already registered for this event.',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'swal-btn',
                    }
                });
            }
            
            return false;
        });
    }

    const eventFee = parseFloat(form.dataset.eventFee || "0");
    console.log('Event Fee:', eventFee); // Log the event fee

    form.addEventListener('submit', async function (event) {
        event.preventDefault(); // Prevent the default form submission
        
        // Don't proceed if button is disabled
        if (isButtonDisabled) {
            return;
        }

        // ✅ Check if any required fields are empty
        const requiredFields = ['email', 'ic_number', 'name', 'phone_number'];
        const missingFields = requiredFields.filter(fieldName => {
            const input = form.querySelector(`[name="${fieldName}"]`);
            return !input || !input.value.trim();
        });

        if (missingFields.length > 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Missing Information',
                text: 'Please fill in your personal details before proceeding (email, IC number, name, or phone number).',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'swal-btn',
                }
            });
            return; // ⛔ Stop if any required fields are missing
        }

        // Show SweetAlert based on event fee
        if (eventFee > 0) {
            Swal.fire({
                title: 'Proceed to Payment',
                text: `You will be redirected to the payment page to pay RM${eventFee.toFixed(2)}`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Pay Now',
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'swal-btn',
                    cancelButton: 'swal-btn-cancel'
                }
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await submitForm();
                }
            });
        } else {
            // Free event - show immediate loading message
            Swal.fire({
                title: 'Processing...',
                text: 'Registering for the event...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });

            await submitForm();
        }

        // actual submission logic
        async function submitForm() {
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                const formData = Object.fromEntries(new FormData(form));
                console.log('Data being sent:', formData);

                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();
                Swal.close(); // Close loading

                if (data.success) {
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message || 'Successfully registered for the event!',
                            confirmButtonText: 'OK',
                            customClass: { confirmButton: 'swal-btn' }
                        });
                    }
                } else {
                    // Enhanced error handling with specific message for event capacity
                    let title = 'Registration Failed';
                    let icon = 'error';
                    
                    // Check if error is about event capacity
                    if (data.message && data.message.includes('maximum capacity')) {
                        title = 'Event Full';
                        icon = 'warning';
                    }
                    
                    Swal.fire({
                        icon: icon,
                        title: title,
                        text: data.message || 'Something went wrong!',
                        confirmButtonText: 'Close',
                        customClass: { confirmButton: 'swal-btn' }
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred. Please try again.',
                    confirmButtonText: 'Close',
                    customClass: { confirmButton: 'swal-btn' }
                });
            }
        }
    });
});
