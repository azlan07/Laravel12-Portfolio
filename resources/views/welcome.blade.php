<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Azlan - Professional Portfolio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|poppins:400,500,600,700" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <style>
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #4F46E5;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen">
    <!-- Navigation -->
    <header class="fixed w-full top-0 z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-lg shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center">
                        <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">A</span>
                        <span class="text-xl font-semibold text-gray-900 dark:text-white">zlan</span>
                    </a>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="#about" class="nav-link text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 text-sm font-medium">
                        About
                    </a>
                    <a href="#projects" class="nav-link text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 text-sm font-medium">
                        Projects
                    </a>
                    <a href="#contact" class="nav-link text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 text-sm font-medium">
                        Contact
                    </a>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 text-sm font-medium">
                        Login
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Register
                    </a>
                    @endif
                    @endauth
                    @endif
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <section class="relative bg-gradient-to-br from-indigo-500 to-purple-600 text-white py-24 overflow-hidden">
                <div class="absolute inset-0 bg-[url('/img/grid.png')] opacity-10"></div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="text-center lg:text-left" data-aos="fade-right">
                            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                                Hi, I'm <span class="text-yellow-300">Azlan</span> 👋
                                <br>Full Stack Developer
                            </h1>
                            <p class="text-lg md:text-xl text-gray-200 mb-8">
                                Transforming ideas into elegant digital solutions through code and creativity
                            </p>
                            <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                                <a href="#contact"
                                    class="px-6 py-3 bg-white text-indigo-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                                    Get in Touch
                                </a>
                                <a href="#projects"
                                    class="px-6 py-3 border-2 border-white text-white rounded-lg font-medium hover:bg-white/10 transition-colors">
                                    View My Work
                                </a>
                            </div>
                        </div>
                        <div class="hidden lg:block" data-aos="fade-left">
                            <img src="/img/hero-illustration.svg"
                                alt="Developer Illustration"
                                class="w-full max-w-lg mx-auto">
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-gray-50 dark:from-gray-900 to-transparent"></div>
            </section>

            <!-- About Section -->
            <section id="about" class="py-20 bg-gray-50 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4" data-aos="fade-up">
                            About Me
                        </h2>
                        <div class="w-24 h-1 bg-indigo-500 mx-auto rounded-full"></div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div class="space-y-6" data-aos="fade-right">
                            <p class="text-gray-600 dark:text-gray-300 text-lg">
                                Hello! I'm a passionate Full Stack Developer based in Indonesia with a strong focus on creating efficient and scalable web applications.
                            </p>
                            <p class="text-gray-600 dark:text-gray-300">
                                With {{ date('Y') - 2020 }} years of experience in web development, I specialize in building modern applications using Laravel, Vue.js, and other cutting-edge technologies.
                            </p>

                            <div class="grid grid-cols-2 gap-6 mt-8">
                                <div class="space-y-4">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Frontend</h3>
                                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                        <li class="flex items-center">
                                            <i class="fab fa-html5 text-orange-500 mr-2"></i> HTML5
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fab fa-css3-alt text-blue-500 mr-2"></i> CSS3
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fab fa-js text-yellow-500 mr-2"></i> JavaScript
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fab fa-vuejs text-green-500 mr-2"></i> Vue.js
                                        </li>
                                    </ul>
                                </div>
                                <div class="space-y-4">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Backend</h3>
                                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                        <li class="flex items-center">
                                            <i class="fab fa-php text-indigo-500 mr-2"></i> PHP
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fab fa-laravel text-red-500 mr-2"></i> Laravel
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-database text-blue-500 mr-2"></i> MySQL
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-server text-green-500 mr-2"></i> RESTful APIs
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="relative" data-aos="fade-left">
                            <div class="aspect-square rounded-2xl overflow-hidden">
                                <img src="/img/profile-photo.jpg"
                                    alt="Azlan's Profile Photo"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="absolute -bottom-6 -right-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-xl">
                                <div class="grid grid-cols-2 gap-4 text-center">
                                    <div>
                                        <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ date('Y') - 2020 }}+</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Years of Experience</div>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">50+</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Projects Completed</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section id="contact" class="py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4" data-aos="fade-up">
                            Get In Touch
                        </h2>
                        <div class="w-24 h-1 bg-indigo-500 mx-auto rounded-full"></div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-12">
                        <!-- Contact Information -->
                        <div class="space-y-8" data-aos="fade-right">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                                Let's talk about your project
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Feel free to reach out if you're looking for a developer, have a question, or just want to connect.
                            </p>

                            <div class="space-y-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 rounded-full flex items-center justify-center">
                                        <i class="fas fa-envelope text-indigo-600 dark:text-indigo-400"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Email</div>
                                        <a href="mailto:contact@azlan.dev" class="text-gray-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400">
                                            contact@azlan.dev
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 rounded-full flex items-center justify-center">
                                        <i class="fas fa-map-marker-alt text-indigo-600 dark:text-indigo-400"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Location</div>
                                        <div class="text-gray-900 dark:text-white">Indonesia</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex space-x-4">
                                <a href="https://github.com/azlan07" target="_blank"
                                    class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="https://linkedin.com/in/azlan07" target="_blank"
                                    class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://twitter.com/azlan07" target="_blank"
                                    class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8" data-aos="fade-left">
                            <form action="/contact" method="POST" class="space-y-6">
                                @csrf
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent dark:bg-gray-700 dark:text-white">
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent dark:bg-gray-700 dark:text-white">
                                </div>

                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                                    <textarea id="message" name="message" rows="4" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent dark:bg-gray-700 dark:text-white"></textarea>
                                </div>

                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Projects Section -->
            <section id="projects" class="py-12">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white" data-aos="fade-right">
                        <span class="inline-block border-b-4 border-indigo-500">My Projects</span>
                    </h2>
                    <p class="mt-4 text-gray-600 dark:text-gray-400" data-aos="fade-right" data-aos-delay="100">
                        Explore my latest work and personal projects
                    </p>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($projects as $index => $project)
                    <article class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover-lift"
                        data-aos="fade-up"
                        data-aos-delay="{{ 100 * ($index % 3) }}">
                        <!-- Project Image -->
                        <div class="relative aspect-video">
                            @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover transition duration-300 ease-in-out transform hover:scale-105">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                                <i class="fas fa-laptop-code text-4xl text-white/80"></i>
                            </div>
                            @endif

                            @if($project->featured)
                            <div class="absolute top-3 right-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                    <i class="fas fa-star mr-1"></i> Featured
                                </span>
                            </div>
                            @endif
                        </div>

                        <!-- Project Info -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                {{ $project->title }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                                {{ $project->description }}
                            </p>

                            <!-- Technologies Used -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($project->technologies ?? [] as $tech)
                                <span class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded">
                                    {{ $tech }}
                                </span>
                                @endforeach
                            </div>

                            <!-- Project Links -->
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex space-x-3">
                                    @if($project->project_url)
                                    <a href="{{ $project->project_url }}"
                                        target="_blank"
                                        class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                                        <i class="fas fa-external-link-alt mr-2"></i>
                                        Live Demo
                                    </a>
                                    @endif

                                    @if($project->github_url)
                                    <a href="{{ $project->github_url }}"
                                        target="_blank"
                                        class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-800 dark:text-gray-400">
                                        <i class="fab fa-github mr-2"></i>
                                        Code
                                    </a>
                                    @endif
                                </div>

                                <a href="{{ route('project.show', $project) }}"
                                    class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                                    Details
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="col-span-full" data-aos="fade-up">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900/50 mb-4">
                                <i class="fas fa-folder-open text-2xl text-indigo-600 dark:text-indigo-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No Projects Yet</h3>
                            <p class="text-gray-600 dark:text-gray-400">Start showcasing your work by adding your first project!</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($projects->hasPages())
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
                @endif
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left mb-4 md:mb-0">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        © {{ date('Y') }} Azlan. All rights reserved.
                    </p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                        <i class="fab fa-github text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- AOS Init -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
</body>

</html>