<x-app-layout>
    <main>
        <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
            @if($doctor_notes->mode === 'upload')
                <h3 class="mb-4 text-danger">
                    <strong><em>Doctor Notes Details</em></strong>
                </h3>

                <p><strong>Patient ID:</strong> {{ $doctor_notes->fk_patient_id }}</p>
                <p><strong>Token ID:</strong> {{ $doctor_notes->fk_token_id }}</p>

                <h5 class="mt-4">Prescription File:</h5>
                @if($doctor_notes->prescription)
                    <a href="{{ asset('assets/'.$doctor_notes->prescription) }}" target="_blank" class="btn btn-primary">
                        View Prescription
                    </a>
                @else
                    <p>No prescription file uploaded.</p>
                @endif

            @else
                {{-- Hospital Header --}}
                @if(isset($hospital))
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <img src="{{ asset('img/' . $hospital->logo) }}"
                                style="border: 5px solid black; width:150px;height:150px; padding: 5px;"
                                alt="{{ $hospital->title }} Logo">
                        </div>
                        <div class="col-sm-10">
                            <div class="text-center mb-4">
                                <h2 class="display-5 fw-bold text-uppercase">{{ $hospital->title }}</h2>
                                <p>{{ $hospital->address }}</p>
                                <p>
                                    <strong>Contact:</strong> {{ $hospital->contact }} |
                                    <strong>Email:</strong> {{ $hospital->email }} |
                                    <strong>Website:</strong> {{ $hospital->website }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endif

                {{-- Patient Info --}}
                @if(isset($token))
                    <h5 class="fw-bold ml-2 mb-2">Patient Information</h5>
                    <table class="table table-bordered w-100 mb-4">
                        <tbody>
                            <tr>
                                <th class="text-start">Token No:</th>
                                <td class="text-center">{{ $token->id }}</td>
                                <th class="text-start">MR No:</th>
                                <td class="text-center">{{ $token->fk_patients_id }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Patient:</th>
                                <td class="text-center">{{ $token->pName }}</td>
                                <th class="text-start">Guardian:</th>
                                <td class="text-center">{{ $token->fName }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Fees:</th>
                                <td class="text-center">{{ $token->fees }}</td>
                                <th class="text-start">Cash Paid:</th>
                                <td class="text-center">{{ $token->denomination }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Balance:</th>
                                <td class="text-center">{{ $token->balance }}</td>
                                <th class="text-start">Checkup On:</th>
                                <td class="text-center">{{ date('d-m-Y', strtotime($token->created_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif

                {{-- Two-Column Layout --}}
                <div class="d-flex align-items-stretch" style="min-height: 1000px;">
                    <div class="flex-grow-0" style="width:35%;">
                        <h5 class="fw-bold">Complaints</h5>
                        <p>{{ $doctor_notes->complaints }}</p>

                        <h5 class="fw-bold">History</h5>
                        <p>{{ $doctor_notes->history }}</p>

                        <h5 class="fw-bold">Investigations</h5>
                        <p>{{ $doctor_notes->investigations }}</p>

                        <h5 class="fw-bold">Remarks</h5>
                        <p>{{ $doctor_notes->remarks }}</p>
                    </div>

                    <div style="width:2px; background:black; margin:0 20px;"></div>

                    <div class="flex-grow-1">
                        <h1 class="fw-bold">℞</h1>
                        <div class="p-3" style="min-height:200px;">
                            {{ $doctor_notes->prescription_text }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-5 text-center no-print">
                <a href="{{ route('admin.doctor_notes.index') }}" class="btn btn-warning mx-2">Back</a>
                <a href="{{ route('admin.doctor_notes.print',$doctor_notes->id) }}" class="btn btn-primary mx-2">Print</a>
            </div>
        </div>
    </main>

    <style>
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</x-app-layout>
