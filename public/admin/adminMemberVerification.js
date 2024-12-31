// Approve function
window.approveMember = function(applicationId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to approve this user as a member.",
        icon: 'warning',
        showCancelButton: true, 
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/admin/member-verification/approve/${applicationId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.message) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Approved!',
                        text: data.message,
                    }).then(() => {
                        // Redirect to the member verification view
                        window.location.href = `/admin/member-verification/view/${applicationId}`;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.error || 'An error occurred.',
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An unexpected error occurred.',
                });
            });
        }
    });
}

// Reject function
window.rejectMember = function(applicationId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to reject this user application.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, reject it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/admin/member-verification/reject/${applicationId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.message) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Rejected!',
                        text: data.message,
                    }).then(() => {
                        // Redirect to the member verification view
                        window.location.href = `/admin/member-verification/view/${applicationId}`;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.error || 'An error occurred.',
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An unexpected error occurred.',
                });
            });
        }
    });
}

function openProofModal(pdfUrl) {
    const modal = document.getElementById('proof-modal');
    const iframe = document.getElementById('proof-iframe');

    // Set the iframe source to the provided PDF URL
    iframe.src = pdfUrl;

    // Display the modal
    modal.classList.remove('hidden');
}

function closeProofModal() {
    const modal = document.getElementById('proof-modal');
    const iframe = document.getElementById('proof-iframe');

    // Clear the iframe source
    iframe.src = '';

    // Hide the modal
    modal.classList.add('hidden');
}
