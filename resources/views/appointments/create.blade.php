<x-app-layout>
  <main>
    <div class="container-fluid py-4 px-5">
      <div class="row mb-4">
        <div class="col-sm-6">
          <h3 class="text-danger"><strong><em>Create <span class="text-success">Appointment</span></em></strong></h3>
        </div>
        <div class="col-sm-6 text-end">
          <a href="{{ route('admin.appointments.index') }}"
             class="btn btn-secondary">Back</a>
        </div>
      </div>

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="bg-white shadow p-4 rounded">
        <form action="{{ route('admin.appointments.store') }}" method="POST">
          @csrf
          @include('appointments._form', ['appointment' => null])
        </form>
      </div>
    </div>
  </main>
</x-app-layout>
