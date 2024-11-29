<div id="login-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-0 flex justify-end">
    <div class="bg-white w-full md:w-1/2 h-full shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out justify-center overflow-y-auto">
        <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" onclick="closeLoginForm()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="p-6">
            <h2 class="flex font-bold justify-center mb-2 text-2xl">Login</h2>
            <p class="flex justify-center mb-6 text-gray-500 text-sm">
                New here?
                <a href="#" onclick="openRegistrationFromLogin()" class="ml-2 text-green-500 hover:underline">Register now</a>
            </p>
            <div class="relative bg-white rounded shadow border border-neutral-200 p-6">
                <form>
                    <div class="mb-4">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" placeholder="" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" placeholder="" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-green-500 hover:underline">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full bg-black text-white hover:bg-gray-800 font-medium py-2 px-4 rounded-lg">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const loginModal = document.getElementById("login-modal");

    function openLoginForm() {
        loginModal.classList.remove("hidden");
        loginModal.children[0].classList.remove("translate-x-full");
    }

    function closeLoginForm() {
        closeRegistrationForm()
        loginModal.children[0].classList.add("translate-x-full");
        setTimeout(() => loginModal.classList.add("hidden"), 300); // Wait for the transition
    }

    function openRegistrationFromLogin() {
        loginModal.children[0].classList.add("translate-x-full");
        loginModal.classList.add("hidden"); // no transition
        setTimeout(() => {
            registrationModal.classList.remove("hidden");
            registrationModal.children[0].classList.remove("translate-x-full");
        }, 300); // Wait for login modal's close transition
    }
</script>