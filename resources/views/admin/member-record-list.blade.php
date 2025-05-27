<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Member Record</h1>
        <!-- Horizontal Line -->
        <hr class="border-gray-300 my-2">
    </div>

    <!-- Export and Total Members Section -->
    <div class="mb-4">
        <div class="flex items-center justify-between mb-4">
            <!-- Export Button -->
            <div class="flex space-x-2">
                <button id="export-excel" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium shadow flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export to Excel
                </button>
                <button id="export-pdf" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium shadow flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export to PDF
                </button>
            </div>
            <!-- Total Members will be updated by DataTables -->
            <p class="text-gray-600">Total Members:
                <span class="font-medium text-gray-900" id="total-members">0</span>
            </p>
        </div>

        <!-- Search and Filter Section -->
        <div class="flex items-center justify-between space-x-4">
            <!-- Search Input -->
            <div class="relative flex-1">
                <span class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
                </span>
                <input type="text" id="datatables-search" class="custom-search-input" placeholder="Search by name, email, or status (associate-member/mfls-alumni)">
            </div>
            
            <!-- Per Page Filter -->
            <div id="per-page-filter" class="flex items-center"></div>
        </div>
    </div>

    <!-- Bulk Actions Section -->
    <div class="mb-4 flex items-center space-x-4">
        <select id="bulk-action" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <option value="">Bulk Actions</option>
            <option value="deactivate">Deactivate Selected</option>
            <option value="delete">Delete Selected</option>
        </select>
        <button id="apply-bulk-action" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-medium shadow disabled:opacity-50 disabled:cursor-not-allowed" disabled>
            Apply
        </button>
        <span id="selected-count" class="text-gray-600">0 members selected</span>
    </div>

    <style>
        /* Custom DataTables Styling */
        .dataTables_wrapper .dataTables_paginate {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            margin: 0 2px;
            padding: 0.5rem 1rem;
            border: none !important;
            background: #f3f4f6 !important;
            color: #374151 !important;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e5e7eb !important;
            color: #1f2937 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #3b82f6 !important;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #2563eb !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background: #f3f4f6 !important;
            color: #9ca3af !important;
            cursor: not-allowed;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
        .dataTables_wrapper .dataTables_paginate .paginate_button.next {
            padding: 0.5rem 1rem;
        }

        /* Custom length menu styling */
        .dataTables_length {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dataTables_length select {
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background-color: #fff;
            cursor: pointer;
            margin-right: 0.5rem;
        }

        .dataTables_length label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #374151;
            font-size: 0.875rem;
        }

        /* Add sort indicator styling */
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:after {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 0.75rem;
        }

        table.dataTable thead .sorting:after {
            content: "↕";
            opacity: 0.2;
        }

        table.dataTable thead .sorting_asc:after {
            content: "↑";
            opacity: 1;
            color: #3b82f6;
        }

        table.dataTable thead .sorting_desc:after {
            content: "↓";
            opacity: 1;
            color: #3b82f6;
        }

        table.dataTable thead th {
            position: relative;
            padding-right: 25px !important;
        }

        /* Hide default DataTables filter */
        .dataTables_filter {
            display: none;
        }

        /* Custom search input styling */
        .custom-search-input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background-color: #fff;
            font-size: 0.875rem;
            line-height: 1.25rem;
            color: #374151;
        }

        .custom-search-input:focus {
            outline: none;
            border-color: #3b82f6;
            ring: 2px;
            ring-color: #93c5fd;
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Hide default DataTables styling */
        table.dataTable thead th {
            border-bottom: 1px solid #e5e7eb !important;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #e5e7eb !important;
        }

        /* Adjust action column alignment */
        .action-column {
            text-align: right !important;
        }

        /* Make action buttons more compact */
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .action-button {
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
        }

        /* Hide default DataTables info and pagination */
        .dataTables_info, .dataTables_paginate {
            display: none !important;
        }

        /* Custom pagination styling */
        .custom-pagination-button {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .custom-pagination-button.current {
            background-color: #3b82f6 !important;
            color: white !important;
        }

        .custom-pagination-button:not(.current) {
            background-color: #f3f4f6;
            color: #374151;
        }

        .custom-pagination-button:not(.current):hover {
            background-color: #e5e7eb;
        }

        .custom-pagination-button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Ellipsis styling */
        .custom-pagination-ellipsis {
            padding: 0.5rem;
            color: #6b7280;
        }
    </style>

    <!-- Loading Overlay -->
    <div id="loading-overlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white p-5 rounded-lg flex items-center space-x-4">
            <div class="animate-spin rounded-full h-8 w-8 border-4 border-blue-500 border-t-transparent"></div>
            <span class="text-gray-700 text-lg font-medium">Loading...</span>
        </div>
    </div>

    <!-- Table Container -->
    <div class="relative">
        <!-- Processing Indicator -->
        <div id="processing-indicator" class="hidden absolute inset-0 bg-white bg-opacity-75 z-10 flex items-center justify-center">
            <div class="flex items-center space-x-3">
                <div class="animate-spin rounded-full h-6 w-6 border-4 border-blue-500 border-t-transparent"></div>
                <span class="text-gray-600">Processing...</span>
            </div>
    </div>

 <!-- Table -->
 <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table id="members-table" class="w-full text-sm text-left text-gray-500">
        <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
            <tr>
                        <th class="px-4 py-3">
                            <input type="checkbox" id="select-all" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </th>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Achievement</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Action</th>
            </tr>
        </thead>
    </table>
        </div>
</div>

    <!-- Custom Info and Pagination -->
    <div class="mt-4 flex flex-col sm:flex-row justify-between items-center">
        <div class="text-sm text-gray-700 mb-4 sm:mb-0" id="custom-info">
            Showing 1 to 10 of 0 entries
        </div>
        <div class="flex items-center space-x-2" id="custom-pagination">
            <!-- Pagination will be inserted here -->
        </div>
    </div>

    <!-- Add required CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/adminMemberRecord.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Show loading overlay initially
            $('#loading-overlay').removeClass('hidden');

            var table = $('#members-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.member.record.index') }}",
                    beforeSend: function() {
                        $('#processing-indicator').removeClass('hidden');
                    },
                    complete: function() {
                        $('#processing-indicator').addClass('hidden');
                    },
                    error: function(xhr, error, thrown) {
                        $('#processing-indicator').addClass('hidden');
                        
                        // Parse the error response
                        let errorMessage = 'An error occurred while loading the data.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        // Show error with SweetAlert2
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                columns: [
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            return '<input type="checkbox" class="member-checkbox rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="' + row.member_id + '">';
                        }
                    },
                    {
                        data: null,
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data: 'name_with_avatar', name: 'name', orderable: true},
                    {data: 'email', name: 'login.email', orderable: true},
                    {data: 'achievement', name: 'achievement', orderable: false},
                    {data: 'member_status', name: 'member_status', orderable: true},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'action-column'
                    }
                ],
                order: [[1, 'asc']], // Order by name column by default
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                language: {
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    },
                    lengthMenu: "_MENU_ per page",
                    search: "",
                    searchPlaceholder: "Search member",
                    zeroRecords: "No matching records found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                },
                drawCallback: function(settings) {
                    // Update custom info
                    var info = this.api().page.info();
                    $('#custom-info').text(
                        'Showing ' + (info.start + 1) + ' to ' + info.end + ' of ' + info.recordsTotal + ' entries'
                    );

                    // Create custom pagination
                    createCustomPagination(this.api());

                    // Update total members count
                    $('#total-members').text(info.recordsTotal);
                    
                    // Hide loading overlay after initial load
                    $('#loading-overlay').addClass('hidden');

                    // Add Tailwind classes to length menu
                    $('.dataTables_length select').addClass('rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500');
                },
                // Add error handling for DataTables
                error: function(xhr, error, thrown) {
                    console.error('DataTables error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while loading the member records.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                },
                initComplete: function() {
                    // Move length menu to custom location
                    $('#per-page-filter').append($('.dataTables_length'));
                    
                    // Remove the default search box
                    $('.dataTables_filter').remove();
                },
                // Add buttons configuration
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Export to Excel',
                        className: 'hidden', // Hide default button
                        exportOptions: {
                            columns: [1, 2, 4] // Export Name, Email, and Status columns
                        },
                        title: 'Member Records'
                    },
                    {
                        extend: 'pdf',
                        text: 'Export to PDF',
                        className: 'hidden', // Hide default button
                        exportOptions: {
                            columns: [1, 2, 4] // Export Name, Email, and Status columns
                        },
                        title: 'Member Records'
                    }
                ],
                // Remove default info and pagination
                info: false,
                pagingType: 'simple_numbers'
            });

            // Custom export button click handlers
            $('#export-excel').on('click', function() {
                table.button('.buttons-excel').trigger();
            });

            $('#export-pdf').on('click', function() {
                table.button('.buttons-pdf').trigger();
            });

            // Handle general AJAX errors
            $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
                if (settings.url.indexOf('member-record') > -1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was a problem connecting to the server. Please try again.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            });

            // Handle custom search input
            $('#datatables-search').on('keyup', function() {
                table.search(this.value).draw();
            });

            // Hide processing indicator when draw is complete
            table.on('draw.dt', function() {
                $('#processing-indicator').addClass('hidden');
            });

            // Handle select all checkbox
            $('#select-all').on('change', function() {
                $('.member-checkbox').prop('checked', this.checked);
                updateSelectedCount();
                updateBulkActionButton();
            });

            // Handle individual checkboxes
            $(document).on('change', '.member-checkbox', function() {
                updateSelectedCount();
                updateBulkActionButton();
                
                // Update select all checkbox
                var allChecked = $('.member-checkbox:checked').length === $('.member-checkbox').length;
                $('#select-all').prop('checked', allChecked);
            });

            // Update selected count
            function updateSelectedCount() {
                var count = $('.member-checkbox:checked').length;
                $('#selected-count').text(count + ' members selected');
            }

            // Enable/disable bulk action button
            function updateBulkActionButton() {
                var count = $('.member-checkbox:checked').length;
                $('#apply-bulk-action').prop('disabled', count === 0);
            }

            // Handle bulk action
            $('#apply-bulk-action').on('click', function() {
                var action = $('#bulk-action').val();
                if (!action) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Please select an action',
                        text: 'Choose an action from the dropdown menu.',
                    });
                    return;
                }

                var selectedIds = $('.member-checkbox:checked').map(function() {
                    return this.value;
                }).get();

                if (selectedIds.length === 0) {
                    return;
                }

                var confirmMessage = action === 'delete' 
                    ? 'Are you sure you want to delete the selected members? This action cannot be undone.'
                    : 'Are you sure you want to deactivate the selected members?';

                Swal.fire({
                    title: 'Confirm Action',
                    text: confirmMessage,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: action === 'delete' ? '#EF4444' : '#3B82F6',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: action === 'delete' ? 'Yes, delete them!' : 'Yes, deactivate them!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading state
                        Swal.fire({
                            title: 'Processing...',
                            html: 'Please wait while we process your request.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Send request to server
                        $.ajax({
                            url: `/admin/member-record/bulk-${action}`,
                            method: 'POST',
                            data: {
                                ids: selectedIds,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.message
                                }).then(() => {
                                    // Refresh table
                                    table.ajax.reload();
                                    // Reset checkboxes and counts
                                    $('#select-all').prop('checked', false);
                                    updateSelectedCount();
                                    updateBulkActionButton();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: xhr.responseJSON?.message || 'An error occurred while processing your request.'
                                });
                            }
                        });
                    }
                });
            });

            // Function to create custom pagination
            function createCustomPagination(api) {
                var info = api.page.info();
                var currentPage = info.page; // Current page (0-based)
                var totalPages = info.pages; // Total number of pages
                var paginationHtml = '';

                // Previous button
                paginationHtml += `
                    <button type="button" 
                        class="custom-pagination-button${currentPage === 0 ? ' disabled' : ''}" 
                        ${currentPage === 0 ? 'disabled' : ''}
                        data-page="prev">
                        Previous
                    </button>`;

                // First page
                paginationHtml += `
                    <button type="button" 
                        class="custom-pagination-button${currentPage === 0 ? ' current' : ''}" 
                        data-page="0">
                        1
                    </button>`;

                // Handle ellipsis and middle pages
                var startPage = Math.max(1, currentPage - 1);
                var endPage = Math.min(totalPages - 2, currentPage + 1);

                if (startPage > 1) {
                    paginationHtml += '<span class="custom-pagination-ellipsis">...</span>';
                }

                for (var i = startPage; i <= endPage; i++) {
                    paginationHtml += `
                        <button type="button" 
                            class="custom-pagination-button${currentPage === i ? ' current' : ''}" 
                            data-page="${i}">
                            ${i + 1}
                        </button>`;
                }

                if (endPage < totalPages - 2) {
                    paginationHtml += '<span class="custom-pagination-ellipsis">...</span>';
                }

                // Last page if not already included
                if (totalPages > 1) {
                    paginationHtml += `
                        <button type="button" 
                            class="custom-pagination-button${currentPage === totalPages - 1 ? ' current' : ''}" 
                            data-page="${totalPages - 1}">
                            ${totalPages}
                        </button>`;
                }

                // Next button
                paginationHtml += `
                    <button type="button" 
                        class="custom-pagination-button${currentPage >= totalPages - 1 ? ' disabled' : ''}" 
                        ${currentPage >= totalPages - 1 ? 'disabled' : ''}
                        data-page="next">
                        Next
                    </button>`;

                // Set the HTML
                $('#custom-pagination').html(paginationHtml);

                // Remove any existing click handlers
                $('#custom-pagination button').off('click');

                // Add click handlers
                $('#custom-pagination button').on('click', function() {
                    if ($(this).hasClass('disabled')) return;

                    var page = $(this).data('page');
                    if (page === 'prev') {
                        api.page('previous').draw('page');
                    } else if (page === 'next') {
                        api.page('next').draw('page');
                    } else {
                        api.page(parseInt(page)).draw('page');
                    }
                });
            }
        });

        // Delete member function with SweetAlert2
        function deleteMember(memberId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Processing...',
                        html: 'Please wait while we process your request.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Send delete request
                    fetch(`/admin/member-record/delete/${memberId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // Reload DataTable
                                $('#members-table').DataTable().ajax.reload();
                            });
                        } else {
                            throw new Error(data.message);
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: error.message || 'Something went wrong!'
                        });
                    });
                }
            });
        }
    </script>

    <!-- Hidden Success and Error Messages -->
    @if(session('success'))
    <div id="success-message" style="display: none;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div id="error-message" style="display: none;">{{ implode(', ', $errors->all()) }}</div>
    @endif

</x-admin-layout>