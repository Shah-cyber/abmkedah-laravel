//add event
document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: successMessage.innerText,
        });
    }

    const errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        Swal.fire({ 
            icon: 'error',
            title: 'Oops...',
            text: errorMessage.innerText || 'There were some problems with your input!',
        });
    }
});

//event update 
document.addEventListener('DOMContentLoaded', function () {
    // Handle success message
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: successMessage.innerText,
        });
    }

    // Handle info message
    const infoMessage = document.getElementById('info-message');
    if (infoMessage) {
        Swal.fire({
            icon: 'info',
            title: 'No Changes',
            text: infoMessage.innerText,
        });
    }

    // Handle error message
    const errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errorMessage.innerText || 'There were some problems with your input!',
        });
    }
});


//delete event
//delete event
document.addEventListener('DOMContentLoaded', function () {
    // SweetAlert confirmation before delete
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.onsubmit = function (e) {
            e.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "You must delete the merit points first before you can delete the event. This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform AJAX request to delete the event
                    const formData = new FormData(this);
                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // If deletion is successful, redirect or refresh the page
                            Swal.fire('Deleted!', 'The event has been deleted.', 'success').then(() => {
                                location.reload(); // Reload the page to see the changes
                            });
                        } else {
                            // If deletion fails, show an error message
                            return response.json().then(data => {
                                Swal.fire('Error!', data.message || 'Event not deleted successfully.', 'error');
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire('Error!', 'An error occurred while deleting the event.', 'error');
                    });
                }
            });
        };
    });
});

//search function
// $(document).ready(function() {
//     $('#search-input').on('keyup', function() {
//         var value = $(this).val().toLowerCase(); // Get the search input value

//         $('table tbody tr').filter(function() {
//             // Get the text from the relevant columns
//             var volunteerName = $(this).find('td:nth-child(2)').text().toLowerCase(); // Volunteer Name
//             var phoneNumber = $(this).find('td:nth-child(3)').text().toLowerCase(); // Phone Number
//             var memberStatus = $(this).find('td:nth-child(4)').text().toLowerCase(); // Member Status
            
//             // Check if the search value is present in any of the specified columns
//             return volunteerName.indexOf(value) > -1 || 
//                    phoneNumber.indexOf(value) > -1 || 
//                    memberStatus.indexOf(value) > -1;
//         }).toggle(); // Show or hide the row based on the search
//     });
// });

//pagination function
$(document).ready(function() {
    const rowsPerPage = 10; // Number of rows to display per page
    const rows = $('table tbody tr'); // All rows in the table
    const totalRows = rows.length; // Total number of rows
    const totalPages = Math.ceil(totalRows / rowsPerPage); // Total number of pages
    let currentPage = 1; // Current page

    function showPage(page) {
        // Hide all rows
        rows.hide();

        // Calculate start and end row indices
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        // Show the rows for the current page
        rows.slice(start, end).show();

        // Update pagination info
        $('#pagination-info').text(`Showing ${start + 1} to ${Math.min(end, totalRows)} of ${totalRows} entries`);

        // Update the page numbers
        $('#page-numbers').empty();
        for (let i = 1; i <= totalPages; i++) {
            $('#page-numbers').append(`
                <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300 page-number">${i}</button>
            `);
        }

        // Disable/enable previous and next buttons
        $('#prev-page').prop('disabled', page === 1);
        $('#next-page').prop('disabled', page === totalPages);
    }

    // Show the first page initially
    showPage(currentPage);

    // Previous button click handler
    $('#prev-page').click(function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    // Next button click handler
    $('#next-page').click(function() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    // Page number click handler
    $(document).on('click', '.page-number', function() {
        currentPage = parseInt($(this).text());
        showPage(currentPage);
    });
});

//search function
$(document).ready(function() {
    // Listen for input in the search bar
    $('input[type="text"]').on('input', function() {
        const searchTerm = $(this).val(); // Get the search term

        // Make an AJAX request to the search route
        $.ajax({
            url: "{{ route('event.record.search') }}",
            method: 'GET',
            data: { search: searchTerm },
            success: function(response) {
                // Replace the table content with the updated results
                $('#event-table').html(response);
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    });
});
