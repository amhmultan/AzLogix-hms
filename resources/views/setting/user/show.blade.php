<x-app-layout>

    <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
        
        <div class="row mb-2">    
            <div class="col-sm-2">
                <span class="text-success fw-bold h4">Name:</span>
            </div>
            <div class="col-sm-10">
                <span>{{ auth()->user()->name }}</span>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-sm-2">
                <span class="text-success fw-bold h4">Role:</span>
            </div>
            <div class="col-sm-6">
                <span>@foreach(auth()->user()->roles as $role){{ $role->name }}@endforeach</span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2">
                <span class="text-success fw-bold h4">Email:</span>
            </div>
            <div class="col-sm-6">
                <span> {{ auth()->user()->email }} </span>
            </div>
        </div>

    </div>

</x-app-layout>