<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/member-record" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Update Information</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

     <!-- Form -->
     <div class="mt-4 px-6 py-4 bg-white shadow-lg rounded-lg">
        <form action="{{ route('admin.member.record.update', $member->member_id) }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-4">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Full Name -->
                <div class="md:col-span-2">
                    <label for="full-name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input
                        type="text"
                        id="full-name"
                        name="full-name"
                        value="{{ old('full-name', $member->name) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('full-name') border-red-500 @enderror" />
                    @error('full-name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- IC Number -->
                <div>
                    <label for="ic-number" class="block text-sm font-medium text-gray-700">IC Number</label>
                    <input
                        type="text"
                        id="ic-number"
                        name="ic-number"
                        value="{{ old('ic-number', $member->ic_number) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('ic-number') border-red-500 @enderror" />
                    @error('ic-number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age -->
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input
                        type="number"
                        id="age"
                        name="age"
                        value="{{ old('age', $member->age) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('age') border-red-500 @enderror" />
                    @error('age')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Race -->
                <div>
                    <label for="race" class="block text-sm font-medium text-gray-700">Race</label>
                    <input
                        type="text"
                        id="race"
                        name="race"
                        value="{{ old('race', $member->race) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('race') border-red-500 @enderror" />
                    @error('race')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Religion -->
                <div>
                    <label for="religion" class="block text-sm font-medium text-gray-700">Religion</label>
                    <input
                        type="text"
                        id="religion"
                        name="religion"
                        value="{{ old('religion', $member->religion) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('religion') border-red-500 @enderror" />
                    @error('religion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select
                        id="gender"
                        name="gender"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('gender') border-red-500 @enderror">
                        <option value="Male" {{ old('gender', $member->gender) === 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $member->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input
                        type="text"
                        id="phone-number"
                        name="phone-number"
                        value="{{ old('phone-number', $member->phone_number) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('phone-number') border-red-500 @enderror" />
                    @error('phone-number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Birth Place -->
                <div>
                    <label for="birth-place" class="block text-sm font-medium text-gray-700">Birth Place</label>
                    <input
                        type="text"
                        id="birth-place"
                        name="birth-place"
                        value="{{ old('birth-place', $member->birthplace) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('birth-place') border-red-500 @enderror" />
                    @error('birth-place')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Birth Date -->
                <div>
                    <label for="birth-date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                    <input
                        type="date"
                        id="birth-date"
                        name="birth-date"
                        value="{{ old('birth-date', $member->birthdate) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('birth-date') border-red-500 @enderror" />
                    @error('birth-date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input
                        type="text"
                        id="address"
                        name="address"
                        value="{{ old('address', $member->address) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('address') border-red-500 @enderror" />
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- User Status -->
                <div>
                    <label for="user-status" class="block text-sm font-medium text-gray-700">User Status</label>
                    <select
                        id="user-status"
                        name="user-status"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('user-status') border-red-500 @enderror">
                        <option value="associate-member" {{ old('user-status', $member->member_status) === 'associate-member' ? 'selected' : '' }}>Associate Member</option>
                        <option value="regular-member" {{ old('user-status', $member->member_status) === 'regular-member' ? 'selected' : '' }}>MFLS Alumni</option>
                    </select>
                    @error('user-status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Proof of Participation -->
                <div>
                    <label for="proof-file" class="block text-sm font-medium text-gray-700">Proof of Participation</label>
                    <input
                        type="file"
                        id="proof-file"
                        name="proof-file"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('proof-file') border-red-500 @enderror" />
                    @if($member->application && $member->application->prove_letter)
                        <p class="text-sm text-gray-500 mt-1">Current file: {{ basename($member->application->prove_letter) }}</p>
                    @endif
                    @error('proof-file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button
                    type="submit"
                    class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>

            <!-- Hidden Success and Error Messages -->
            @if(session('success'))
                <div id="success-message" style="display: none;">{{ session('success') }}</div>
            @endif
            
            @if($errors->any())
                <div id="error-message" style="display: none;">{{ implode(', ', $errors->all()) }}</div>
            @endif
        </form>
    </div>

 
</x-admin-layout>