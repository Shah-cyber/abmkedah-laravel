<!-- registration.blade.php -->
<div id="registration-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-end">
    <div class="bg-white w-full md:w-1/2 h-full shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out justify-center overflow-y-auto">
        <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" onclick="closeRegistrationForm()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="p-6">
            <h2 class="flex font-bold justify-center mb-2 text-2xl">Registration</h2>
            <p class="flex justify-center mb-6 text-gray-500 text-sm">Already a member? <a href="#" onclick="openLoginForm()" class="ml-2 text-green-500 hover:underline"> Login now</a></p>
            <div class="relative bg-white rounded shadow border border-neutral-200 p-6">
                <form>
                    <!-- Form Inputs -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" placeholder="" class="w-full border border-gray-300 rounded-lg p-2" required>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" placeholder="" class="w-full border border-gray-300 rounded-lg p-2" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" placeholder="" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" placeholder="" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700">Proof of Participation</label>
                        <input type="file" class="w-full border border-gray-300 rounded-lg p-2 mb-4" required>
                    </div>
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="border-gray-300 rounded" required>
                            <span class="ml-2 text-sm text-gray-600">
                                I agree to the terms and conditions.
                            </span>
                        </label>
                    </div>
                    <button type="submit" class="w-full bg-black text-white hover:bg-gray-800 font-medium py-2 px-4 rounded-lg">
                        Register now
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Inline JavaScript -->
<script>
    const modal = document.getElementById("registration-modal");

    function openRegistrationForm() {
        modal.classList.remove("hidden");
        modal.children[0].classList.remove("translate-x-full");
    }

    function closeRegistrationForm() {
        modal.children[0].classList.add("translate-x-full");
        setTimeout(() => modal.classList.add("hidden"), 300); // Wait for the transition
    }
</script>