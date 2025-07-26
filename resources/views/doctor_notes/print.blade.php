<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Notes Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff !important;
            font-size: 13px;
        }

        .print-container {
            padding: 20px;
            max-width: 210mm; /* A4 width */
            margin: 0 auto;
        }

        /* Flexbox two-column layout */
        .two-column {
            display: flex;
            position: relative;
            width: 100%;
            align-items: flex-start;
        }

        .two-column .left-col {
            flex: 0 0 auto;            /* shrink-to-fit */
            max-width: 50%;            /* safety cap */
            padding-right: 20px;
            border-right: 1px solid #000; /* vertical separator */
            min-height: 659px; /* limit height */
            overflow-y: auto; /* scroll if content overflows */
        }

        .two-column .right-col {
            flex: 1;                   /* take remaining space */
            padding-left: 25px;
        }

        h1, h2, h3, h5 {
            margin-top: 0;
        }

        /* Print scaling for Letter size */
        @media print {
            body {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            @page {
                size: auto;
                margin: 15mm;
            }
            /* Scale slightly down for Letter (smaller paper) */
            @media print and (max-width: 8.5in) {
                body {
                    transform: scale(0.95);
                    transform-origin: top left;
                }
            }
        }
    </style>
</head>
<body>
    <div class="print-container">
        @if($doctor_notes->mode === 'upload')
            {{-- UPLOAD MODE --}}
            <h3 class="mb-4 text-danger">
                <strong><em>Doctor Notes Details</em></strong>
            </h3>

            <p><strong>Patient ID:</strong> {{ $doctor_notes->fk_patient_id }}</p>
            <p><strong>Token ID:</strong> {{ $doctor_notes->fk_token_id }}</p>

            <h5 class="mt-4">Prescription File:</h5>
            @if($doctor_notes->prescription)
                <p>
                    <a href="{{ asset('assets/'.$doctor_notes->prescription) }}" target="_blank">
                        View Prescription
                    </a>
                </p>
            @else
                <p>No prescription file uploaded.</p>
            @endif
        @else
            {{-- MANUAL MODE --}}
            @if(isset($hospital))
            <div class="row mb-3">
                <div class="col-sm-2">
                    <img src="{{ asset('img/' . $hospital->logo) }}"
                         style="border: 5px solid black; width:150px;height:150px; padding: 5px;"
                         alt="{{ $hospital->title }} Logo">
                </div>
                <div class="col-sm-10">
                    <div class="text-center mb-4">
                        <h2 class="display-6 fw-bold text-uppercase">{{ $hospital->title }}</h2>
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

            <div class="two-column">
                <div class="left-col">
                    <h5 class="fw-bold">Complaints</h5>
                    <p>{{ $doctor_notes->complaints }}</p>

                    <h5 class="fw-bold">History</h5>
                    <p>{{ $doctor_notes->history }}</p>

                    <h5 class="fw-bold">Investigations</h5>
                    <p>{{ $doctor_notes->investigations }}</p>

                    <h5 class="fw-bold">Remarks</h5>
                    <p>{{ $doctor_notes->remarks }}</p>
                </div>
                <div class="right-col">
                    <h1 class="fw-bold">℞</h1>
                    <div class="p-3" style="min-height:200px;">
                        {{ $doctor_notes->prescription_text }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</body>
</html>
