<x-non-member-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-yellow-50 to-white">
        <div class="container mx-auto py-12 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Our <span class="text-yellow-500">Portfolio</span></h1>
                <p class="text-lg text-gray-600 mb-8">Showcasing our projects, initiatives, and achievements</p>
                
                <!-- Filter Categories -->
                <div class="flex flex-wrap justify-center gap-2 mb-8">
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-full text-sm font-medium">All</button>
                    <button class="px-4 py-2 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-full text-sm font-medium transition-colors">Leadership</button>
                    <button class="px-4 py-2 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-full text-sm font-medium transition-colors">Community</button>
                    <button class="px-4 py-2 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-full text-sm font-medium transition-colors">Events</button>
                    <button class="px-4 py-2 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-full text-sm font-medium transition-colors">Workshops</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Grid -->
    <div class="container mx-auto py-16 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Portfolio Item 1 -->
            <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="https://images.pexels.com/photos/3184339/pexels-photo-3184339.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                        alt="Leadership Conference" 
                        class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-6 w-full">
                            <span class="px-3 py-1 bg-yellow-500 text-white text-xs font-medium rounded-full">Leadership</span>
                            <h3 class="text-xl font-bold text-white mt-2">Annual Leadership Conference</h3>
                            <p class="text-gray-200 text-sm mt-1">Empowering future leaders through knowledge sharing and mentorship</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-600 transition-colors">Annual Leadership Conference</h3>
                    <p class="text-gray-600 mt-2 mb-4">Our flagship event bringing together aspiring leaders and industry experts for three days of learning and networking.</p>
                    <a href="#" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-medium">
                        View Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Portfolio Item 2 -->
            <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                        alt="Youth Mentorship Program" 
                        class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-6 w-full">
                            <span class="px-3 py-1 bg-yellow-500 text-white text-xs font-medium rounded-full">Community</span>
                            <h3 class="text-xl font-bold text-white mt-2">Youth Mentorship Program</h3>
                            <p class="text-gray-200 text-sm mt-1">Guiding the next generation through personalized mentorship</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-600 transition-colors">Youth Mentorship Program</h3>
                    <p class="text-gray-600 mt-2 mb-4">A year-long program connecting young people with experienced mentors to develop leadership skills and career guidance.</p>
                    <a href="#" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-medium">
                        View Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Portfolio Item 3 -->
            <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="https://images.pexels.com/photos/3184296/pexels-photo-3184296.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                        alt="Women in Leadership" 
                        class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-6 w-full">
                            <span class="px-3 py-1 bg-yellow-500 text-white text-xs font-medium rounded-full">Workshop</span>
                            <h3 class="text-xl font-bold text-white mt-2">Women in Leadership</h3>
                            <p class="text-gray-200 text-sm mt-1">Empowering women to take on leadership roles across all sectors</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-600 transition-colors">Women in Leadership</h3>
                    <p class="text-gray-600 mt-2 mb-4">A series of workshops and networking events designed to support and promote women in leadership positions.</p>
                    <a href="#" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-medium">
                        View Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Portfolio Item 4 -->
            <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="https://images.pexels.com/photos/6444/pencil-typography-black-design.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                        alt="Educational Outreach" 
                        class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-6 w-full">
                            <span class="px-3 py-1 bg-yellow-500 text-white text-xs font-medium rounded-full">Community</span>
                            <h3 class="text-xl font-bold text-white mt-2">Educational Outreach</h3>
                            <p class="text-gray-200 text-sm mt-1">Bringing educational resources to underserved communities</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-600 transition-colors">Educational Outreach</h3>
                    <p class="text-gray-600 mt-2 mb-4">A community initiative providing books, learning materials, and tutoring services to rural and underserved areas.</p>
                    <a href="#" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-medium">
                        View Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Portfolio Item 5 -->
            <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="https://images.pexels.com/photos/3184338/pexels-photo-3184338.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                        alt="Tech Summit" 
                        class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-6 w-full">
                            <span class="px-3 py-1 bg-yellow-500 text-white text-xs font-medium rounded-full">Events</span>
                            <h3 class="text-xl font-bold text-white mt-2">Innovation & Tech Summit</h3>
                            <p class="text-gray-200 text-sm mt-1">Exploring the intersection of leadership and technology</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-600 transition-colors">Innovation & Tech Summit</h3>
                    <p class="text-gray-600 mt-2 mb-4">An annual gathering focusing on how technology is reshaping leadership and creating new opportunities.</p>
                    <a href="#" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-medium">
                        View Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Portfolio Item 6 -->
            <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="relative overflow-hidden">
                    <img src="https://images.pexels.com/photos/3184423/pexels-photo-3184423.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                        alt="Environmental Initiative" 
                        class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-6 w-full">
                            <span class="px-3 py-1 bg-yellow-500 text-white text-xs font-medium rounded-full">Community</span>
                            <h3 class="text-xl font-bold text-white mt-2">Green Leadership Initiative</h3>
                            <p class="text-gray-200 text-sm mt-1">Developing environmental leaders for a sustainable future</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-600 transition-colors">Green Leadership Initiative</h3>
                    <p class="text-gray-600 mt-2 mb-4">A program combining leadership development with environmental awareness and sustainable practices.</p>
                    <a href="#" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-medium">
                        View Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Load More Button -->
        <div class="mt-12 text-center">
            <button class="px-6 py-3 bg-white border border-yellow-500 text-yellow-600 hover:bg-yellow-50 rounded-lg font-medium transition-colors inline-flex items-center">
                Load More Projects
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Achievements Section -->
    <div class="bg-yellow-50 py-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our <span class="text-yellow-500">Achievements</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We're proud of our impact and the recognition we've received for our commitment to leadership development and community service.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-yellow-500 text-4xl font-bold mb-2">25+</div>
                    <div class="text-gray-800 font-medium">Leadership Programs</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-yellow-500 text-4xl font-bold mb-2">5,000+</div>
                    <div class="text-gray-800 font-medium">Program Participants</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-yellow-500 text-4xl font-bold mb-2">100+</div>
                    <div class="text-gray-800 font-medium">Community Partners</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="text-yellow-500 text-4xl font-bold mb-2">12</div>
                    <div class="text-gray-800 font-medium">National Awards</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Call to Action -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-2xl shadow-xl overflow-hidden">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="md:w-2/3 p-8 md:p-12">
                        <h2 class="text-3xl font-bold text-white mb-4">Want to partner with us?</h2>
                        <p class="text-yellow-50 mb-6">Join us in our mission to develop the next generation of leaders. We're always looking for partners, sponsors, and collaborators.</p>
                        <a href="/contact" class="inline-flex items-center px-6 py-3 bg-white text-yellow-600 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                            Get in Touch
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                    <div class="md:w-1/3 flex justify-center p-8 md:p-0">
                        <img src="{{ asset('images/abm-logo.svg') }}" alt="ABM Logo" class="h-40 w-40 object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-non-member-layout>