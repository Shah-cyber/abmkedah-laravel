// public/member/memberSetting-personal-information.js

document.getElementById('personal-info-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Show confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to update your personal information?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData(this);

            // Add confirmation parameter
            formData.append('confirm', 'true');

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.success,
                        confirmButtonColor: '#28a745' // Changed button color to green
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
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'There was an error updating your information.',
                });
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('account-details-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default submission

        Swal.fire({
            title: 'Confirm Update',
            text: "Are you sure you want to update your personal information?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(this);
                formData.append('confirm', 'true');

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.success,
                        confirmButtonColor: '#28a745'
                    }).then(() => {
                        setTimeout(() => {
                            Swal.close();
                        }, 1000);
                    });
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error updating your information.',
                    });
                });
            }
        });
    });
});
