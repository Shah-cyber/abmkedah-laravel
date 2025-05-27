<x-non-member-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-yellow-50 to-white">
        <div class="container mx-auto py-12 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">ABM <span class="text-yellow-500">Blog</span></h1>
                <p class="text-lg text-gray-600 mb-8">Latest news, updates, and insights from ABM Kedah</p>
                
                <!-- Search Bar -->
                <div class="relative max-w-2xl mx-auto">
                    <input type="text" placeholder="Search articles..." 
                        class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto py-16 px-6">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Blog Posts -->
            <div class="lg:w-2/3">
                <!-- Featured Post -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden mb-12 hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                            alt="Leadership Conference" class="w-full h-80 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-yellow-500 text-white text-sm font-medium rounded-full">Featured</span>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                August 15, 2024
                            </span>
                            <span class="mx-3">|</span>
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Admin
                            </span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Annual Leadership Conference Highlights and Key Takeaways</h2>
                        <p class="text-gray-600 mb-6">
                            This year's leadership conference brought together thought leaders, industry experts, and aspiring leaders from across Malaysia. The three-day event featured keynote speeches, interactive workshops, and networking opportunities designed to inspire and equip the next generation of leaders.
                        </p>
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Blog Post Grid -->
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Blog Post 1 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="https://images.pexels.com/photos/3182755/pexels-photo-3182755.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                            alt="Community Service" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Community</span>
                                <span class="text-xs text-gray-500">July 28, 2024</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">ABM Volunteers Lead Beach Cleanup Initiative</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                Over 100 ABM members participated in a beach cleanup event at Pantai Cenang, collecting over 500kg of trash and raising awareness about marine pollution.
                            </p>
                            <a href="#" class="text-yellow-600 hover:text-yellow-700 font-medium inline-flex items-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Blog Post 2 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="https://images.pexels.com/photos/6457579/pexels-photo-6457579.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                            alt="Workshop Session" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Education</span>
                                <span class="text-xs text-gray-500">July 15, 2024</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">New Workshop Series: Public Speaking for Leaders</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                ABM is launching a new workshop series focused on developing essential public speaking skills for emerging leaders. The six-week program will feature expert coaches and practical exercises.
                            </p>
                            <a href="#" class="text-yellow-600 hover:text-yellow-700 font-medium inline-flex items-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Blog Post 3 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="https://images.pexels.com/photos/1181622/pexels-photo-1181622.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                            alt="Tech Partnership" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Technology</span>
                                <span class="text-xs text-gray-500">July 3, 2024</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">ABM Partners with Tech Giants for Digital Skills Training</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                ABM has formed partnerships with several tech companies to offer free digital skills training to members, covering topics from basic computer literacy to advanced programming.
                            </p>
                            <a href="#" class="text-yellow-600 hover:text-yellow-700 font-medium inline-flex items-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Blog Post 4 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="https://images.pexels.com/photos/5292195/pexels-photo-5292195.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                            alt="Youth Program" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Youth</span>
                                <span class="text-xs text-gray-500">June 20, 2024</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Youth Leadership Program Celebrates Five Years of Success</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                ABM's Youth Leadership Program is celebrating its fifth anniversary with a special event highlighting success stories from past participants and announcing expanded initiatives.
                            </p>
                            <a href="#" class="text-yellow-600 hover:text-yellow-700 font-medium inline-flex items-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
                        <a href="#" class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                            Previous
                        </a>
                        <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 border border-yellow-500">
                            1
                        </a>
                        <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                            2
                        </a>
                        <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                            3
                        </a>
                        <span class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300">
                            ...
                        </span>
                        <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                            8
                        </a>
                        <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                            Next
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <!-- Categories -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-yellow-50 transition-colors">
                                <span class="text-gray-700">Leadership</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">24</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-yellow-50 transition-colors">
                                <span class="text-gray-700">Community</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">18</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-yellow-50 transition-colors">
                                <span class="text-gray-700">Education</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-yellow-50 transition-colors">
                                <span class="text-gray-700">Technology</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-yellow-50 transition-colors">
                                <span class="text-gray-700">Youth</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">9</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-yellow-50 transition-colors">
                                <span class="text-gray-700">Events</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">7</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Recent Posts -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Posts</h3>
                    <div class="space-y-4">
                        <a href="#" class="flex gap-3 items-start group">
                            <img src="https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                                alt="Leadership Conference" class="w-16 h-16 rounded-lg object-cover">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-yellow-600 transition-colors">Annual Leadership Conference Highlights</h4>
                                <p class="text-xs text-gray-500 mt-1">August 15, 2024</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex gap-3 items-start group">
                            <img src="https://images.pexels.com/photos/3182755/pexels-photo-3182755.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                                alt="Beach Cleanup" class="w-16 h-16 rounded-lg object-cover">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-yellow-600 transition-colors">ABM Volunteers Lead Beach Cleanup Initiative</h4>
                                <p class="text-xs text-gray-500 mt-1">July 28, 2024</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex gap-3 items-start group">
                            <img src="https://images.pexels.com/photos/6457579/pexels-photo-6457579.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                                alt="Workshop Session" class="w-16 h-16 rounded-lg object-cover">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-yellow-600 transition-colors">New Workshop Series: Public Speaking for Leaders</h4>
                                <p class="text-xs text-gray-500 mt-1">July 15, 2024</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex gap-3 items-start group">
                            <img src="https://images.pexels.com/photos/1181622/pexels-photo-1181622.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                                alt="Tech Partnership" class="w-16 h-16 rounded-lg object-cover">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-yellow-600 transition-colors">ABM Partners with Tech Giants for Digital Skills Training</h4>
                                <p class="text-xs text-gray-500 mt-1">July 3, 2024</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex gap-3 items-start group">
                            <img src="https://images.pexels.com/photos/5292195/pexels-photo-5292195.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                                alt="Youth Program" class="w-16 h-16 rounded-lg object-cover">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-yellow-600 transition-colors">Youth Leadership Program Celebrates Five Years of Success</h4>
                                <p class="text-xs text-gray-500 mt-1">June 20, 2024</p>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- Newsletter Signup -->
                <div class="bg-yellow-50 rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Subscribe to Our Newsletter</h3>
                    <p class="text-gray-600 text-sm mb-4">Stay updated with the latest news and updates from ABM Kedah.</p>
                    <form class="space-y-3">
                        <div>
                            <input type="email" placeholder="Your email address" 
                                class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200">
                        </div>
                        <button type="submit" class="w-full py-3 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-non-member-layout>