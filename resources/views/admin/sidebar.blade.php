<!-- Sidebar Toggle Button for Mobile -->
<button
    id="sidebarToggle"
    class="fixed top-4 left-4 z-50 p-2 text-white bg-gray-950 rounded-lg sm:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
    </svg>
</button>
<!-- admin sidebar -->
<aside
    id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-950">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-950">
            <a href="#" class="flex items-center ps-2.5 mb-10 mt-5">
                <img src="{{asset('images/abm-logo.svg') }}" class="h-6 me-3 sm:h-7" alt="ABM Kedah Logo" />
                <span class="self-center text-white text-sm font-semibold">Angkatan Belia MFLS<br>Negeri Kedah</span>
            </a>
            <ul class="space-y-2 font-medium">
                <!-- DASHBOARD -->
                <li>
                    <a href="/admin/dashboard" class="flex group hover:bg-gray-700 items-center p-2 rounded-lg text-white">
                        <svg class="w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <g id="member-dashboard">
                                <path id="Vector" d="M8.75 13C9.99264 13 11 14.0074 11 15.25V18.75C11 19.9926 9.99264 21 8.75 21H5.25C4.00736 21 3 19.9926 3 18.75V15.25C3 14.0074 4.00736 13 5.25 13H8.75ZM18.75 13C19.9926 13 21 14.0074 21 15.25V18.75C21 19.9926 19.9926 21 18.75 21H15.25C14.0074 21 13 19.9926 13 18.75V15.25C13 14.0074 14.0074 13 15.25 13H18.75ZM8.75 3C9.99264 3 11 4.00736 11 5.25V8.75C11 9.99264 9.99264 11 8.75 11H5.25C4.00736 11 3 9.99264 3 8.75V5.25C3 4.00736 4.00736 3 5.25 3H8.75ZM18.75 3C19.9926 3 21 4.00736 21 5.25V8.75C21 9.99264 19.9926 11 18.75 11H15.25C14.0074 11 13 9.99264 13 8.75V5.25C13 4.00736 14.0074 3 15.25 3H18.75Z" fill="white" />
                            </g>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <!-- MEMBER -->
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base font-medium text-white transition duration-75 rounded-lg group hover:bg-gray-700" data-collapse-toggle="dropdown-menu-member">
                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M10 2.00035C9.54037 2.00035 9.08525 2.09088 8.66061 2.26677C8.23597 2.44267 7.85013 2.70047 7.52513 3.02548C7.20012 3.35048 6.94231 3.73632 6.76642 4.16096C6.59053 4.5856 6.5 5.04073 6.5 5.50035C6.5 5.95998 6.59053 6.4151 6.76642 6.83974C6.94231 7.26438 7.20012 7.65022 7.52513 7.97523C7.85013 8.30023 8.23597 8.55804 8.66061 8.73393C9.08525 8.90982 9.54037 9.00035 10 9.00035C10.9283 9.00035 11.8185 8.6316 12.4749 7.97523C13.1313 7.31885 13.5 6.42861 13.5 5.50035C13.5 4.57209 13.1313 3.68186 12.4749 3.02548C11.8185 2.3691 10.9283 2.00035 10 2.00035ZM8.5 10.0004C7.43913 10.0004 6.42172 10.4218 5.67157 11.1719C4.92143 11.9221 4.5 12.9395 4.5 14.0004C4.5 14.5308 4.71071 15.0395 5.08579 15.4146C5.46086 15.7896 5.96957 16.0004 6.5 16.0004H13.5C14.0304 16.0004 14.5391 15.7896 14.9142 15.4146C15.2893 15.0395 15.5 14.5308 15.5 14.0004C15.5 12.9395 15.0786 11.9221 14.3284 11.1719C13.5783 10.4218 12.5609 10.0004 11.5 10.0004H8.5ZM15.32 6.90435C15.6379 5.69369 15.5341 4.41087 15.0257 3.26706C14.5174 2.12325 13.6347 1.18662 12.523 0.611352C12.9466 0.321869 13.4287 0.129063 13.9351 0.0465883C14.4415 -0.0358866 14.9599 -0.00601351 15.4535 0.134093C15.947 0.274199 16.4038 0.521111 16.7913 0.857344C17.1789 1.19358 17.4878 1.61091 17.6961 2.07978C17.9045 2.54865 18.0072 3.0576 17.997 3.57058C17.9868 4.08356 17.864 4.58803 17.6372 5.04826C17.4104 5.50849 17.0851 5.91322 16.6845 6.2338C16.2839 6.55438 15.8178 6.78296 15.319 6.90335L15.32 6.90435ZM17.5 14.0004H18C18.5304 14.0004 19.0391 13.7896 19.4142 13.4146C19.7893 13.0395 20 12.5308 20 12.0004C20 10.9395 19.5786 9.92207 18.8284 9.17192C18.0783 8.42178 17.0609 8.00035 16 8.00035H14.9C14.764 8.26673 14.6064 8.52157 14.429 8.76235C15.3606 9.28322 16.1364 10.0433 16.6763 10.964C17.2161 11.8848 17.5005 12.933 17.5 14.0004ZM2 3.50035C1.99985 2.86314 2.17366 2.23798 2.50268 1.69228C2.8317 1.14659 3.30346 0.701076 3.86707 0.403784C4.43068 0.106492 5.06476 -0.0312946 5.70092 0.00528418C6.33708 0.041863 6.95118 0.251419 7.477 0.611352C6.36425 1.18538 5.48066 2.1219 4.97227 3.26613C4.46389 4.41036 4.36114 5.69381 4.681 6.90435C3.91688 6.72026 3.23694 6.2844 2.75062 5.66694C2.26431 5.04948 1.99991 4.28633 2 3.50035ZM5.1 8.00035H4C2.93913 8.00035 1.92172 8.42178 1.17157 9.17192C0.421427 9.92207 0 10.9395 0 12.0004C0 12.5308 0.210714 13.0395 0.585786 13.4146C0.960859 13.7896 1.46957 14.0004 2 14.0004H2.5C2.49952 12.933 2.78388 11.8848 3.32373 10.964C3.86358 10.0433 4.63935 9.28322 5.571 8.76235C5.39356 8.52157 5.23604 8.26673 5.1 8.00035Z" fill="white" />
                        </svg>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Member</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <ul id="dropdown-menu-member" class="hidden py-4 space-y-4 ml-10">
                        <li>
                            <a href="/admin/member-record" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Record
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.member.verification.list') }}" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Verification
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- FEE -->
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base font-medium text-white transition duration-75 rounded-lg group hover:bg-gray-700" data-collapse-toggle="dropdown-menu-fee">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="member-fee">
                                <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M12.052 1.25H11.948C11.0495 1.24997 10.3003 1.24995 9.70552 1.32991C9.07773 1.41432 8.51093 1.59999 8.05546 2.05546C7.59999 2.51093 7.41432 3.07773 7.32991 3.70552C7.27259 4.13189 7.25637 5.15147 7.25179 6.02566C5.22954 6.09171 4.01536 6.32778 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 17.7712 2 19.6569 3.17157 20.8284C4.34314 22 6.22876 22 9.99998 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14C22 10.2288 22 8.34315 20.8284 7.17157C19.9846 6.32778 18.7705 6.09171 16.7482 6.02566C16.7436 5.15147 16.7274 4.13189 16.6701 3.70552C16.5857 3.07773 16.4 2.51093 15.9445 2.05546C15.4891 1.59999 14.9223 1.41432 14.2945 1.32991C13.6997 1.24995 12.9505 1.24997 12.052 1.25ZM15.2479 6.00188C15.2434 5.15523 15.229 4.24407 15.1835 3.9054C15.1214 3.44393 15.0142 3.24644 14.8839 3.11612C14.7536 2.9858 14.5561 2.87858 14.0946 2.81654C13.6116 2.7516 12.964 2.75 12 2.75C11.036 2.75 10.3884 2.7516 9.90539 2.81654C9.44393 2.87858 9.24644 2.9858 9.11612 3.11612C8.9858 3.24644 8.87858 3.44393 8.81654 3.9054C8.771 4.24407 8.75661 5.15523 8.75208 6.00188C9.1435 6 9.55885 6 10 6H14C14.4412 6 14.8565 6 15.2479 6.00188ZM12 9.25C12.4142 9.25 12.75 9.58579 12.75 10V10.0102C13.8388 10.2845 14.75 11.143 14.75 12.3333C14.75 12.7475 14.4142 13.0833 14 13.0833C13.5858 13.0833 13.25 12.7475 13.25 12.3333C13.25 11.9493 12.8242 11.4167 12 11.4167C11.1758 11.4167 10.75 11.9493 10.75 12.3333C10.75 12.7174 11.1758 13.25 12 13.25C13.3849 13.25 14.75 14.2098 14.75 15.6667C14.75 16.857 13.8388 17.7155 12.75 17.9898V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.9898C10.1612 17.7155 9.25 16.857 9.25 15.6667C9.25 15.2525 9.58579 14.9167 10 14.9167C10.4142 14.9167 10.75 15.2525 10.75 15.6667C10.75 16.0507 11.1758 16.5833 12 16.5833C12.8242 16.5833 13.25 16.0507 13.25 15.6667C13.25 15.2826 12.8242 14.75 12 14.75C10.6151 14.75 9.25 13.7903 9.25 12.3333C9.25 11.143 10.1612 10.2845 11.25 10.0102V10C11.25 9.58579 11.5858 9.25 12 9.25Z" fill="white" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Fee</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <ul id="dropdown-menu-fee" class="hidden py-4 space-y-4 ml-10">
                        <li>
                            <a href="/admin/fee-payment" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Payment
                            </a>
                        </li>
                        <li>
                            <a href="/admin/fee-collection" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Collection
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- EVENT -->
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base font-medium text-white transition duration-75 rounded-lg group hover:bg-gray-700" data-collapse-toggle="dropdown-menu-event">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="member-event">
                                <path id="Vector" d="M6.25 3C4.45507 3 3 4.45507 3 6.25V17.75C3 19.5449 4.45507 21 6.25 21H17.75C19.5449 21 21 19.5449 21 17.75V6.25C21 4.45507 19.5449 3 17.75 3H6.25ZM4.5 8H19.5V17.75C19.5 18.7165 18.7165 19.5 17.75 19.5H6.25C5.2835 19.5 4.5 18.7165 4.5 17.75V8ZM6 10.35C6 9.88056 6.38056 9.5 6.85 9.5H10.15C10.6194 9.5 11 9.88056 11 10.35V17.15C11 17.6194 10.6194 18 10.15 18H6.85C6.38056 18 6 17.6194 6 17.15V10.35ZM7.5 11V16.5H9.5V11H7.5ZM12.75 9.5H17.25C17.6642 9.5 18 9.83579 18 10.25C18 10.6642 17.6642 11 17.25 11H12.75C12.3358 11 12 10.6642 12 10.25C12 9.83579 12.3358 9.5 12.75 9.5ZM12 13.25C12 12.8358 12.3358 12.5 12.75 12.5H16.25C16.6642 12.5 17 12.8358 17 13.25C17 13.6642 16.6642 14 16.25 14H12.75C12.3358 14 12 13.6642 12 13.25Z" fill="white" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Event</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <ul id="dropdown-menu-event" class="hidden py-4 space-y-4 ml-10">
                        <li>
                            <a href="/admin/event-record" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Record
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('event.volunteer') }}" 
                               class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Volunteer
                            </a>
                        </li>
                        
                        
                    </ul>
                </li>
                <!-- ACHIEVEMENT -->
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base font-medium text-white transition duration-75 rounded-lg group hover:bg-gray-700" data-collapse-toggle="dropdown-menu-achievement">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="member-achievement">
                                <path id="Vector" d="M7.33996 3.19678H8.91468H15.0853H16.6601H20.5791L20.2403 5.1314C19.8766 7.20895 18.2792 8.79445 16.2783 9.1934C15.7813 10.3354 14.8361 11.2374 13.6642 11.6763C13.6142 12.2963 13.1594 12.8017 12.5643 12.9283V15.5868C13.1799 15.7198 13.6442 16.2585 13.6636 16.9093H15.3479C15.6493 16.9093 15.8937 17.1537 15.8937 17.4552V20.803H8.10632V17.8387C8.10632 17.3255 8.52243 16.9094 9.03571 16.9094H10.3364C10.3558 16.2586 10.8201 15.7198 11.4357 15.5868V12.9263C10.8463 12.7968 10.3964 12.2953 10.3452 11.6801C9.16888 11.2425 8.22004 10.3386 7.72171 9.19345C5.72076 8.7945 4.1234 7.20904 3.75965 5.13145L3.42088 3.19682L7.33996 3.19678ZM10.2359 19.3064C10.2359 19.495 10.3887 19.6478 10.5772 19.6478H13.4227C13.6112 19.6478 13.7641 19.495 13.7641 19.3064V18.3421C13.7641 18.1537 13.6112 18.0007 13.4227 18.0007H10.5772C10.3887 18.0007 10.2359 18.1537 10.2359 18.3421V19.3064ZM19.4092 4.9859L19.5747 4.04053H16.6601V7.3552C16.6601 7.6604 16.6302 7.95862 16.5736 8.24723C18.0188 7.78246 19.1351 6.55186 19.4092 4.9859ZM9.99116 6.34664L10.7114 7.04868C10.7721 7.10793 10.7999 7.19329 10.7856 7.27701L10.6155 8.26828C10.5794 8.47898 10.8005 8.63962 10.9897 8.54015L11.8799 8.07211C11.9551 8.03264 12.0449 8.03264 12.12 8.07211L13.0102 8.54015C13.1994 8.63962 13.4206 8.47893 13.3844 8.26828L13.2144 7.27701C13.2 7.19334 13.2278 7.10798 13.2886 7.04868L14.0088 6.34664C14.1619 6.19743 14.0774 5.93746 13.8659 5.90671L12.8706 5.76211C12.7866 5.74992 12.7139 5.69714 12.6763 5.62101L12.2312 4.71909C12.1366 4.52742 11.8632 4.52742 11.7687 4.71909L11.3235 5.62101C11.2859 5.69714 11.2133 5.74992 11.1293 5.76211L10.134 5.90671C9.92254 5.93746 9.83807 6.19743 9.99116 6.34664ZM4.59079 4.9859C4.86496 6.55186 5.98115 7.78251 7.4264 8.24728C7.36982 7.95862 7.33996 7.6604 7.33996 7.3552V4.04053H4.42527L4.59079 4.9859Z" fill="white" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Achievement</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <ul id="dropdown-menu-achievement" class="hidden py-4 space-y-4 ml-10">
                        <li>
                            <a href="/admin/achievement-merit" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Merit
                            </a>
                        </li>
                        <li>
                            <a href="/admin/achievement-certificate" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Certification
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- SETTING -->
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base font-medium text-white transition duration-75 rounded-lg group hover:bg-gray-700" data-collapse-toggle="dropdown-menu-setting">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="member-setting">
                                <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M17 10V11.126C17.367 11.221 17.714 11.366 18.032 11.554L18.828 10.757L20.243 12.172L19.446 12.968C19.634 13.286 19.779 13.633 19.874 14H21V16H19.874C19.779 16.367 19.634 16.714 19.446 17.032L20.243 17.828L18.828 19.243L18.032 18.446C17.7098 18.6365 17.3624 18.7806 17 18.874V20H15V18.874C14.6376 18.7806 14.2901 18.6365 13.968 18.446L13.172 19.243L11.757 17.828L12.554 17.032C12.3635 16.7099 12.2194 16.3624 12.126 16H11V14H12.126C12.221 13.633 12.366 13.286 12.554 12.968L11.757 12.172L13.172 10.757L13.968 11.554C14.2901 11.3635 14.6376 11.2194 15 11.126V10H17ZM17.406 13.578L17.422 13.594C17.776 13.952 17.996 14.444 18 14.986V15.014C17.9974 15.4078 17.8785 15.792 17.6584 16.1186C17.4383 16.4451 17.1267 16.6994 16.7626 16.8496C16.3986 16.9997 15.9983 17.039 15.612 16.9626C15.2256 16.8862 14.8705 16.6974 14.591 16.42L14.581 16.408C14.2164 16.0311 14.0145 15.526 14.0186 15.0016C14.0228 14.4772 14.2328 13.9754 14.6034 13.6043C14.9739 13.2332 15.4754 13.0226 15.9998 13.0176C16.5242 13.0127 17.0285 13.2139 17.406 13.578ZM5 8C5.0002 7.44509 5.11586 6.89629 5.33962 6.3885C5.56339 5.88071 5.89036 5.42502 6.29975 5.05042C6.70914 4.67582 7.19199 4.3905 7.71761 4.2126C8.24323 4.0347 8.80012 3.96811 9.35286 4.01706C9.90561 4.06601 10.4421 4.22944 10.9283 4.49694C11.4145 4.76445 11.8397 5.13019 12.1769 5.57091C12.514 6.01162 12.7558 6.51768 12.8869 7.05689C13.0179 7.59611 13.0353 8.15669 12.938 8.703C11.5291 9.39042 10.3904 10.5291 9.703 11.938C9.12727 12.0408 8.536 12.0161 7.97085 11.8656C7.4057 11.7151 6.88042 11.4426 6.43202 11.0671C5.98362 10.6916 5.62301 10.2224 5.37559 9.69249C5.12817 9.16257 4.99996 8.58484 5 8ZM9.29 13H7C5.93913 13 4.92172 13.4214 4.17157 14.1716C3.42143 14.9217 3 15.9391 3 17V18C3 18.5304 3.21071 19.0391 3.58579 19.4142C3.96086 19.7893 4.46957 20 5 20H11.101C10.4349 19.349 9.90578 18.5712 9.54494 17.7124C9.18411 16.8537 8.99882 15.9315 9 15C9 14.305 9.101 13.634 9.29 13Z" fill="white" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Setting</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <ul id="dropdown-menu-setting" class="hidden py-4 space-y-4 ml-10">
                        <li>
                            <a href="/admin/setting/admin" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Admin
                            </a>
                        </li>
                        <li>
                            <a href="/admin/setting/users" class="block p-2 text-base font-bold text-white hover:bg-gray-700 rounded-lg">
                                Users
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
</aside>
<script>
    const sidebar = document.getElementById('logo-sidebar');
    const toggleButton = document.getElementById('sidebarToggle');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('translate-x-0');
    });
</script>