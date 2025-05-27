<!-- registration.blade.php -->
<div id="registration-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white w-full max-w-lg md:max-w-xl lg:max-w-2xl rounded-lg shadow-lg transform scale-95 opacity-0 transition-all duration-300 ease-in-out my-4">
        <button class="absolute top-2 right-2 md:top-4 md:right-4 text-gray-600 hover:text-gray-800 transition-colors duration-200" onclick="closeRegistrationForm()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="p-3 md:p-5 lg:p-6">
            <!-- Logo and Title Section -->
            <div class="text-center mb-4 md:mb-5">
                <img src="{{ asset('images/abm-logo.svg') }}" alt="ABM Logo" class="h-10 md:h-12 lg:h-14 mx-auto mb-2 md:mb-3">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800 mb-1 md:mb-2">Create Account</h2>
                <p class="text-xs md:text-sm text-gray-500">Join ABM Kedah and be part of our community</p>
            </div>

            <!-- Registration Form -->
            <div class="max-w-2xl mx-auto">
                <form id="registration-form" method="POST" action="{{ route('register') }}" class="space-y-3 md:space-y-4" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <!-- Left Column -->
                        <div class="space-y-3 md:space-y-4">
                            <!-- Full Name Input -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2" for="name">
                                    Full Name
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="name" name="name" placeholder="Enter your full name" 
                                        class="block w-full pl-10 pr-3 py-2 md:py-3 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                        required>
                                </div>
                            </div>

                            <!-- Username Input -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2" for="username">
                                    Username
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="username" name="username" placeholder="Choose a username" 
                                        class="block w-full pl-10 pr-3 py-2 md:py-3 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                        required>
                                </div>
                            </div>

                            <!-- Email Input -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2" for="email">
                                    Email Address
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="email" name="email" placeholder="Enter your email" 
                                        class="block w-full pl-10 pr-3 py-2 md:py-3 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                        required>
                                </div>
                            </div>

                            <!-- Phone Number Input -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2" for="phone">
                                    Phone Number
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                    </div>
                                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" 
                                        class="block w-full pl-10 pr-3 py-2 md:py-3 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-3 md:space-y-4">
                            <!-- Password Input -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2" for="password">
                                    Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder="Create a password" 
                                        class="block w-full pl-10 pr-3 py-2 md:py-3 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                        required>
                                </div>
                                <p class="mt-1 text-xs md:text-sm text-gray-500">Must be at least 8 characters long</p>
                            </div>

                            <!-- Confirm Password Input -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 md:mb-2" for="password_confirmation">
                                    Confirm Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" 
                                        class="block w-full pl-10 pr-3 py-2 md:py-3 text-sm md:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                        required>
                                </div>
                            </div>

                            <!-- Prove Letter Upload -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="prove_letter">
                                    Prove Letter
                                </label>
                                <div class="relative">
                                    <div class="flex items-center justify-center w-full">
                                        <label for="prove_letter" class="flex flex-col items-center justify-center w-full h-20 md:h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                            <div class="flex flex-col items-center justify-center pt-3 pb-4 md:pt-4 md:pb-5">
                                                <svg class="w-5 h-5 md:w-6 md:h-6 mb-1 md:mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                                <p class="mb-1 text-xs text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500">(PDF, JPG, PNG up to 2MB)</p>
                                            </div>
                                            <input type="file" id="prove_letter" name="prove_letter" class="hidden" accept=".pdf,.jpg,.jpeg,.png" required>
                                        </label>
                    </div>
                                    <div id="file-name" class="mt-1 text-xs text-gray-500"></div>
                    </div>
                    </div>
                    </div>
                    </div>

                    <!-- Terms and Conditions -->
                    {{-- <div class="flex items-center mt-3 md:mt-4">
                        <input type="checkbox" id="terms" name="terms" class="h-3 w-3 md:h-4 md:w-4 text-yellow-500 focus:ring-yellow-500 border-gray-300 rounded" required>
                        <label for="terms" class="ml-2 block text-xs text-gray-700">
                            I agree to the <a href="#" class="text-yellow-600 hover:text-yellow-500">Terms and Conditions</a>
                        </label>
                    </div> --}}

                    <!-- Register Button -->
                    <button type="submit" class="w-full flex justify-center py-2 md:py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-xs md:text-sm font-medium text-black bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                        Create Account
                    </button>

                    <!-- Login Link -->
                    <p class="text-center text-xs text-gray-600">
                        Already have an account? 
                        <a href="#" onclick="openLoginFromRegistration()" class="font-medium text-yellow-600 hover:text-yellow-500">
                            Sign in
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const registrationModal = document.getElementById("registration-modal");
    const registrationContent = registrationModal.children[0];

    // File upload preview
    document.getElementById('prove_letter').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        document.getElementById('file-name').textContent = fileName ? `Selected file: ${fileName}` : '';
    });

    function openRegistrationForm() {
        registrationModal.classList.remove("hidden");
        setTimeout(() => {
            registrationContent.classList.remove("scale-95", "opacity-0");
            registrationContent.classList.add("scale-100", "opacity-100");
        }, 50);
    }

    function closeRegistrationForm() {
        registrationContent.classList.remove("scale-100", "opacity-100");
        registrationContent.classList.add("scale-95", "opacity-0");
        setTimeout(() => registrationModal.classList.add("hidden"), 300);
    }

    function openLoginFromRegistration() {
        closeRegistrationForm();
        setTimeout(() => {
            openLoginForm();
        }, 300);
    }
</script>
<!-- Include SweetAlert2 -->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<!-- Include your custom JS file -->
<script src="{{ asset('non-member/register.js') }}"></script> 