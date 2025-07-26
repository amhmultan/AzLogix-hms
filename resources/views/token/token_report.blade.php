<x-app-layout>
<main>
    <div class="container-fluid p-4">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4 class="fw-bold">OPD Report</h4>
            </div>
        </div>

        <!-- Filters -->
        <div class="row mb-3">
            <div class="col-md-3">
                <label>From Date</label>
                <input type="date" id="from_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label>To Date</label>
                <input type="date" id="to_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Doctor</label>
                <select id="doctor_id" class="form-control">
                    <option value="">All</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label>Speciality</label>
                <select id="department_id" class="form-control">
                    <option value="">All</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <button id="filterBtn" class="btn btn-primary me-2">Filter</button>
            <button id="resetBtn" class="btn btn-secondary">Reset</button>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered" id="report-table" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Speciality</th>
                        <th>Fees</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Totals:</th>
                        <th id="total_amount"></th>
                        <th id="total_tokens"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @push('scripts')
    <!-- DataTables and Buttons -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
    $(document).ready(function () {
        let table = $('#report-table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            buttons:[
                { extend: 'excel', title: 'OPD Report' },
                { extend: 'pdf', title: 'OPD Report' },
                { extend: 'print', title: 'OPD Report' }
                ],
            ajax: {
                url: "{{ route('admin.tokens.token_report.data') }}",
                data: function (d) {
                    d.from_date = $('#from_date').val();
                    d.to_date = $('#to_date').val();
                    d.doctor_id = $('#doctor_id').val();
                    d.department_id = $('#department_id').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'patient_name', name: 'patient_name' },
                { data: 'doctor_name', name: 'doctor_name' },
                { data: 'speciality_name', name: 'speciality_name' },
                { data: 'amount_formatted', name: 'amount_formatted' },
                { data: 'created_at', name: 'created_at' }
            ],
            drawCallback: function(settings) {
                if (settings.json) {
                    $('#total_amount').html(settings.json.totalAmount);
                    $('#total_tokens').html(settings.json.totalTokens);
                }
            }
        });

        $('#filterBtn').click(function () {
            table.ajax.reload();
        });

        $('#resetBtn').click(function () {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#doctor_id').val('');
            $('#department_id').val('');
            table.ajax.reload();
        });
    });
    </script>
    @endpush
</main>
</x-app-layout>
