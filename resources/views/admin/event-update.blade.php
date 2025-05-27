<x-admin-layout>
    <!-- Header Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="/admin/event-record" 
                   class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div class="ml-4">
                    <h1 class="text-2xl font-bold text-gray-800">Update Event</h1>
                    <p class="text-sm text-gray-600 mt-1">Modify event details and settings</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6">
            <form id="update-event-form" action="{{ route('event.record.update', $event->event_id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Event Name -->
                    <div class="md:col-span-2">
                        <label for="event-name" class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
                        <input type="text" id="event-name" name="event-name" 
                               value="{{ old('event-name', $event->event_name) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                               placeholder="Enter event name" required />
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                                placeholder="Enter event description" required>{{ old('description', $event->event_description) }}</textarea>
                    </div>

                    <!-- Event Banner -->
                    <div class="md:col-span-2">
                        <label for="event-banner" class="block text-sm font-medium text-gray-700 mb-1">Event Banner</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-yellow-500 transition-colors duration-200">
                            <div class="space-y-2 text-center">
                                @if ($event->banner)
                                    <img src="{{ asset('storage/' . $event->banner) }}" 
                                         alt="Current Banner" 
                                         class="mx-auto h-32 w-auto rounded-lg shadow-sm mb-4">
                                @endif
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="event-banner" class="relative cursor-pointer rounded-md font-medium text-yellow-600 hover:text-yellow-700">
                                        <span>Upload new banner</span>
                                        <input id="event-banner" name="event-banner" type="file" class="sr-only" accept="image/*">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Participants -->
                    <div>
                        <label for="total-participant" class="block text-sm font-medium text-gray-700 mb-1">Total Participants</label>
                        <input type="number" id="total-participant" name="total-participant" min="1"
                               value="{{ old('total-participant', $event->total_participation) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                               placeholder="Enter maximum participants" required />
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select id="category" name="category"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200">
                            <option value="private" {{ $event->event_category === 'private' ? 'selected' : '' }}>Private</option>
                            <option value="public" {{ $event->event_category === 'public' ? 'selected' : '' }}>Public</option>
                        </select>
                    </div>

                    <!-- Event Status -->
                    <div>
                        <label for="event-status" class="block text-sm font-medium text-gray-700 mb-1">Event Status</label>
                        <select id="event-status" name="event-status"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200">
                            <option value="running" {{ $event->event_status === 'running' ? 'selected' : '' }}>Running</option>
                            <option value="draft" {{ $event->event_status === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="ended" {{ $event->event_status === 'ended' ? 'selected' : '' }}>Ended</option>
                        </select>
                    </div>

                    <!-- Event Session -->
                    <div>
                        <label for="event-session" class="block text-sm font-medium text-gray-700 mb-1">Event Session</label>
                        <input type="text" id="event-session" name="event-session"
                               value="{{ old('event-session', $event->event_session) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                               placeholder="e.g., Morning, Afternoon, Evening" required />
                    </div>

                    <!-- Location -->
                    <div class="md:col-span-2">
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <input type="text" id="location" name="location"
                               value="{{ old('location', $event->event_location) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                               placeholder="Enter event location" required />
                    </div>

                    <!-- Time Section -->
                    <div>
                        <label for="start-time" class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                        <input type="time" id="start-time" name="start-time"
                               value="{{ old('start-time', $event->event_start_time) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                               required />
                    </div>

                    <div>
                        <label for="end-time" class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
                        <input type="time" id="end-time" name="end-time"
                               value="{{ old('end-time', $event->event_end_time) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                               required />
                    </div>

                    <!-- Event Date -->
                    <div>
                        <label for="event-date" class="block text-sm font-medium text-gray-700 mb-1">Event Date</label>
                        <input type="date" id="event-date" name="event-date"
                               value="{{ old('event-date', $event->event_date ? date('Y-m-d', strtotime($event->event_date)) : '') }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                               required />
                    </div>

                    <!-- Amount -->
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Event Fee (RM)</label>
                        <div class="relative rounded-lg">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">RM</span>
                            </div>
                            <input type="number" id="amount" name="amount" step="0.01" min="0"
                                   value="{{ old('amount', $event->event_price) }}"
                                   class="w-full pl-12 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                                   placeholder="0.00" required />
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4 mt-6 pt-6 border-t">
                    <a href="/admin/event-record"
                       class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div id="success-message" style="display: none;">{{ session('success') }}</div>
    @endif
    
    @if($errors->any())
        <div id="error-message" style="display: none;">{{ implode(', ', $errors->all()) }}</div>
    @endif

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/adminEvent.js') }}"></script>

    <!-- Preview Image Script -->
    <script>
        document.getElementById('event-banner').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.createElement('img');
                    preview.src = e.target.result;
                    preview.className = 'mx-auto h-32 w-auto rounded-lg shadow-sm mb-4';
                    
                    // Remove any existing preview
                    const existingPreview = document.querySelector('.banner-preview');
                    if (existingPreview) {
                        existingPreview.remove();
                    }
                    
                    // Replace the current banner with the new preview
                    const currentBanner = document.querySelector('img[alt="Current Banner"]');
                    if (currentBanner) {
                        currentBanner.replaceWith(preview);
                    } else {
                        const uploadIcon = document.querySelector('svg.mx-auto');
                        uploadIcon.parentElement.insertBefore(preview, uploadIcon);
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-admin-layout>