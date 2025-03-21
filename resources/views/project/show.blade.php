<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Project Details
            </h2>
            <div class="flex space-x-3">
                @if(auth()->id() === $project->user_id)
                <form action="{{ route('project.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this project?')"
                        class="w-full inline-flex justify-center items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Delete Project
                    </button>
                </form>
                <a href="{{ route('project.edit', $project) }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit Project
                </a>
                @endif
                <a href="{{ route('project.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Projects
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Project Header -->
                <div class="relative">
                    <!-- Project Image -->
                    <div class="w-full h-[400px] relative">
                        @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        @endif
                        <!-- Overlay for title -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                            <h1 class="text-3xl font-bold text-white">{{ $project->title }}</h1>
                            @if($project->featured)
                            <span class="inline-flex items-center px-3 py-1 mt-2 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                Featured Project
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Project Content -->
                <div class="p-8">
                    <!-- Project Info -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Main Content -->
                        <div class="md:col-span-2 space-y-6">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                    Project Description
                                </h2>
                                <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">
                                    {{ $project->description }}
                                </p>
                            </div>

                            <!-- Timeline -->
                            <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>
                                    {{ \Carbon\Carbon::parse($project->start_date)->format('M Y') }}
                                    @if($project->end_date)
                                    - {{ \Carbon\Carbon::parse($project->end_date)->format('M Y') }}
                                    @else
                                    - Present
                                    @endif
                                </span>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-6">
                            <!-- Project Links -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Project Links
                                </h3>
                                <div class="space-y-3">
                                    @if($project->project_url)
                                    <a href="{{ $project->project_url }}"
                                        target="_blank"
                                        class="flex items-center text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                        Live Demo
                                    </a>
                                    @endif
                                    @if($project->github_url)
                                    <a href="{{ $project->github_url }}"
                                        target="_blank"
                                        class="flex items-center text-gray-600 hover:text-gray-500 dark:text-gray-400">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                        </svg>
                                        Source Code
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Project Details -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Project Details
                                </h3>
                                <div class="space-y-3 text-sm text-gray-600 dark:text-gray-300">
                                    <div>
                                        <span class="font-medium">Created by:</span>
                                        <span>{{ $project->user->name ?? 'Unknown' }}</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">Created at:</span>
                                        <span>{{ $project->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">Last updated:</span>
                                        <span>{{ $project->updated_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            @if(auth()->id() === $project->user_id)
                            <!-- Admin Actions -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Actions
                                </h3>
                                <div class="space-y-3">
                                    <a href="{{ route('project.edit', $project) }}"
                                        class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Edit Project
                                    </a>
                                    <form action="{{ route('project.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this project?')"
                                            class="w-full inline-flex justify-center items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Delete Project
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>