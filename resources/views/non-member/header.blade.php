<header class="relative z-50">
    <nav class="bg-white border-b border-gray-100 shadow-sm">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <div class="relative">
                    <div class="absolute -inset-1 bg-yellow-500 rounded-full blur-sm opacity-25"></div>
                    <img src="{{ asset('images/abm-logo.svg') }}" alt="Logo" class="relative w-12 h-12 rounded-full">
                </div>
                <span class="ml-3 text-xl font-bold text-gray-800">ABM<span class="text-yellow-500">Kedah</span></span>
            </a>

            <!-- Navigation Links -->
            <ul class="hidden md:flex items-center space-x-1 text-sm font-medium">
                <li>
                    <a href="/" class="px-4 py-2 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-colors {{ request()->is('/') ? 'bg-yellow-50 text-yellow-600' : 'text-gray-700' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/about" class="px-4 py-2 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-colors {{ request()->is('about') ? 'bg-yellow-50 text-yellow-600' : 'text-gray-700' }}">
                        About
                    </a>
                </li>
                <li>
                    <a href="/blog" class="px-4 py-2 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-colors {{ request()->is('blog') ? 'bg-yellow-50 text-yellow-600' : 'text-gray-700' }}">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="/portfolio" class="px-4 py-2 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-colors {{ request()->is('portfolio') ? 'bg-yellow-50 text-yellow-600' : 'text-gray-700' }}">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="/contact" class="px-4 py-2 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-colors {{ request()->is('contact') ? 'bg-yellow-50 text-yellow-600' : 'text-gray-700' }}">
                        Contact
                    </a>
                </li>
            </ul>

            <!-- Call to Action Buttons -->
            <div class="hidden md:flex items-center space-x-3">
                <a onclick="openLoginForm()" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition-colors">
                    Sign In
                </a>
                <button onclick="openRegistrationForm()" class="px-5 py-2 text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-sm hover:shadow transition-all duration-200">
                    Join Us
                </button>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-gray-700 focus:outline-none" id="menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-white border-t border-gray-100" id="mobile-menu">
            <div class="container mx-auto px-6 py-3 space-y-3">
                <a href="/" class="block px-4 py-2 rounded-lg hover:bg-yellow-50 {{ request()->is('/') ? 'bg-yellow-50 text-yellow-600 font-medium' : 'text-gray-700' }}">
                    Home
                </a>
                <a href="/about" class="block px-4 py-2 rounded-lg hover:bg-yellow-50 {{ request()->is('about') ? 'bg-yellow-50 text-yellow-600 font-medium' : 'text-gray-700' }}">
                    About
                </a>
                <a href="/blog" class="block px-4 py-2 rounded-lg hover:bg-yellow-50 {{ request()->is('blog') ? 'bg-yellow-50 text-yellow-600 font-medium' : 'text-gray-700' }}">
                    Blog
                </a>
                <a href="/portfolio" class="block px-4 py-2 rounded-lg hover:bg-yellow-50 {{ request()->is('portfolio') ? 'bg-yellow-50 text-yellow-600 font-medium' : 'text-gray-700' }}">
                    Portfolio
                </a>
                <a href="/contact" class="block px-4 py-2 rounded-lg hover:bg-yellow-50 {{ request()->is('contact') ? 'bg-yellow-50 text-yellow-600 font-medium' : 'text-gray-700' }}">
                    Contact
                </a>
                
                <div class="pt-4 mt-4 border-t border-gray-100 flex flex-col space-y-3">
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition-colors text-center">
                        Sign In
                    </a>
                    <button onclick="openRegistrationForm()" class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-sm hover:shadow transition-all duration-200 text-center">
                        Join Us
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            
            // Change icon based on menu state
            if (mobileMenu.classList.contains('hidden')) {
                menuToggle.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                `;
            } else {
                menuToggle.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                `;
            }
        });

        // Registration form functionality
        function openRegistrationForm() {
            window.location.href = "{{ route('register') }}";
        }
    </script>
</header>