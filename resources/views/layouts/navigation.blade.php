<nav class="w-64 bg-white shadow-md">

    <div class="p-5 border-b">
    <h1 class="text-xl font-bold text-blue-600">
        {{ $settings->society_name ?? 'Society Hub' }}
    </h1>

    <p class="text-xs text-gray-500">
        Management Portal
    </p>
</div>

    <div class="p-4 space-y-2">

        
        <a href="{{ route('dashboard') }}"
           class="block p-2 rounded hover:bg-gray-100">
            Dashboard
        </a>

        <div x-data="{ open: false }">
            <a href="{{ route('members.index') }}" class="block p-2 rounded hover:bg-gray-100">Members</a>
        </div>
        <div x-data="{ open: false }">
            <a href="{{ route('tenants.index') }}" class="block p-2 rounded hover:bg-gray-100">Tenants</a>
        </div>
        <div x-data="{ open: false }">
                <a href="{{ route('complaints.index') }}" class="block p-2 rounded hover:bg-gray-100">Complaints</a>
        </div>
        <div x-data="{ open: false }">
                <a href="{{ route('vehicles.index') }}" class="block p-2 rounded hover:bg-gray-100">Vehicles</a>
        </div>
        <div x-data="{ open: false }">
                <a href="{{ route('notices.index') }}" class="block p-2 rounded hover:bg-gray-100">Notices</a>
        </div>
        <div x-data="{ open: false }">
                <a href="{{ route('maintenance-bills.index') }}" class="block p-2 rounded hover:bg-gray-100">Maintenance Bills</a>
        </div>
        <div x-data="{ open: false }">
                <a href="{{ route('reports.defaulters') }}" class="block p-2 rounded hover:bg-gray-100">Defaulters</a>
        </div>
        <div x-data="{ open: false }">
                <a href="{{ route('settings.show') }}" class="block p-2 rounded hover:bg-gray-100">Settings</a>
        </div>

    </div>
    <div class="border-t mt-4 p-4">

    <div class="text-sm text-gray-600">
        {{ Auth::user()->name }}
    </div>
    
    <div x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-2 rounded hover:bg-gray-100 flex items-center justify-between">
                <span>Profile</span>
                <svg :class="{'transform rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" class="pl-4 mt-2 space-y-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                                class="w-full text-left p-2 rounded hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
            </div>
    </div>

    

</div>
</nav>
