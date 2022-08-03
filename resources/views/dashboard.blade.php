<x-app-layout>

    <div class="container my-5">
        <div class="row">

            <div class="col-md-3">
                <div class="card-counter primary">
                    <i class="fa fa-code-fork"></i>
                    <span class="count-numbers">0</span>
                    <span class="count-name">Sales</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter danger">
                    <i class="fa fa-ticket"></i>
                    <span class="count-numbers">
                        @php
                            $patients_count = DB::table('patients')->count();
                        @endphp
                        {{ $patients_count }}
                    </span>
                    <span class="count-name">Patients</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers">
                        @php
                            $products_count = DB::table('products')->count();
                        @endphp
                        {{ $products_count }}
                    </span>
                    <span class="count-name">Products</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">
                        @php
                            $users_count = DB::table('users')->count();
                        @endphp
                        {{ $users_count }}
                    </span>
                    <span class="count-name">Users</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container card mt-5">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>

    </div>

</x-app-layout>
