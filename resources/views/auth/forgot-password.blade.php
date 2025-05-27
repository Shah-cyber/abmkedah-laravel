<x-non-member-layout>
    <div id="forgot-password-modal" class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg">
            <div class="p-8">
                <!-- Logo and Title Section -->
                <div class="text-center mb-8">
                    <img src="{{ asset('images/abm-logo.svg') }}" alt="ABM Logo" class="h-16 mx-auto mb-4">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Forgot Password</h2>
                    <p class="text-gray-500">Enter your email to reset your password</p>
                </div>

                <!-- Forgot Password Form -->
                <div class="max-w-md mx-auto">
                    <form id="forgot-password-form" method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf
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
                                <input type="email" id="email" name="email" placeholder="Enter your email" 
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                    required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-black bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                            Send Reset Link
                        </button>

                        <!-- Back to Login -->
                        <p class="text-center text-sm text-gray-600">
                            Remember your password? 
                            <a href="#" onclick="openLoginForm()" class="font-medium text-yellow-600 hover:text-yellow-500">
                                Back to login
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('forgot-password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal-btn'
                        }
                    }).then(() => {
                        window.location.href = '/login';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message,
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal-btn'
                        }
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An error occurred. Please try again later.',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'swal-btn'
                    }
                });
            });
        });
    </script>
</x-non-member-layout> 