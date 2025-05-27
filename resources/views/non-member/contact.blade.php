<x-non-member-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-yellow-50 to-white">
        <div class="container mx-auto py-12 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Get in <span class="text-yellow-500">Touch</span></h1>
                <p class="text-lg text-gray-600 mb-4">We'd love to hear from you. Here's how you can reach us.</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto py-16 px-6">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Contact Form -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h2>
                    
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" id="name" name="name" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" placeholder="Your name">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" placeholder="Your email">
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" placeholder="How can we help you?">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" placeholder="Your message..."></textarea>
                        </div>
                        
                        <div class="flex items-center">
                            <input id="consent" name="consent" type="checkbox" class="h-4 w-4 text-yellow-500 focus:ring-yellow-500 border-gray-300 rounded">
                            <label for="consent" class="ml-2 block text-sm text-gray-700">
                                I agree to the <a href="#" class="text-yellow-600 hover:text-yellow-700">Privacy Policy</a> and consent to being contacted.
                            </label>
                        </div>
                        
                        <div>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                                Send Message
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="lg:w-1/3 space-y-8">
                <!-- Info Cards -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Phone</h3>
                            <p class="text-gray-600 mb-2">Our customer service team is ready to assist you</p>
                            <a href="tel:+601234567890" class="text-yellow-600 hover:text-yellow-700 font-medium">+60 123-456-7890</a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600 mb-2">Send us an email and we'll get back to you</p>
                            <a href="mailto:info@abmkedah.org" class="text-yellow-600 hover:text-yellow-700 font-medium">info@abmkedah.org</a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Address</h3>
                            <p class="text-gray-600 mb-2">Visit our office headquarters</p>
                            <address class="not-italic text-yellow-600">
                                123 Jalan Kedah, <br>
                                Alor Setar, Kedah, <br>
                                05000, Malaysia
                            </address>
                        </div>
                    </div>
                </div>
                
                <!-- Office Hours -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Office Hours
                    </h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-medium">9:00 AM - 5:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Saturday</span>
                            <span class="font-medium">9:00 AM - 1:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Sunday</span>
                            <span class="font-medium">Closed</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Map Section -->
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Find <span class="text-yellow-500">Us</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We're conveniently located in the heart of Alor Setar. Come visit us!</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <!-- Replace with actual map embed -->
                <div class="relative w-full h-96 bg-gray-200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63518.39138670282!2d100.29959859999999!3d6.1305287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304b43f04c9d52e1%3A0xd7554ae14a289e03!2sAlor%20Setar%2C%20Kedah!5e0!3m2!1sen!2smy!4v1649331319590!5m2!1sen!2smy" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="container mx-auto py-16 px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked <span class="text-yellow-500">Questions</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Find answers to the most common questions about ABM Kedah.</p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-md overflow-hidden divide-y divide-gray-100">
                <!-- FAQ Item 1 -->
                <div class="p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <span class="text-lg font-semibold text-gray-800">How can I become a member of ABM Kedah?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">
                            To become a member, you need to fill out our online application form, pay the membership fee, and attend an orientation session. Once your application is approved, you'll receive your membership card and welcome kit.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <span class="text-lg font-semibold text-gray-800">What benefits do members receive?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">
                            Members receive access to exclusive events, workshops, and networking opportunities. You'll also get discounts on our paid programs, mentorship opportunities, and the chance to participate in leadership development initiatives.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <span class="text-lg font-semibold text-gray-800">How can organizations partner with ABM Kedah?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">
                            We're always open to partnerships with organizations that share our vision for leadership development. Contact our partnerships team at partnerships@abmkedah.org to discuss collaboration opportunities.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <span class="text-lg font-semibold text-gray-800">Are there volunteer opportunities available?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">
                            Yes! We have numerous volunteer opportunities throughout the year. From event organization to mentoring, there are many ways to contribute. Check our volunteer page or contact our volunteer coordinator at volunteer@abmkedah.org.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Call to Action -->
    <div class="bg-yellow-50 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to <span class="text-yellow-500">Connect</span>?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">Reach out today and become part of our community of future leaders.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a onclick="openRegistrationForm()" class="px-6 py-3 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition-colors">
                    Join Us
                </a>
                <a href="#" class="px-6 py-3 bg-white text-yellow-600 font-medium border border-yellow-500 rounded-lg hover:bg-yellow-50 transition-colors">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</x-non-member-layout>