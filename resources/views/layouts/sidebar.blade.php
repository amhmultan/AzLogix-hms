<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    
    {{-- Logo --}}
    <div class="flex items-center justify-center mt-2 border-bottom border-primary">
        <div>
            <h1 class="font-bold text-center tracking-wider text-4xl text-warning">Amh<span class="text-info">Soft</span></h1>
            <h6 class="text-green-400">Hospital Management System</span></h6>
        </div>
    </div>
    
    {{-- Searchbar --}}
    <div class="relative text-center pt-3">
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
    </div>
        

    <nav class="mt-1 pt-1">
        
        {{-- General Menu Starting --}}
        <h6 class="text-muted text-uppercase pl-3 mt-3">
            <span>General</span>
        </h6>

        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }} " href="{{ route('admin.dashboard')}}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M11 2v20c-5.07-.5-9-4.79-9-10s3.93-9.5 9-10zm2.03 0v8.99H22c-.47-4.74-4.24-8.52-8.97-8.99zm0 11.01V22c4.74-.47 8.5-4.25 8.97-8.99h-8.97z"/>
            </svg>

            <span class="mx-3">Dashboard</span>
        </a>

        {{-- Users Sub Menu Starting --}}
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0" id="menu">
            <li>
                @canany('User access')
                <a href="#submenu1" data-bs-toggle="collapse" class="dropdown-toggle text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.users.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M7.35,18.5C8.66,17.56,10.26,17,12,17 s3.34,0.56,4.65,1.5C15.34,19.44,13.74,20,12,20S8.66,19.44,7.35,18.5z M18.14,17.12L18.14,17.12C16.45,15.8,14.32,15,12,15 s-4.45,0.8-6.14,2.12l0,0C4.7,15.73,4,13.95,4,12c0-4.42,3.58-8,8-8s8,3.58,8,8C20,13.95,19.3,15.73,18.14,17.12z"/><path d="M12,6c-1.93,0-3.5,1.57-3.5,3.5S10.07,13,12,13s3.5-1.57,3.5-3.5S13.93,6,12,6z M12,11c-0.83,0-1.5-0.67-1.5-1.5 S11.17,8,12,8s1.5,0.67,1.5,1.5S12.83,11,12,11z"/></g></g></svg>
                    <span class="mx-3">Users Management</span>
                </a>
                @endcan

                <ul class="collapse nav flex-column ms-1 bg-white py-3" id="submenu1" data-bs-parent="#menu">
                    <li>
                        @canany('User access','User add','User edit','User delete')
                        <a href="{{ route('admin.users.index')}}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            
                            <span class="ml-3">User Information</span>
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
        {{-- Users Sub Menu End --}}
        
        @canany('Post access','Post add','Post edit','Post delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.posts.index') ? 'active' : '' }}"
            href="{{ route('admin.posts.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M3,10h11v2H3V10z M3,8h11V6H3V8z M3,16h7v-2H3V16z M18.01,12.87l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71 c0.39,0.39,0.39,1.02,0,1.41l-0.71,0.71L18.01,12.87z M17.3,13.58l-5.3,5.3V21h2.12l5.3-5.3L17.3,13.58z"/></svg>
            
            <span class="mx-3">Post Informtaion</span>
        </a>
        @endcanany

        {{-- Configurations Sub Menu Starting --}}
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0" id="menu">
            <li>
                @canany('Configuration access')
                <a href="#configsubmenu" data-bs-toggle="collapse" class="dropdown-toggle text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white">
                                        
                    <?xml version="1.0" ?><svg enable-background="new 0 0 32 32" id="Editable-line" version="1.1" viewBox="0 0 32 32" height="24px" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><circle cx="16" cy="16" fill="#62adfc" id="XMLID_224_" r="4" stroke="#62adfc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><path d="  M27.758,10.366l-1-1.732c-0.552-0.957-1.775-1.284-2.732-0.732L23.5,8.206C21.5,9.36,19,7.917,19,5.608V5c0-1.105-0.895-2-2-2h-2  c-1.105,0-2,0.895-2,2v0.608c0,2.309-2.5,3.753-4.5,2.598L7.974,7.902C7.017,7.35,5.794,7.677,5.242,8.634l-1,1.732  c-0.552,0.957-0.225,2.18,0.732,2.732L5.5,13.402c2,1.155,2,4.041,0,5.196l-0.526,0.304c-0.957,0.552-1.284,1.775-0.732,2.732  l1,1.732c0.552,0.957,1.775,1.284,2.732,0.732L8.5,23.794c2-1.155,4.5,0.289,4.5,2.598V27c0,1.105,0.895,2,2,2h2  c1.105,0,2-0.895,2-2v-0.608c0-2.309,2.5-3.753,4.5-2.598l0.526,0.304c0.957,0.552,2.18,0.225,2.732-0.732l1-1.732  c0.552-0.957,0.225-2.18-0.732-2.732L26.5,18.598c-2-1.155-2-4.041,0-5.196l0.526-0.304C27.983,12.546,28.311,11.323,27.758,10.366z  " fill="none" id="XMLID_242_" stroke="#62adfc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/></svg>
                    
                    <span class="mx-3">Configurations</span>
                </a>
                @endcan

                <ul class="collapse nav flex-column ms-1 bg-white py-3" id="configsubmenu" data-bs-parent="#menu">
                    <li>

                        @canany('HospitalConfig access','HospitalConfig create','HospitalConfig edit','HospitalConfig delete')
                        <a class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500  {{ Route::currentRouteNamed('admin.hospitals.index') ? 'active' : '' }}"
                            href="{{ route('admin.hospitals.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            
                            <span class="mx-3">Hospital Config</span>
                        </a>
                        @endcanany

                        @canany('PathologyLabConfig access','PathologyLabConfig lab add','PathologyLabConfig lab edit','PathologyLabConfig delete')
                        <a href="{{ route('admin.p_lab.index')}}" class="text-decoration-none flex items-center mt-2 py-2 px-6 text-dark fw-bold fs-6 hover:bg-red-500 {{ Route::currentRouteNamed('admin.p_lab.index') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/> </svg>
                            <span class="ml-3">Lab Config</span>
                        </a>
                        @endcanany

                    </li>
                </ul>
            </li>
        </ul>

        {{-- Configurations Sub Menu End --}}
        {{-- General Menu Ending --}}

        {{-- Hospital Menu Starting --}}
        @can('Hospital access')
        <h6 class="text-muted text-uppercase pl-3 mt-3">
            <span>Hospital</span>
        </h6>    
        @endcan
        

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
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" height="24px" width="24px" fill="#62adfc"><g><rect fill="none" height="24" width="24"/><path d="M17,2H7C5.9,2,5,2.9,5,4v2c0,1.1,0.9,2,2,2h10c1.1,0,2-0.9,2-2V4C19,2.9,18.1,2,17,2z M17,6H7V4h10V6z M20,22H4 c-1.1,0-2-0.9-2-2v-1h20v1C22,21.1,21.1,22,20,22z M18.53,10.19C18.21,9.47,17.49,9,16.7,9H7.3c-0.79,0-1.51,0.47-1.83,1.19L2,18 h20L18.53,10.19z M9.5,16h-1C8.22,16,8,15.78,8,15.5C8,15.22,8.22,15,8.5,15h1c0.28,0,0.5,0.22,0.5,0.5C10,15.78,9.78,16,9.5,16z M9.5,14h-1C8.22,14,8,13.78,8,13.5C8,13.22,8.22,13,8.5,13h1c0.28,0,0.5,0.22,0.5,0.5C10,13.78,9.78,14,9.5,14z M9.5,12h-1 C8.22,12,8,11.78,8,11.5C8,11.22,8.22,11,8.5,11h1c0.28,0,0.5,0.22,0.5,0.5C10,11.78,9.78,12,9.5,12z M12.5,16h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C13,15.78,12.78,16,12.5,16z M12.5,14h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C13,13.78,12.78,14,12.5,14z M12.5,12h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C13,11.78,12.78,12,12.5,12z M15.5,16h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C16,15.78,15.78,16,15.5,16z M15.5,14h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C16,13.78,15.78,14,15.5,14z M15.5,12h-1 c-0.28,0-0.5-0.22-0.5-0.5c0-0.28,0.22-0.5,0.5-0.5h1c0.28,0,0.5,0.22,0.5,0.5C16,11.78,15.78,12,15.5,12z"/></g></svg>
            
            <span class="mx-3">Token Info</span>
        </a>
        @endcanany

        @canany('DoctorNotes access','DoctorNotes add','DoctorNotes edit','DoctorNotes delete')
         <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.doctor_notes.index') ? 'active' : '' }}"
            href="{{ route('admin.doctor_notes.index')}}">
            <?xml version="1.0" encoding="iso-8859-1"?><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.899 490.899" style="enable-background:new 0 0 490.899 490.899;" xml:space="preserve" height="24px" width="24px" fill="#62adfc"><g><path d="M474.5,330.849l-104.3-104.3v-167.8c0-11.5-9.4-20.9-20.9-20.9h-73v-16.6c0-11.5-9.4-20.9-20.9-20.9H114.8 c-11.5,0-20.9,9.4-20.9,20.9v16.7h-73c-11.5,0-20.9,9.4-20.9,20.9v410.8c0,11.5,9.4,20.9,20.9,20.9h328.4 c11.5,0,20.9-9.4,20.9-20.9v-30.3c21.6,21.6,65.1,20.5,95.9-10.3C495.3,399.649,499.5,355.849,474.5,330.849z M135.6,41.049h99 v35.4h-99V41.049z M40.8,449.649v-370.1H94v16.7c0,11.5,9.4,20.9,20.9,20.9h140.6c10.4,0,19.8-9.4,20.9-19.8v-17.8h52.1v115.6 l-89.7-16.6c-7-3-25,3.1-22.9,22.9l17.7,95.9c0,4.2,2.1,7.3,5.2,10.4l89.7,89.7v52.1H40.8V449.649z M436.9,399.649 c-8.3,7.3-27.1,18.5-40.7,8.3l-124-124l-11.5-60.5l59.4,11.5l125.1,125.1C452.6,367.349,451.5,385.049,436.9,399.649z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            
            <span class="mx-3">Doctor Notes</span>
        </a>
        @endcanany

        {{-- Hospital Menu Ending --}}

        {{-- Pharmacy Menu Starting --}}
        @canany('Pharmacy access')
        <h6 class="text-muted text-uppercase pl-3 mt-3">
            <span>Pharmacy</span>
        </h6>
        @endcan

        @canany('Manufacturer access','Manufacturer add','Manufacturer edit','Manufacturer delete')
            <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.manufacturers.index') ? 'active' : '' }}"
            href="{{ route('admin.manufacturers.index')}}">
            <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg  viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" fill="#62adfc"><path d="m184.429688 101.929688c-1.859376 1.859374-2.929688 4.441406-2.929688 7.070312s1.070312 5.210938 2.929688 7.070312c1.859374 1.859376 4.441406 2.929688 7.070312 2.929688s5.210938-1.070312 7.070312-2.929688c1.859376-1.859374 2.929688-4.441406 2.929688-7.070312s-1.070312-5.210938-2.929688-7.070312c-1.859374-1.859376-4.441406-2.929688-7.070312-2.929688s-5.210938 1.070312-7.070312 2.929688zm0 0"/><path d="m502 316h-37.5v-104.5c0-3.53125-1.863281-6.800781-4.902344-8.601562-3.039062-1.804688-6.800781-1.867188-9.898437-.171876l-106.699219 58.402344v-49.628906c0-3.53125-1.863281-6.800781-4.902344-8.601562-3.039062-1.804688-6.800781-1.867188-9.898437-.171876l-106.699219 58.402344v-49.628906c0-3.53125-1.863281-6.800781-4.902344-8.601562-3.039062-1.804688-6.800781-1.867188-9.898437-.171876l-106.699219 58.402344v-132.191406c0-5.480469 4.457031-9.9375 9.9375-9.9375h41.5625c5.523438 0 10-4.476562 10-10s-4.476562-10-10-10h-41.5625c-16.507812 0-29.9375 13.429688-29.9375 29.9375v.0625h-60v-53.65625c0-30.515625 24.828125-55.34375 55.347656-55.34375 17.566406 0 33.707032 8.070312 44.277344 22.136719 3.316406 4.414062 9.585938 5.304687 14.003906 1.988281 4.414063-3.316406 5.304688-9.585938 1.988282-14-1.3125-1.75-2.691407-3.429688-4.128907-5.039062 8.269531-3.34375 17.144531-5.085938 26.199219-5.085938 22.621094 0 43.949219 11.054688 57.050781 29.574219 1.945313 2.753906 5.035157 4.222656 8.171875 4.222656 1.996094 0 4.011719-.597656 5.765625-1.835937 4.507813-3.191407 5.578125-9.429688 2.386719-13.9375-2.019531-2.859376-4.199219-5.574219-6.507812-8.148438h59.882812c19.058594 0 34.5625 15.503906 34.5625 34.5625s-15.503906 34.5625-34.5625 34.5625h-52.9375c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10h52.9375c30.085938 0 54.5625-24.476562 54.5625-54.5625s-24.476562-54.5625-54.5625-54.5625h-85.3125c-.175781 0-.34375.015625-.515625.027344-12.511719-6.414063-26.511719-9.902344-40.921875-9.902344-15.140625 0-29.902344 3.777344-43.0625 10.972656-11.628906-7.117187-25.109375-10.972656-39.277344-10.972656-41.546875 0-75.347656 33.800781-75.347656 75.34375v426.65625c0 5.523438 4.476562 10 10 10h492c5.523438 0 10-4.476562 10-10v-176c0-5.523438-4.476562-10-10-10zm-57.5-87.628906v87.628906h-101.5v-32.074219zm-121.5 0v87.628906h-101.5v-32.074219zm-243-51.371094h-60v-28h60zm-60 20h60v295h-20v-60.617188c0-5.523437-4.476562-10-10-10s-10 4.476563-10 10v60.617188h-20zm80 86.925781 101.5-55.554687v87.628906h-39.5c-5.523438 0-10 4.476562-10 10v166h-52zm392 208.074219h-320v-156h320zm0 0"/><path d="m217 453h46c5.523438 0 10-4.476562 10-10v-48c0-5.523438-4.476562-10-10-10h-46c-5.523438 0-10 4.476562-10 10v48c0 5.523438 4.476562 10 10 10zm10-48h26v28h-26zm0 0"/><path d="m309 453h46c5.523438 0 10-4.476562 10-10v-48c0-5.523438-4.476562-10-10-10h-46c-5.523438 0-10 4.476562-10 10v48c0 5.523438 4.476562 10 10 10zm10-48h26v28h-26zm0 0"/><path d="m401 453h46c5.523438 0 10-4.476562 10-10v-48c0-5.523438-4.476562-10-10-10h-46c-5.523438 0-10 4.476562-10 10v48c0 5.523438 4.476562 10 10 10zm10-48h26v28h-26zm0 0"/><path d="m50 401.328125c2.628906 0 5.210938-1.058594 7.070312-2.929687 1.859376-1.859376 2.929688-4.429688 2.929688-7.070313 0-2.628906-1.070312-5.207031-2.929688-7.066406-1.859374-1.863281-4.441406-2.933594-7.070312-2.933594s-5.210938 1.070313-7.070312 2.933594c-1.859376 1.859375-2.929688 4.4375-2.929688 7.066406 0 2.640625 1.070312 5.210937 2.929688 7.070313 1.859374 1.871093 4.429687 2.929687 7.070312 2.929687zm0 0"/>
            </svg>
            <span class="mx-3">Manufacturer Info</span>
            </a>
        @endcanany
        
        @canany('Supplier access','Supplier add','Supplier edit','Supplier delete')
            <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.suppliers.index') ? 'active' : '' }}"
            href="{{ route('admin.suppliers.index')}}">
            
            <?xml version="1.0" encoding="iso-8859-1"?>
            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" height="24px" width="24px" fill="#62adfc"><g><g><path d="M56,11H41V7h2c0.6,0,1-0.4,1-1V2c0-0.6-0.4-1-1-1H17c-0.6,0-1,0.4-1,1v4c0,0.6,0.4,1,1,1h2v4H4c-2.2,0-4,1.8-4,4v15 c0,0.6,0.4,1,1,1h3v27c0,0.6,0.4,1,1,1h33v-2H6V31h14v-2H5H2V15c0-1.1,0.9-2,2-2h16h20h16c1.1,0,2,0.9,2,2v14h-3H40v2h14v2h2v-2h3 c0.6,0,1-0.4,1-1V15C60,12.8,58.2,11,56,11z M18,3h24v2H18V3z M21,11V7h18v4H21z"/><path d="M37,26H23c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h14c0.6,0,1-0.4,1-1v-6C38,26.4,37.6,26,37,26z M36,32H24v-4h12V32z"/><path d="M59,35H41c-0.6,0-1,0.4-1,1v22c0,0.6,0.4,1,1,1h18c0.6,0,1-0.4,1-1V36C60,35.4,59.6,35,59,35z M58,37v4H42v-4H58z M42,57 V43h16v14H42z"/><rect x="45" y="45" width="2" height="2"/><rect x="49" y="45" width="2" height="2"/><rect x="53" y="45" width="2" height="2"/><rect x="45" y="49" width="2" height="2"/> <rect x="49" y="49" width="2" height="2"/><rect x="53" y="49" width="2" height="2"/><rect x="45" y="53" width="2" height="2"/><rect x="49" y="53" width="2" height="2"/><rect x="53" y="53" width="2" height="2"/><rect x="43" y="38" width="2" height="2"/><rect x="46" y="38" width="2" height="2"/><rect x="49" y="38" width="2" height="2"/><rect x="52" y="38" width="2" height="2"/><rect x="55" y="38" width="2" height="2"/></g></g><g></g><g></g><g></g><g></g>
            <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            
            <span class="mx-3">Supplier Info</span>
            </a>
        @endcanany
                    
        @canany('Product access','Product add','Product edit','Product delete')
            <a class="text-decoration-none flex items-center mt-2 py-2 px-6 fw-bold fs-6 text-white hover:bg-indigo-600 hover:text-white {{ Route::currentRouteNamed('admin.products.index') ? 'active' : '' }}"
            href="{{ route('admin.products.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 384 512" width="24px" fill="#62adfc"><rect fill="none" height="24" width="24"/><path d="M32 192h112C152.8 192 160 199.2 160 208C160 216.8 152.8 224 144 224H32v64h112C152.8 288 160 295.2 160 304C160 312.8 152.8 320 144 320H32v64h112C152.8 384 160 391.2 160 400C160 408.8 152.8 416 144 416H32v32c0 35.2 28.8 64 64 64h192c35.2 0 64-28.8 64-64V128H32V192zM360 0H24C10.75 0 0 10.75 0 24v48C0 85.25 10.75 96 24 96h336C373.3 96 384 85.25 384 72v-48C384 10.75 373.3 0 360 0z"/></svg>
            <span class="mx-3">Products Info</span>
            </a>
        @endcanany
                    
        {{-- Pharmacy Menu End --}}
        
        {{-- Pathology Lab Menu Starting --}}
        
        @canany('Pathology lab access')
        <h6 class="text-muted text-uppercase pl-3 mt-3">
            <span>Pathology Lab</span>
        </h6>
        @endcan

        {{-- Pathology Lab Menu Starting --}}
        
    </nav>
</div> 