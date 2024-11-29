<header>
    <nav class="bg-black text-white">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/abm-logo.svg') }}" alt="Logo" class="w-10 h-10 rounded-full">
            </a>

            <!-- Navigation Links -->
            <ul class="hidden md:flex space-x-6 text-sm font-medium gap-4">
                <li><a href="/" class="hover:text-gray-300">Home</a></li>
                <li><a href="/about" class="hover:text-gray-300">About</a></li>
                <li><a href="/blog" class="hover:text-gray-300">Blog</a></li>
                <li><a href="/portfolio" class="hover:text-gray-300">Portfolio</a></li>
                <li><a href="/contact" class="hover:text-gray-300">Contact</a></li>
                <li><a href="#" class="hover:text-gray-300">Store</a></li>
            </ul>

            <!-- Call to Action -->
            <button class="bg-green-500 hover:bg-green-600 text-black font-medium py-2 px-4 rounded-lg"
                onclick="openRegistrationForm()">
                Join us
            </button>

            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-white focus:outline-none" id="menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <ul class="flex flex-col space-y-4 text-sm font-medium text-center py-4">
                <li><a href="/" class="hover:text-gray-300">Home</a></li>
                <li><a href="/about" class="hover:text-gray-300">About</a></li>
                <li><a href="/blog" class="hover:text-gray-300">Blog</a></li>
                <li><a href="/portfolio" class="hover:text-gray-300">Portfolio</a></li>
                <li><a href="/contact" class="hover:text-gray-300">Contact</a></li>
                <li><a href="#" class="hover:text-gray-300">Store</a></li>
                <li><a href="#" class="bg-green-500 hover:bg-green-600 text-black font-medium py-2 px-4 rounded-lg">Join us</a></li>
            </ul>
        </div>
    </nav>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</header>