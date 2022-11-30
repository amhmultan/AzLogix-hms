<x-app-layout>
    <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
        @can('Patient access')

            <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
                <div class="row">
                    <div class="col-sm-12">
                        <span class="mr-5">Name:</span><span>{{ auth()->user()->name }}</span>
                    </div>
                    <div class="col-sm-12">
                        <span class="mr-5">Role:</span><span>
                        @foreach(auth()->user()->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </div>
                    <div class="col-sm-12">
                        <span class="mr-5">Email:</span><span>
                        {{ auth()->user()->email }} <br />
                    </div>

                    
                </div>
            </div>

        @endcan
    </div>
</x-app-layout>