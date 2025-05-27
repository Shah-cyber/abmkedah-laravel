<div id="login-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-md rounded-lg shadow-lg transform scale-95 opacity-0 transition-all duration-300 ease-in-out">
        <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800 transition-colors duration-200" onclick="closeLoginForm()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button> 
        <div class="p-8">
            <!-- Logo and Title Section -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/abm-logo.svg') }}" alt="ABM Logo" class="h-16 mx-auto mb-4">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back!</h2>
                <p class="text-gray-500">Sign in to continue to your account</p>
            </div>

            <!-- Login Form -->
            <div class="max-w-md mx-auto">
                <form id="login-form" method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <!-- Email Input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="email">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    placeholder="Enter your email" 
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                    required
                                >
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="password">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    placeholder="Enter your password" 
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-yellow-500 focus:ring-yellow-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-yellow-600 hover:text-yellow-500">Forgot password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-black bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                        Sign In
                    </button>

                    <!-- Register Link -->
                    <p class="text-center text-sm text-gray-600">
                        Don't have an account? 
                        <a href="#" onclick="openRegistrationFromLogin()" class="font-medium text-yellow-600 hover:text-yellow-500">
                            Register now
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const loginModal = document.getElementById("login-modal");
    const loginContent = loginModal.children[0];

    function openLoginForm() {
        loginModal.classList.remove("hidden");
        setTimeout(() => {
            loginContent.classList.remove("scale-95", "opacity-0");
            loginContent.classList.add("scale-100", "opacity-100");
        }, 50);
    }

    function closeLoginForm() {
        loginContent.classList.remove("scale-100", "opacity-100");
        loginContent.classList.add("scale-95", "opacity-0");
        setTimeout(() => loginModal.classList.add("hidden"), 300);
    }

    function openRegistrationFromLogin() {
        closeLoginForm();
        setTimeout(() => {
            openRegistrationForm();
        }, 300);
    }
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{ asset('non-member/login.js') }}"></script> <!-- Link to your SweetAlert JS file -->