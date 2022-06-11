<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-6">
        <div class="flex items-center">
            <h1 class="font-bold text-center tracking-wider text-4xl text-warning">Amh<span class="text-blue-500">Soft</span></h1>
        </div>
    </div>
    <div class="relative text-center pt-3">
        <span class="absolute inset-y-0 left-0 pl-5 pt-3 flex items-center">
            <svg class="h-6 w-4 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path
                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </span>

        <input class="form-input w-32 sm:w-60 rounded-md pl-10 pr-2 focus:border-indigo-600" type="text"
            placeholder="Search">
    </div>
        <hr class="text-light" />

    <nav class="mt-1 pt-1">
        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }} " href="{{ route('admin.dashboard')}}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M11 2v20c-5.07-.5-9-4.79-9-10s3.93-9.5 9-10zm2.03 0v8.99H22c-.47-4.74-4.24-8.52-8.97-8.99zm0 11.01V22c4.74-.47 8.5-4.25 8.97-8.99h-8.97z"/>
            </svg>

            <span class="mx-3">Dashboard</span>
        </a>
        

        {{-- @canany('Role access','Role add','Role edit','Role delete')
        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M10.27,12h3.46c0.93,0,1.63-0.83,1.48-1.75l-0.3-1.79C14.67,7.04,13.44,6,12,6S9.33,7.04,9.09,8.47l-0.3,1.79 C8.64,11.17,9.34,12,10.27,12z M11.06,8.79C11.14,8.33,11.53,8,12,8s0.86,0.33,0.94,0.79l0.2,1.21h-2.28L11.06,8.79z"/><path d="M1.66,11.11c-0.13,0.26-0.18,0.57-0.1,0.88c0.16,0.69,0.76,1.03,1.53,1c0,0,1.49,0,1.95,0c0.83,0,1.51-0.58,1.51-1.29 c0-0.14-0.03-0.27-0.07-0.4c-0.01-0.03-0.01-0.05,0.01-0.08c0.09-0.16,0.14-0.34,0.14-0.53c0-0.31-0.14-0.6-0.36-0.82 c-0.03-0.03-0.03-0.06-0.02-0.1c0.07-0.2,0.07-0.43,0.01-0.65C6.1,8.69,5.71,8.4,5.27,8.38c-0.03,0-0.05-0.01-0.07-0.03 C5.03,8.14,4.72,8,4.37,8C4.07,8,3.8,8.1,3.62,8.26C3.59,8.29,3.56,8.29,3.53,8.28c-0.14-0.06-0.3-0.09-0.46-0.09 c-0.65,0-1.18,0.49-1.24,1.12c0,0.02-0.01,0.04-0.03,0.06c-0.29,0.26-0.46,0.65-0.41,1.05c0.03,0.22,0.12,0.43,0.25,0.6 C1.67,11.04,1.67,11.08,1.66,11.11z"/><path d="M16.24,13.65c-1.17-0.52-2.61-0.9-4.24-0.9c-1.63,0-3.07,0.39-4.24,0.9C6.68,14.13,6,15.21,6,16.39V18h12v-1.61 C18,15.21,17.32,14.13,16.24,13.65z M8.07,16c0.09-0.23,0.27-0.42,0.49-0.52c1.1-0.49,2.26-0.73,3.43-0.73 c1.18,0,2.33,0.25,3.43,0.73c0.23,0.1,0.4,0.29,0.49,0.52H8.07z"/><path d="M1.22,14.58C0.48,14.9,0,15.62,0,16.43V18l4.5,0v-1.61c0-0.83,0.23-1.61,0.63-2.29C4.76,14.04,4.39,14,4,14 C3.01,14,2.07,14.21,1.22,14.58z"/><path d="M22.78,14.58C21.93,14.21,20.99,14,20,14c-0.39,0-0.76,0.04-1.13,0.1c0.4,0.68,0.63,1.46,0.63,2.29V18l4.5,0v-1.57 C24,15.62,23.52,14.9,22.78,14.58z"/><path d="M22,11v-0.5c0-1.1-0.9-2-2-2h-2c-0.42,0-0.65,0.48-0.39,0.81l0.7,0.63C18.12,10.25,18,10.61,18,11c0,1.1,0.9,2,2,2 S22,12.1,22,11z"/></g></g></svg>

            <span class="mx-3">Role</span>
        </a>
        @endcanany --}}

        {{-- @canany('Permission access','Permission add','Permission edit','Permission delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
            href="{{ route('admin.permissions.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><path d="M4,18v-0.65c0-0.34,0.16-0.66,0.41-0.81C6.1,15.53,8.03,15,10,15c0.03,0,0.05,0,0.08,0.01c0.1-0.7,0.3-1.37,0.59-1.98 C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26c-0.42-0.6-0.75-1.28-0.97-2H4z"/><path d="M10,12c2.21,0,4-1.79,4-4s-1.79-4-4-4C7.79,4,6,5.79,6,8S7.79,12,10,12z M10,6c1.1,0,2,0.9,2,2s-0.9,2-2,2 c-1.1,0-2-0.9-2-2S8.9,6,10,6z"/><path d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.48-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.48,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z"/></g></g></svg>

            <span class="mx-3">Permission</span>
        </a>
        @endcanany --}}
        
        {{-- @canany('User access','User add','User edit','User delete')
        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}"
            href="{{ route('admin.users.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M7.35,18.5C8.66,17.56,10.26,17,12,17 s3.34,0.56,4.65,1.5C15.34,19.44,13.74,20,12,20S8.66,19.44,7.35,18.5z M18.14,17.12L18.14,17.12C16.45,15.8,14.32,15,12,15 s-4.45,0.8-6.14,2.12l0,0C4.7,15.73,4,13.95,4,12c0-4.42,3.58-8,8-8s8,3.58,8,8C20,13.95,19.3,15.73,18.14,17.12z"/><path d="M12,6c-1.93,0-3.5,1.57-3.5,3.5S10.07,13,12,13s3.5-1.57,3.5-3.5S13.93,6,12,6z M12,11c-0.83,0-1.5-0.67-1.5-1.5 S11.17,8,12,8s1.5,0.67,1.5,1.5S12.83,11,12,11z"/></g></g></svg>
        
            <span class="mx-3">Users</span>
        </a>
        @endcanany --}}


        {{-- Users Sub Menu Starting --}}
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0" id="menu">
            <li>
                @canany('User access','User add','User edit','User delete')
                <a href="#submenu3" data-bs-toggle="collapse" class="dropdown-toggle text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.users.index') }}">
                    <i class="fs-4 bi-grid"></i> 
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M7.35,18.5C8.66,17.56,10.26,17,12,17 s3.34,0.56,4.65,1.5C15.34,19.44,13.74,20,12,20S8.66,19.44,7.35,18.5z M18.14,17.12L18.14,17.12C16.45,15.8,14.32,15,12,15 s-4.45,0.8-6.14,2.12l0,0C4.7,15.73,4,13.95,4,12c0-4.42,3.58-8,8-8s8,3.58,8,8C20,13.95,19.3,15.73,18.14,17.12z"/><path d="M12,6c-1.93,0-3.5,1.57-3.5,3.5S10.07,13,12,13s3.5-1.57,3.5-3.5S13.93,6,12,6z M12,11c-0.83,0-1.5-0.67-1.5-1.5 S11.17,8,12,8s1.5,0.67,1.5,1.5S12.83,11,12,11z"/></g></g></svg>
                    <span class="mx-3">Users</span> 
                </a>
                @endcan

                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        @canany('User access','User add','User edit','User delete')
                        <a href="{{ route('admin.users.index')}}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ml-5" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            <span class="d-none d-sm-inline px-3">User Info</span>
                        </a>
                        @endcanany
                    </li>
                    <li>
                        @canany('Role access','Role add','Role edit','Role delete')
                            <a href="{{ route('admin.roles.index') }}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ml-5" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                                <span class="d-none d-sm-inline px-3">User Roles</span>
                            </a>
                        @endcanany
                    </li>
                    <li>
                        @canany('Permission access','Permission add','Permission edit','Permission delete')
                            <a href="{{ route('admin.permissions.index') }}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ml-5" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                                <span class="d-none d-sm-inline px-3">User Permissions</span>
                            </a>
                        @endcanany
                    </li>

                </ul>
            </li>
        </ul>


        {{-- Users Sub Menu End --}}
        
        @canany('Post access','Post add','Post edit','Post delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.posts.index') ? 'active' : '' }}"
            href="{{ route('admin.posts.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M3,10h11v2H3V10z M3,8h11V6H3V8z M3,16h7v-2H3V16z M18.01,12.87l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71 c0.39,0.39,0.39,1.02,0,1.41l-0.71,0.71L18.01,12.87z M17.3,13.58l-5.3,5.3V21h2.12l5.3-5.3L17.3,13.58z"/></svg>
            
            <span class="mx-3">Post Notes</span>
        </a>
        @endcanany

        @canany('Patient access','Patient add','Patient edit','Patient delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.patients.index') ? 'active' : '' }}"
            href="{{ route('admin.patients.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M12,10c2.21,0,4-1.79,4-4c0-2.21-1.79-4-4-4S8,3.79,8,6C8,8.21,9.79,10,12,10z M12,4c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2 s-2-0.9-2-2C10,4.9,10.9,4,12,4z M18.39,12.56C16.71,11.7,14.53,11,12,11c-2.53,0-4.71,0.7-6.39,1.56C4.61,13.07,4,14.1,4,15.22V22 h2v-6.78c0-0.38,0.2-0.72,0.52-0.88C7.71,13.73,9.63,13,12,13c0.76,0,1.47,0.07,2.13,0.2l-1.55,3.3H9.75C8.23,16.5,7,17.73,7,19.25 C7,20.77,8.23,22,9.75,22h2.18H18c1.1,0,2-0.9,2-2v-4.78C20,14.1,19.39,13.07,18.39,12.56z M10.94,20H9.75C9.34,20,9,19.66,9,19.25 c0-0.41,0.34-0.75,0.75-0.75h1.89L10.94,20z M18,20h-4.85l2.94-6.27c0.54,0.2,1.01,0.41,1.4,0.61C17.8,14.5,18,14.84,18,15.22V20z"/></svg>
            
            <span class="mx-3">Patients</span>
        </a>
        @endcanany
        
        @canany('Product access','Product add','Product edit','Product delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-light fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.products.index') ? 'active' : '' }}"
            href="{{ route('admin.products.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 384 512" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M32 192h112C152.8 192 160 199.2 160 208C160 216.8 152.8 224 144 224H32v64h112C152.8 288 160 295.2 160 304C160 312.8 152.8 320 144 320H32v64h112C152.8 384 160 391.2 160 400C160 408.8 152.8 416 144 416H32v32c0 35.2 28.8 64 64 64h192c35.2 0 64-28.8 64-64V128H32V192zM360 0H24C10.75 0 0 10.75 0 24v48C0 85.25 10.75 96 24 96h336C373.3 96 384 85.25 384 72v-48C384 10.75 373.3 0 360 0z"/></svg>

            <span class="mx-3">Products</span>
        </a>
        @endcanany
        
    </nav>
</div>