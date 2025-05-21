<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <!-- Logout Button -->
                     <div class="flex  justify-between items-center mt-5">
                        <button>
                            <a href="{{ route('tasks.index') }}"
                               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                Go to Task List
                            </a>
                        </button>
                         <form method="POST" action="{{ route('logout') }}" class="mt-4">
                             @csrf
                             <button type="submit"
                                 class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                                 Logout
                             </button>
                         </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
