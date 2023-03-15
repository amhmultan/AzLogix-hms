<x-app-layout>
<div class="container pt-2">
    <div class="row pt-3">
        {{-- <div class="col-sm-12 text-center">
            <i class="fa fa-calendar"></i> {{ date('d-M-Y H:i:s') }}
        </div> --}}
        <div id="clockdate">
            <div class="clockdate-wrapper">
              <div id="clock"></div>
              <div id="date"></div>
            </div>
          </div>
    </div>
    <div class="row py-5">
        <div class="col-md-4 mb-5">
            <div class="card-counter primary">
                <i class="fas fa-money-bill-trend-up"></i>
                <span class="count-numbers">
                    @php
                    $sales_count = DB::table('tokens')
                    ->whereDate('updated_at', today())
                    ->sum('tokens.denomination');
                    @endphp
                    {{ $sales_count }}
                </span>
                <span class="count-name">OPD Sale</span><br>
                <a class="btn" href="{{ route('admin.tokens.index')}}" role="button">More Info</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card-counter danger">
                <i class="fas fa-person-circle-plus"></i>
                <span class="count-numbers">
                    @php
                        $patients_count = DB::table('patients')
                                            ->whereDate('created_at', today())
                                            ->count();
                    @endphp
                    {{ $patients_count }}
                </span>
                <span class="count-name">Patients</span>
                <a class="btn" href="{{ route('admin.tokens.index')}}" role="button">More Info</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-counter success">
                <i class="fas fa-registered"></i>
                <span class="count-numbers">
                    @php
                        $registered_count = DB::table('patients')->count();
                    @endphp
                    {{ $registered_count }}
                </span>
                <span class="count-name">Registered</span>
                <a class="btn" href="{{ route('admin.patients.index')}}" role="button">More Info</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-5">
            <div class="card-counter info">
                <i class="fas fa-users"></i>
                <span class="count-numbers">
                    @php
                        $users_count = DB::table('users')->count();
                    @endphp
                    {{ $users_count }}
                </span>
                <span class="count-name">Users</span>
                <a class="btn" href="{{ route('admin.users.index')}}" role="button">More Info</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card-counter secondary">
                <i class="fas fa-user-md"></i>
                <span class="count-numbers">
                    @php
                        $doctors = DB::table('doctors')->count();
                    @endphp
                    {{ $doctors }}
                </span>
                <span class="count-name">Doctors</span>
                <a class="btn" href="{{ route('admin.doctors.index')}}" role="button">More Info</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card-counter warning">
                <i class="fas fa-tablets"></i>
                <span class="count-numbers">
                    @php
                        $products_count = DB::table('products')->count();
                    @endphp
                    {{ $products_count }}
                </span>
                <span class="count-name">Products</span>
                <a class="btn" href="{{ route('admin.products.index')}}" role="button">More Info</a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
