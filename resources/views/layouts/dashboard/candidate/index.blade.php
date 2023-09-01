@extends('layouts.dashboard.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('atmos/light/assets/vendor/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')

    <section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-md-8 text-white p-t-40 p-b-90">
                        <h4 class="">
                            Candidate Management
                        </h4>
                    </div>
                    <div class="col-md-4 text-white p-t-40 p-b-90 right-0">
                        <a href="{{ route('create.candidate') }}" class="w-100 btn btn-success">Create New Candidate</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive p-t-10">
                                <table id="candidates-table" class="table" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%;">ID</th>
                                        <th style="width: 10%;">Full Name</th>
                                        <th style="width: 5%;">Email</th>
                                        <th style="width: 5%;">Phone</th>
                                        <th style="width: 5%;">Gender</th>
                                        <th style="width: 5%;">DOB</th>
                                        <th style="width: 5%;">POB</th>
                                        <th style="width: 5%;">Year Experience</th>
                                        <th style="width: 5%;">Last Salary</th>
                                        {{-- <th style="width: 5%;">Created At</th> --}}
                                        <th style="width: 25%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---Modal-->
    <div class="modal fade bd-example-modal-lg" id="candidateDetail" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form method="POST" action="{{ route('update.candidates') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <input id="candidate_id" name="candidate_id" hidden>
                        <h5 class="modal-title">Candidate Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body ">

                        <div class=" w-100 p-3">
                            <div class="card-body">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Phone</label>
                                        <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Phone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Place of Birth</label>
                                        <input type="text" class="form-control" id="pob" name="pob" placeholder="POB" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="DOB" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Gender</label>
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Year Experience</label>
                                        <input type="text" class="form-control" id="year_exp" name="year_exp" placeholder="Year Experience" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Last Salary</label>
                                        <input type="text" class="form-control" id="last_salary" name="last_salary" placeholder="Last Salary" required>
                                    </div>
                                </div>
                                <button type="submit" class="w-100 btn btn-dark mt-3">Update Candidate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade "   id="modalConfirmation" data-backdrop="static"  tabindex="-1" role="dialog"
            aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="px-3 pt-3 text-center">
                        <div class="event-type warning">
                            <div class="event-indicator ">
                                <i class="mdi mdi-exclamation text-white" style="font-size: 60px"></i>
                            </div>
                        </div>
                        <h3 class="pt-3">Are you sure?</h3>

                    </div>
                </div>
                <div class="modal-footer ">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" >Cancel</a>
                    <div id="delete-button"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_script')
<script src="{{ asset('atmos/light/assets/vendor/DataTables/datatables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    var dataTable = $('#candidates-table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        "searchDelay": 350,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: '{{route("datatable.candidates")}}',
        },
        "columns": [
            { "name": "id", "data": "id" },
            { "name": "full_name", "data": "full_name" },
            { "name": "email", "data": "email" },
            { "name": "phone_number", "data": "phone_number" },
            { "name": "gender", "data":
                function(data){
                    var res = 'Male'
                    if (data.gender == 'F') {
                        res = 'Female';
                    }
                    return res;
                }
            },
            { "name": "dob", "data": "dob" },
            { "name": "pob", "data": "pob" },
            { "name": "year_exp", "data": "year_exp" },
            { "name": "last_salary", "data": "last_salary" },
            // { "name": "created_at", "data":
            //     function(data){
            //         var res = moment(data.created_at).format('LL');

            //         return res;
            //     }
            // },
            { "name": null, "data": null },
        ],
        "order" :[[ 0, 'asc' ]],
        "columnDefs": [
                {
                    "targets": -1,
                    "data": "action",
                    "render": function (date, type, data) {
                        var res =
                        `
                            <a href="#" class='btn btn-warning text-white mx-1' onclick=\'editProduct(`+JSON.stringify(data)+`)\'> Edit</a>
                            <a href="#" class='btn btn-danger text-white mx-1' onclick=\'deleteComfirmation(`+data.id+`)\'> Delete</a>
                        `;
                        return res;
                    }
                }
            ],
    });

    function editProduct(data){
        var el          = $('#candidateDetail'),
            options     = "";

        $('#candidate_id').val(data.id);
        $('#full_name').val(data.full_name);
        $('#email').val(data.email);
        $('#phone_number').val(data.phone_number);
        $('#pob').val(data.pob);
        $('#dob').val(data.dob);
        $('#gender').val(data.gender);
        $('#year_exp').val(data.year_exp);
        $('#last_salary').val(data.last_salary);
        el.modal('show');
    };

    function deleteComfirmation(id){
        $('#delete-button').html(`<a href="#" class="btn btn-danger" data-dismiss="modal" onclick=\'deleteCompany(`+id+`)\'>Okay</a>`);
        $('#modalConfirmation').modal('show');
    }

    function deleteCompany(id){
        var formData = new FormData();
        formData.append('id', id);

        axios.post('{{route("destroy.candidates")}}', formData).then((res) => {
            alert('Delete Success!');
            location.reload();
        }).catch((err) => {
            return 'error';
        });
    }

</script>
@endsection
