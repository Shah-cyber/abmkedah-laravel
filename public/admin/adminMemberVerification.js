// Approve function
window.approveMember = function(applicationId) {
    Swal.fire({
        title: 'Approve Member Application',
        text: 'Are you sure you want to approve this member application?',
        icon: 'question',
        showCancelButton: true, 
        confirmButtonText: 'Yes, approve',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#059669',
        cancelButtonColor: '#6B7280',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch(`/admin/member/verification/${applicationId}/approve`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => Promise.reject(err));
                }
                return response.json();
            })
            .then(data => {
                console.log('Success:', data);
                    Swal.fire({
                        icon: 'success',
                    title: 'Success!',
                        text: data.message,
                    }).then(() => {
                    window.location.href = '/admin/member/verification/list';
                    });
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: error.message || 'An error occurred while approving the application.',
                });
            });
        }
    });
}

// Reject function
window.rejectMember = function(applicationId) {
    Swal.fire({
        title: 'Reject Member Application',
        text: 'Are you sure you want to reject this member application?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, reject',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#DC2626',
        cancelButtonColor: '#6B7280',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/member/verification/${applicationId}/reject`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => Promise.reject(err));
                }
                return response.json();
            })
            .then(data => {
                console.log('Success:', data);
                    Swal.fire({
                        icon: 'success',
                    title: 'Success!',
                        text: data.message,
                    }).then(() => {
                    window.location.href = '/admin/member/verification/list';
                    });
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: error.message || 'An error occurred while rejecting the application.',
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
