<x-app-layout>

    <div class="container my-5">
        <div class="row">

            <div class="col-md-3">
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
                    <span class="count-name">OPD Sale</span>
                </div>
            </div>

            <div class="col-md-3">
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
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter success">
                    <i class="fas fa-flask-vial"></i>
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
                    <i class="fas fa-users"></i>
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

    </div>

</x-app-layout>
