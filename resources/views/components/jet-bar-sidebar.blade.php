
<div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white lg:w-64 dark-mode:text-gray-200 dark-mode:bg-gray-800 lg:border-r" x-data="{ open: false }">
    <div class="flex flex-row items-center justify-between flex-shrink-0 px-4 py-4 lg:px-8">
        <!-- App Title -->
        <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-full my-5">
            <x-application-logo class="h-24"/>
        </a>
        <!-- End App Title -->
        <button class="rounded-lg lg:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <!-- Sidebar Links -->
    <nav :class="{'block': open, 'hidden': !open}" class="z-10 flex-grow px-4 pb-4 lg:block lg:pb-0 lg:overflow-y-auto">
        @if(Laravel\Jetstream\Jetstream::hasTeamFeatures())
            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('teams.create') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('teams.create') }}">Create Team</a>
            @endcan
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('teams.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">Team Settings</a>
        @endif

        {{-- Dashboard --}}

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('dashboard') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('dashboard') }}">Dashboard</a>

        {{-- Books --}}
        @if (auth()->user()->hasDirectPermission('create books') || auth()->user()->hasDirectPermission('view books') ||
                auth()->user()->hasDirectPermission('delete books') ||
                auth()->user()->hasDirectPermission('update books'))
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('books.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('books.show') }}">Books</a>    
            @endif


        @if (auth()->user()->hasDirectPermission('create account') || auth()->user()->hasDirectPermission('disable account') ||
                auth()->user()->hasDirectPermission('view account') ||
                auth()->user()->hasDirectPermission('update account'))
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('users.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                href="{{ route('users.show') }}">Users</a>
        @endif
        
        {{-- Penalties --}}

        @if (auth()->user()->hasDirectPermission('import stakeholder') || auth()->user()->hasDirectPermission('view stakeholder') ||
        auth()->user()->hasDirectPermission('create faculty'))
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('student.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="{{ route('student.show') }}">Stakeholders</a>
        @endif
            
        @if (auth()->user()->hasDirectPermission('create penalty') || auth()->user()->hasDirectPermission('view penalty') ||
        auth()->user()->hasDirectPermission('delete penalty'))
        {{-- Penalties --}}
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('penalty.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="{{ route('penalty.show') }}">Penalties</a>
        @endif
        
        {{-- Profile --}}
        @if (auth()->user()->hasDirectPermission('edit profile'))
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('profile.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('profile.show') }}">Profile</a>
        @endif
        
        @if (auth()->user()->hasDirectPermission('create role') || auth()->user()->hasDirectPermission('view role'))
        {{-- Role --}}
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('role.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('role.show') }}">Roles</a>
        @endif
        
        @if (auth()->user()->hasDirectPermission('view reports'))
        {{-- Reports --}}
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('reports.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="{{ route('reports.show') }}">Reports</a>
        @endif

        {{-- Reports --}}
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('audit.show') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:bg-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('audit.show') }}">Audit Trail</a>
        
        {{-- <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 lg:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <span>Dropdown</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform lg:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-20 w-full mt-2 origin-top-right rounded-md shadow-lg">
                <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 lg:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #1</a>
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 lg:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #2</a>
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 lg:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #3</a>
                </div>
            </div>
        </div> --}}

        <x-jet-bar-responsive-links/>

    </nav>
    <!-- End Sidebar Links -->
</div>
