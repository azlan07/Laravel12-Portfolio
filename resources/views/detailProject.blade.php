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
            <div class="min-h-screen pt-16 pb-12">
                <!-- Back Button -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
                    <a href="{{ url('/') }}"
                        class="inline-flex items-center text-gray-600 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Projects
                    </a>
                </div>

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl overflow-hidden">
                        <!-- Project Header -->
                        <div class="relative">
                            <!-- Project Image with Overlay -->
                            <div class="relative h-[500px]">
                                @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}"
                                    alt="{{ $project->title }}"
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/50 to-transparent"></div>
                                @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                                    <i class="fas fa-laptop-code text-6xl text-white/80"></i>
                                </div>
                                @endif

                                <!-- Project Title & Meta -->
                                <div class="absolute bottom-0 left-0 right-0 p-8">
                                    <div class="max-w-3xl">
                                        @if($project->featured)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 mb-4">
                                            <i class="fas fa-star mr-2"></i>
                                            Featured Project
                                        </span>
                                        @endif
                                        <h1 class="text-4xl font-bold text-white mb-4">{{ $project->title }}</h1>
                                        <div class="flex items-center space-x-6 text-gray-300">
                                            <div class="flex items-center">
                                                <i class="far fa-calendar-alt mr-2"></i>
                                                <span>{{ $project->created_at->format('M d, Y') }}</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="far fa-user mr-2"></i>
                                                <span>{{ $project->user->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Content -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-8">
                            <!-- Main Content -->
                            <div class="lg:col-span-2 space-y-8">
                                <!-- Project Description -->
                                <div class="prose dark:prose-invert max-w-none">
                                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                        About the Project
                                    </h2>
                                    <div class="text-gray-600 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                                        {{ $project->description }}
                                    </div>
                                </div>

                                <!-- Technologies Used -->
                                @if($project->technologies)
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                        Technologies Used
                                    </h2>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach(json_decode($project->technologies) as $tech)
                                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">
                                            {{ $tech }}
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Project Timeline -->
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                        Project Timeline
                                    </h2>
                                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-500 dark:text-gray-400">Start Date</div>
                                                <div class="font-semibold text-gray-900 dark:text-white">
                                                    {{ \Carbon\Carbon::parse($project->start_date)->format('M d, Y') }}
                                                </div>
                                            </div>
                                            @if($project->end_date)
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-500 dark:text-gray-400">End Date</div>
                                                <div class="font-semibold text-gray-900 dark:text-white">
                                                    {{ \Carbon\Carbon::parse($project->end_date)->format('M d, Y') }}
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-500 dark:text-gray-400">Duration</div>
                                                <div class="font-semibold text-gray-900 dark:text-white">
                                                    {{ \Carbon\Carbon::parse($project->start_date)->diffForHumans($project->end_date, true) }}
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-500 dark:text-gray-400">Status</div>
                                                <div class="font-semibold text-green-600 dark:text-green-400">
                                                    Ongoing
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Project Gallery -->
                                @if($project->gallery)
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                        Project Gallery
                                    </h2>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                        @foreach(json_decode($project->gallery) as $image)
                                        <div class="relative aspect-video rounded-lg overflow-hidden">
                                            <img src="{{ asset('storage/' . $image) }}"
                                                alt="Project gallery image"
                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Sidebar -->
                            <div class="space-y-6">
                                <!-- Project Links -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                        Project Links
                                    </h3>
                                    <div class="space-y-3">
                                        @if($project->project_url)
                                        <a href="{{ $project->project_url }}"
                                            target="_blank"
                                            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 bg-white dark:bg-gray-800 rounded-lg group hover:shadow-md transition-all duration-200">
                                            <span class="flex items-center">
                                                <i class="fas fa-external-link-alt mr-2"></i>
                                                Live Demo
                                            </span>
                                            <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transform translate-x-0 group-hover:translate-x-1 transition-all"></i>
                                        </a>
                                        @endif

                                        @if($project->github_url)
                                        <a href="{{ $project->github_url }}"
                                            target="_blank"
                                            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white bg-white dark:bg-gray-800 rounded-lg group hover:shadow-md transition-all duration-200">
                                            <span class="flex items-center">
                                                <i class="fab fa-github mr-2"></i>
                                                Source Code
                                            </span>
                                            <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transform translate-x-0 group-hover:translate-x-1 transition-all"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>

                                <!-- Admin Actions -->
                                @if(auth()->id() === $project->user_id)
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                        Manage Project
                                    </h3>
                                    <div class="space-y-3">
                                        <a href="{{ route('project.edit', $project) }}"
                                            class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors">
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Project
                                        </a>

                                        <form action="{{ route('project.destroy', $project) }}"
                                            method="POST"
                                            class="w-full"
                                            onsubmit="return confirm('Are you sure you want to delete this project?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors">
                                                <i class="fas fa-trash-alt mr-2"></i>
                                                Delete Project
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endif

                                <!-- Share Project -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                        Share Project
                                    </h3>
                                    <div class="flex space-x-4">
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($project->title) }}"
                                            target="_blank"
                                            class="flex-1 flex items-center justify-center px-4 py-2 bg-[#1DA1F2] text-white rounded-lg hover:bg-[#1a8cd8] transition-colors">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                                            target="_blank"
                                            class="flex-1 flex items-center justify-center px-4 py-2 bg-[#0A66C2] text-white rounded-lg hover:bg-[#094c8f] transition-colors">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        <button onclick="copyToClipboard('{{ request()->url() }}')"
                                            class="flex-1 flex items-center justify-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // Show toast notification
                alert('Link copied to clipboard!');
            });
        }
    </script>
</body>

</html>