<header class="flex justify-between items-center py-2 px-6 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none px-6">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </button>

        
        <div class="px-5">
            <h3 class="text-blue-700 text-base font-semibold">Welcome : {{ auth()->user()->name }}</h3>                

                <p class="text-yellow-600 text-sm font-medium">Role : <b>
                    @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                    @endforeach 
                </b> </p>
        </div>

        <div class="px-5">
            
            @if(\Session::has('success'))
                <div class="text-green-600 pl-5">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            
            @if(\Session::has('error'))
                <div class="text-green-600 pl-5">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li> 
                    </ul>
                </div>
            @endif
            
            @if ($errors->any())
                <div class="text-red-600  pl-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="flex items-center">    
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = ! dropdownOpen"
                class="relative block h-8 w-20 rounded-full overflow-hidden shadow focus:outline-none">
                <img class="h-full w-full object-cover"
                    src="{{url('/img/logo.png')}}"
                    alt="AMH">
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                style="display: none;"></div>

            <div x-show="dropdownOpen"
                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                style="display: none;">
                <a href="#"
                    class="text-decoration-none block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>

                <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                    class="text-decoration-none block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
                </form>
            </div>
        </div>
    </div>
</header>