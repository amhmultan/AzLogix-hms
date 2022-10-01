<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-6 border-bottom border-info ">
        <div class="flex items-center mb-3">
            <h1 class="font-bold text-center tracking-wider text-4xl text-warning">Amh<span class="text-info">Soft</span></h1>
        </div>
    </div>
    {{-- <div class="relative text-center pt-3">
        <span class="absolute inset-y-0 left-0 pl-3 pt-3 flex items-center">
            <svg class="h-6 w-6 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path
                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </span>

        <input class="form-input w-32 sm:w-60 rounded-md pl-10 pr-2 focus:border-indigo-600" type="text"
        placeholder="Search">
    </div> --}}
        

    <nav class="mt-1 pt-1">
        
        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }} " href="{{ route('admin.dashboard')}}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M11 2v20c-5.07-.5-9-4.79-9-10s3.93-9.5 9-10zm2.03 0v8.99H22c-.47-4.74-4.24-8.52-8.97-8.99zm0 11.01V22c4.74-.47 8.5-4.25 8.97-8.99h-8.97z"/>
            </svg>

            <span class="mx-3">Dashboard</span>
        </a>
        
        {{-- Users Sub Menu Starting --}}
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0" id="menu">
            <li>
                @canany('User access','User add','User edit','User delete')
                <a href="#submenu1" data-bs-toggle="collapse" class="dropdown-toggle text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.users.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M7.35,18.5C8.66,17.56,10.26,17,12,17 s3.34,0.56,4.65,1.5C15.34,19.44,13.74,20,12,20S8.66,19.44,7.35,18.5z M18.14,17.12L18.14,17.12C16.45,15.8,14.32,15,12,15 s-4.45,0.8-6.14,2.12l0,0C4.7,15.73,4,13.95,4,12c0-4.42,3.58-8,8-8s8,3.58,8,8C20,13.95,19.3,15.73,18.14,17.12z"/><path d="M12,6c-1.93,0-3.5,1.57-3.5,3.5S10.07,13,12,13s3.5-1.57,3.5-3.5S13.93,6,12,6z M12,11c-0.83,0-1.5-0.67-1.5-1.5 S11.17,8,12,8s1.5,0.67,1.5,1.5S12.83,11,12,11z"/></g></g></svg>
                    <span class="mx-3">Users</span>
                </a>
                @endcan

                <ul class="collapse nav flex-column ms-1 bg-white py-3" id="submenu1" data-bs-parent="#menu">
                    <li>
                        @canany('User access','User add','User edit','User delete')
                        <a href="{{ route('admin.users.index')}}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            
                            <span class="ml-3">Users Management</span>
                        </a>
                        @endcanany
                    </li>
                    <li>
                        @canany('Role access','Role add','Role edit','Role delete')
                            <a href="{{ route('admin.roles.index') }}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                                <span class="ml-3">User Roles</span>
                            </a>
                        @endcanany
                    </li>
                    <li>
                        @canany('Permission access','Permission add','Permission edit','Permission delete')
                            <a href="{{ route('admin.permissions.index') }}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                                <span class="ml-3">User Permissions</span>
                            </a>
                        @endcanany
                    </li>

                </ul>
            </li>
        </ul>


        {{-- Users Sub Menu End --}}
        
        @canany('Hospital access','Hospital create','Hospital edit','Hospital delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.hospitals.index') ? 'active' : '' }}"
            href="{{ route('admin.hospitals.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M3,10h11v2H3V10z M3,8h11V6H3V8z M3,16h7v-2H3V16z M18.01,12.87l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71 c0.39,0.39,0.39,1.02,0,1.41l-0.71,0.71L18.01,12.87z M17.3,13.58l-5.3,5.3V21h2.12l5.3-5.3L17.3,13.58z"/></svg>
            
            <span class="mx-3">Hospital Config</span>
        </a>
        @endcanany

        @canany('Post access','Post add','Post edit','Post delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.posts.index') ? 'active' : '' }}"
            href="{{ route('admin.posts.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M3,10h11v2H3V10z M3,8h11V6H3V8z M3,16h7v-2H3V16z M18.01,12.87l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71 c0.39,0.39,0.39,1.02,0,1.41l-0.71,0.71L18.01,12.87z M17.3,13.58l-5.3,5.3V21h2.12l5.3-5.3L17.3,13.58z"/></svg>
            
            <span class="mx-3">Post Notes</span>
        </a>
        @endcanany

        @canany('Patient access','Patient add','Patient edit','Patient delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.patients.index') ? 'active' : '' }}"
            href="{{ route('admin.patients.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M12,10c2.21,0,4-1.79,4-4c0-2.21-1.79-4-4-4S8,3.79,8,6C8,8.21,9.79,10,12,10z M12,4c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2 s-2-0.9-2-2C10,4.9,10.9,4,12,4z M18.39,12.56C16.71,11.7,14.53,11,12,11c-2.53,0-4.71,0.7-6.39,1.56C4.61,13.07,4,14.1,4,15.22V22 h2v-6.78c0-0.38,0.2-0.72,0.52-0.88C7.71,13.73,9.63,13,12,13c0.76,0,1.47,0.07,2.13,0.2l-1.55,3.3H9.75C8.23,16.5,7,17.73,7,19.25 C7,20.77,8.23,22,9.75,22h2.18H18c1.1,0,2-0.9,2-2v-4.78C20,14.1,19.39,13.07,18.39,12.56z M10.94,20H9.75C9.34,20,9,19.66,9,19.25 c0-0.41,0.34-0.75,0.75-0.75h1.89L10.94,20z M18,20h-4.85l2.94-6.27c0.54,0.2,1.01,0.41,1.4,0.61C17.8,14.5,18,14.84,18,15.22V20z"/></svg>
            
            <span class="mx-3">Patients</span>
        </a>
        @endcanany
        
        @canany('Token access','Token add','Token edit','Token delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.tokens.index') ? 'active' : '' }}"
            href="{{ route('admin.tokens.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><g><rect fill="none" height="24" width="24"/><path d="M17,2H7C5.9,2,5,2.9,5,4v2c0,1.1,0.9,2,2,2h10c1.1,0,2-0.9,2-2V4C19,2.9,18.1,2,17,2z M17,6H7V4h10V6z M20,22H4 c-1.1,0-2-0.9-2-2v-1h20v1C22,21.1,21.1,22,20,22z M18.53,10.19C18.21,9.47,17.49,9,16.7,9H7.3c-0.79,0-1.51,0.47-1.83,1.19L2,18 h20L18.53,10.19z M9.5,16h-1C8.22,16,8,15.78,8,15.5C8,15.22,8.22,15,8.5,15h1c0.28,0,0.5,0.22,0.5,0.5C10,15.78,9.78,16,9.5,16z M9.5,14h-1C8.22,14,8,13.78,8,13.5C8,13.22,8.22,13,8.5,13h1c0.28,0,0.5,0.22,0.5,0.5C10,13.78,9.78,14,9.5,14z M9.5,12h-1 C8.22,12,8,11.78,8,11.5C8,11.22,8.22,11,8.5,11h1c0.28,0,0.5,0.22,0.5,0.5C10,11.78,9.78,12,9.5,12z M12.5,16h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C13,15.78,12.78,16,12.5,16z M12.5,14h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C13,13.78,12.78,14,12.5,14z M12.5,12h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C13,11.78,12.78,12,12.5,12z M15.5,16h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C16,15.78,15.78,16,15.5,16z M15.5,14h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C16,13.78,15.78,14,15.5,14z M15.5,12h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C16,11.78,15.78,12,15.5,12z"/></g></svg>
            
            <span class="mx-3">Token Info</span>
        </a>
        @endcanany
        
        {{-- Pharmacy Sub Menu Starting --}}
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0" id="menu  ">
            <li>
                @canany('Pharmacy access')
                <a href="#submenu3" data-bs-toggle="collapse" class="dropdown-toggle text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.product.index') }}">
                    <i class="fs-4 bi-grid"></i> 
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 384 512" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M32 192h112C152.8 192 160 199.2 160 208C160 216.8 152.8 224 144 224H32v64h112C152.8 288 160 295.2 160 304C160 312.8 152.8 320 144 320H32v64h112C152.8 384 160 391.2 160 400C160 408.8 152.8 416 144 416H32v32c0 35.2 28.8 64 64 64h192c35.2 0 64-28.8 64-64V128H32V192zM360 0H24C10.75 0 0 10.75 0 24v48C0 85.25 10.75 96 24 96h336C373.3 96 384 85.25 384 72v-48C384 10.75 373.3 0 360 0z"/></svg>
                    <span class="mx-3">Pharmacy</span>
                </a>
                @endcan

                <ul class="collapse nav flex-column ms-1 bg-white py-3" id="submenu3" data-bs-parent="#menu">
                    
                    <li class="w-100">
                        @canany('Manufacturer access','Manufacturer add','Manufacturer edit','Manufacturer delete')
                        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.manufacturers.index') ? 'active' : '' }}"
                            href="{{ route('admin.manufacturers.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            <span class="mx-3">Manufacturer Info</span>
                        </a>
                        @endcanany
                    </li>

                    <li class="w-100">
                        @canany('Supplier access','Supplier add','Supplier edit','Supplier delete')
                        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.suppliers.index') ? 'active' : '' }}"
                            href="{{ route('admin.suppliers.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            <span class="mx-3">Supplier Info</span>
                        </a>
                        @endcanany
                    </li>

                    <li class="w-100">
                        @canany('Product access','Product add','Product edit','Product delete')
                        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.products.index') ? 'active' : '' }}"
                            href="{{ route('admin.products.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            <span class="mx-3">Products Info</span>
                        </a>
                        @endcanany
                    </li>

                </ul>
            </li>
        </ul>
        {{-- Pharmacy Sub Menu End --}}

        {{-- Lab Sub Menu Starting --}}
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0" id="menu">
            <li>
                @canany('Lab access','Lab add','Lab edit','Lab delete')
                <a href="#submenu2" data-bs-toggle="collapse" class="dropdown-toggle text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.p_lab.index') }}">
                    <i class="fs-4 bi-grid"></i> 
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M7.35,18.5C8.66,17.56,10.26,17,12,17 s3.34,0.56,4.65,1.5C15.34,19.44,13.74,20,12,20S8.66,19.44,7.35,18.5z M18.14,17.12L18.14,17.12C16.45,15.8,14.32,15,12,15 s-4.45,0.8-6.14,2.12l0,0C4.7,15.73,4,13.95,4,12c0-4.42,3.58-8,8-8s8,3.58,8,8C20,13.95,19.3,15.73,18.14,17.12z"/><path d="M12,6c-1.93,0-3.5,1.57-3.5,3.5S10.07,13,12,13s3.5-1.57,3.5-3.5S13.93,6,12,6z M12,11c-0.83,0-1.5-0.67-1.5-1.5 S11.17,8,12,8s1.5,0.67,1.5,1.5S12.83,11,12,11z"/></g></g></svg>
                    <span class="mx-3">Pathology Lab</span>
                </a>
                @endcan

                <ul class="collapse nav flex-column ms-1 bg-white py-3" id="submenu2" data-bs-parent="#menu">
                    <li class="w-100">
                        @canany('Pathology lab access','Pathology lab add','Pathology lab edit','Pathology lab delete')
                        <a href="{{ route('admin.p_lab.index')}}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.p_lab.index') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            <span class="ml-3">Lab Info</span>
                        </a>
                        @endcanany
                    </li>
                    

                </ul>
            </li>
        </ul>

    {{-- Lab Sub Menu End --}}
        
    </nav>
</div> 