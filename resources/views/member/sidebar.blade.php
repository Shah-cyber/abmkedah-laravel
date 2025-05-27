<!-- Sidebar -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-950 border-r border-gray-800" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-950">
        <!-- Logo and Brand -->
        <a href="{{ route('member.dashboard') }}" class="flex items-center ps-2.5 mb-8 mt-4 group transition-all duration-300 ease-in-out">
            <div class="relative">
                <img src="{{ asset('images/abm-logo.svg') }}" class="h-8 me-3 transition-transform duration-300 group-hover:scale-110" alt="ABM Kedah Logo" />
                <div class="absolute inset-0 bg-yellow-500 rounded-full filter blur-2xl opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
            </div>
            <div class="flex flex-col">
                <span class="self-center text-white text-sm font-semibold whitespace-nowrap">
                    Angkatan Belia MFLS
            </span>
                <span class="text-xs text-gray-400">Negeri Kedah</span>
            </div>
        </a>

        <!-- Navigation -->
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('member.dashboard') }}" 
                   class="flex items-center p-2 rounded-lg text-white group transition-all duration-200 ease-in-out
                          {{ request()->routeIs('member.dashboard') ? 'bg-yellow-500 text-gray-900' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('member.dashboard') ? 'text-gray-900' : 'text-gray-400 group-hover:text-yellow-500' }} transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M8.75 13C9.99264 13 11 14.0074 11 15.25V18.75C11 19.9926 9.99264 21 8.75 21H5.25C4.00736 21 3 19.9926 3 18.75V15.25C3 14.0074 4.00736 13 5.25 13H8.75ZM18.75 13C19.9926 13 21 14.0074 21 15.25V18.75C21 19.9926 19.9926 21 18.75 21H15.25C14.0074 21 13 19.9926 13 18.75V15.25C13 14.0074 14.0074 13 15.25 13H18.75ZM8.75 3C9.99264 3 11 4.00736 11 5.25V8.75C11 9.99264 9.99264 11 8.75 11H5.25C4.00736 11 3 9.99264 3 8.75V5.25C3 4.00736 4.00736 3 5.25 3H8.75ZM18.75 3C19.9926 3 21 4.00736 21 5.25V8.75C21 9.99264 19.9926 11 18.75 11H15.25C14.0074 11 13 9.99264 13 8.75V5.25C13 4.00736 14.0074 3 15.25 3H18.75Z" />
                    </svg>
                    <span class="ms-3 font-medium">Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('member.fee') }}" 
                   class="flex items-center p-2 rounded-lg text-white group transition-all duration-200 ease-in-out
                          {{ request()->routeIs('member.fee') ? 'bg-yellow-500 text-gray-900' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('member.fee') ? 'text-gray-900' : 'text-gray-400 group-hover:text-yellow-500' }} transition duration-75" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4ZM12 6C11.4477 6 11 6.44772 11 7V7.5C9.17 8.15 7.85 9.93 8.2 12.14C8.5 14 10.07 15.27 11.89 15.5L12 15.5V17C12 17.5523 12.4477 18 13 18C13.5523 18 14 17.5523 14 17V15.5C15.94 14.87 17.25 13.22 17.02 11.07C16.8 9.06 15.11 7.7 13.2 7.53V7C13.2 6.44772 12.7523 6 12.2 6H12ZM11 13.5C10.17 13.3 9.6 12.73 9.52 12C9.42 11.14 9.97 10.3 11 10.06V13.5ZM13 13.94V10.5C14.13 10.67 14.7 11.38 14.79 12.11C14.89 12.93 14.16 13.69 13 13.94Z" fill="currentColor"/>
                    </svg>
                    <span class="ms-3 font-medium">Fee</span>
                </a>
            </li>

            <li>
                <a href="{{ route('member.event.list') }}" 
                   class="flex items-center p-2 rounded-lg text-white group transition-all duration-200 ease-in-out
                          {{ request()->routeIs('member.event.*') ? 'bg-yellow-500 text-gray-900' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('member.event.*') ? 'text-gray-900' : 'text-gray-400 group-hover:text-yellow-500' }} transition duration-75" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17 3C17.5523 3 18 3.44772 18 4V5H19C20.6569 5 22 6.34315 22 8V18C22 19.6569 20.6569 21 19 21H5C3.34315 21 2 19.6569 2 18V8C2 6.34315 3.34315 5 5 5H6V4C6 3.44772 6.44772 3 7 3C7.55228 3 8 3.44772 8 4V5H16V4C16 3.44772 16.4477 3 17 3ZM20 10H4V18C4 18.5523 4.44772 19 5 19H19C19.5523 19 20 18.5523 20 18V10ZM7 13C7 12.4477 7.44772 12 8 12H16C16.5523 12 17 12.4477 17 13C17 13.5523 16.5523 14 16 14H8C7.44772 14 7 13.5523 7 13ZM9 16C9 15.4477 9.44772 15 10 15H14C14.5523 15 15 15.4477 15 16C15 16.5523 14.5523 17 14 17H10C9.44772 17 9 16.5523 9 16Z" fill="currentColor"/>
                    </svg>
                    <span class="ms-3 font-medium">Event</span>
                </a>
            </li>

            <li>
                <a href="{{ route('member.attendance') }}" 
                   class="flex items-center p-2 rounded-lg text-white group transition-all duration-200 ease-in-out
                          {{ request()->routeIs('member.attendance') ? 'bg-yellow-500 text-gray-900' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('member.attendance') ? 'text-gray-900' : 'text-gray-400 group-hover:text-yellow-500' }} transition duration-75" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12.5 7H11V13L16.2 16.2L17 14.9L12.5 12.2V7Z" />
                    </svg>
                    <span class="ms-3 font-medium">Attendance</span>
                </a>
            </li>

            <li>
                <a href="{{ route('member.achievement') }}" 
                   class="flex items-center p-2 rounded-lg text-white group transition-all duration-200 ease-in-out
                          {{ request()->routeIs('member.achievement') ? 'bg-yellow-500 text-gray-900' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('member.achievement') ? 'text-gray-900' : 'text-gray-400 group-hover:text-yellow-500' }} transition duration-75" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.33996 3.19678H8.91468H15.0853H16.6601H20.5791L20.2403 5.1314C19.8766 7.20895 18.2792 8.79445 16.2783 9.1934C15.7813 10.3354 14.8361 11.2374 13.6642 11.6763C13.6142 12.2963 13.1594 12.8017 12.5643 12.9283V15.5868C13.1799 15.7198 13.6442 16.2585 13.6636 16.9093H15.3479C15.6493 16.9093 15.8937 17.1537 15.8937 17.4552V20.803H8.10632V17.8387C8.10632 17.3255 8.52243 16.9094 9.03571 16.9094H10.3364C10.3558 16.2586 10.8201 15.7198 11.4357 15.5868V12.9263C10.8463 12.7968 10.3964 12.2953 10.3452 11.6801C9.16888 11.2425 8.22004 10.3386 7.72171 9.19345C5.72076 8.7945 4.1234 7.20904 3.75965 5.13145L3.42088 3.19682L7.33996 3.19678Z" />
                    </svg>
                    <span class="ms-3 font-medium">Achievement</span>
                </a>
            </li>

            <li>
                <a href="{{ route('member.setting') }}" 
                   class="flex items-center p-2 rounded-lg text-white group transition-all duration-200 ease-in-out
                          {{ request()->routeIs('member.setting*') ? 'bg-yellow-500 text-gray-900' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('member.setting*') ? 'text-gray-900' : 'text-gray-400 group-hover:text-yellow-500' }} transition duration-75" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0175 2.00681C10.8617 2 10.6901 2 10.3469 2H9.65309C9.30994 2 9.13836 2 8.98252 2.00681C8.22263 2.04452 7.61693 2.56877 7.43889 3.30358C7.32765 3.77402 7.29601 4.51891 6.70759 4.93846C6.11917 5.358 5.41286 5.13633 4.97361 4.9537C4.31965 4.67376 3.56752 4.86431 3.09648 5.43943L2.64211 5.99159C2.17106 6.56672 2.15795 7.35362 2.61006 7.94296C2.89632 8.33295 3.27688 8.98032 3.01702 9.6149C2.75716 10.2495 2.02409 10.4469 1.53739 10.5841C0.85916 10.7767 0.387756 11.3499 0.350595 12.0152C0.343927 12.1729 0.343927 12.3604 0.343927 12.7354V13.2646C0.343927 13.6396 0.343927 13.8271 0.350595 13.9848C0.387756 14.6501 0.85916 15.2233 1.53739 15.4159C2.02409 15.5531 2.75716 15.7505 3.01702 16.3851C3.27688 17.0197 2.89632 17.667 2.61006 18.057C2.15795 18.6464 2.17106 19.4333 2.64211 20.0084L3.09648 20.5606C3.56752 21.1357 4.31965 21.3262 4.97361 21.0463C5.41286 20.8637 6.11917 20.642 6.70759 21.0615C7.29601 21.4811 7.32765 22.226 7.43889 22.6964C7.61693 23.4312 8.22263 23.9555 8.98252 23.9932C9.13836 24 9.30994 24 9.65309 24H10.3469C10.6901 24 10.8617 24 11.0175 23.9932C11.7774 23.9555 12.3831 23.4312 12.5611 22.6964C12.6724 22.226 12.704 21.4811 13.2924 21.0615C13.8808 20.642 14.5871 20.8637 15.0264 21.0463C15.6804 21.3262 16.4325 21.1357 16.9035 20.5606L17.3579 20.0084C17.8289 19.4333 17.8421 18.6464 17.3899 18.057C17.1037 17.667 16.7231 17.0197 16.983 16.3851C17.2428 15.7505 17.9759 15.5531 18.4626 15.4159C19.1408 15.2233 19.6122 14.6501 19.6494 13.9848C19.6561 13.8271 19.6561 13.6396 19.6561 13.2646V12.7354C19.6561 12.3604 19.6561 12.1729 19.6494 12.0152C19.6122 11.3499 19.1408 10.7767 18.4626 10.5841C17.9759 10.4469 17.2428 10.2495 16.983 9.6149C16.7231 8.98032 17.1037 8.33295 17.3899 7.94296C17.8421 7.35362 17.8289 6.56672 17.3579 5.99159L16.9035 5.43943C16.4325 4.86431 15.6804 4.67376 15.0264 4.9537C14.5871 5.13633 13.8808 5.358 13.2924 4.93846C12.704 4.51891 12.6724 3.77402 12.5611 3.30358C12.3831 2.56877 11.7774 2.04452 11.0175 2.00681ZM10 15.0002C11.6569 15.0002 13 13.657 13 12.0002C13 10.3433 11.6569 9.00018 10 9.00018C8.34315 9.00018 7 10.3433 7 12.0002C7 13.657 8.34315 15.0002 10 15.0002Z" fill="currentColor"/>
                    </svg>
                    <span class="ms-3 font-medium">Setting</span>
                </a>
            </li>
        </ul>

        <!-- Bottom Section - Version Info -->
        <div class="absolute bottom-0 left-0 right-0 p-4">
            <div class="px-3 py-2 rounded-lg bg-gray-900/50">
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-400">Version 1.0.0</span>
                    <span class="text-xs text-yellow-500">ABMK 2025</span>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Overlay for Mobile -->
<div id="sidebar-overlay" class="fixed inset-0 z-30 hidden bg-gray-900/70 backdrop-blur-sm sm:hidden transition-opacity duration-300"></div>

<!-- Toggle Button -->
<button id="sidebar-toggle" class="fixed z-50 p-2 text-white bg-gray-900 rounded-lg shadow-lg top-4 left-4 sm:hidden hover:bg-gray-800 transition-colors duration-200">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
    </svg>
</button>

<!-- JavaScript -->
<script>
    const sidebar = document.getElementById('logo-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const toggleButton = document.getElementById('sidebar-toggle');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }

    toggleButton.addEventListener('click', toggleSidebar);
    overlay.addEventListener('click', toggleSidebar);

    // Close sidebar on window resize if screen becomes larger
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 640) { // sm breakpoint
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });

    // Highlight current page
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const links = document.querySelectorAll('#logo-sidebar a');
        
        links.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('bg-yellow-500', 'text-gray-900');
                link.classList.remove('hover:bg-gray-800');
                const icon = link.querySelector('svg');
                if (icon) {
                    icon.classList.remove('text-gray-400', 'group-hover:text-yellow-500');
                    icon.classList.add('text-gray-900');
                }
            }
        });
    });
</script>