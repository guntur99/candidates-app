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
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4 class="">
                            Candidate Management
                        </h4>
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
    <div class="modal fade bd-example-modal-lg" id="productDetail" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form method="POST" action="{{ route('update.products') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <input id="product_id" name="product_id" hidden>
                        <h5 class="modal-title">Product Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body ">

                        <div class=" w-100 p-3">
                            <div class="card-body">

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="category">Category</label>
                                        <div id="select-category"></div>
                                    </div>
                                    <div class="input-group col-md-4">
                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                                <label class="custom-file-label" for="thumbnail"
                                                        >Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="price">Price</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" class="form-control"  id="price" name="price" placeholder="1000000" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="stock">Stock</label>
                                        <input type="number" class="form-control" id="stock" name="stock" value="1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="weight">Weight</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control"  id="weight" name="weight" value="1">
                                            <div class="input-group-append">
                                                <span class="input-group-text">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Thumbnail</label>
                                        <div id="thumbnail-preview"></div>
                                    </div>
                                </div>
                                <button type="submit" class="w-100 btn btn-dark mt-3">Update Product</button>
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
                    <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" >cancel</a>
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
            { "name": "candidate_id", "data": "candidate_id" },
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
        var el          = $('#productDetail'),
            options     = "",
            thumbnail   = "";

        $('#product_id').val(data.id);
        $('#name').val(data.name);
        $('#price').val(data.price);
        $('#stock').val(data.stock);
        $('#weight').val(data.weight);
        $('#description').val(data.description);

        (data.thumbnail !== null) ? thumbnail = `
            <div class="card-media">
                <img class="card-img-top" src="{{ asset('storage/thumbnails') }}/`+data.thumbnail+`" style="width: 250px;">
            </div>` : thumbnail = `
            <div class="card-media">
                <img class="card-img-top" src="{{ asset('atmos/light/assets/img/products/item%20(3).jpg') }}" style="width: 250px;">
            </div>`;
        $('#thumbnail-preview').html(thumbnail);

        el.modal('show');
    };

    function deleteComfirmation(id){
        $('#delete-button').html(`<a href="#" class="btn btn-danger" data-dismiss="modal" onclick=\'deleteCompany(`+id+`)\'>Okay</a>`);
        $('#modalConfirmation').modal('show');
    }

    function deleteCompany(id){
        var formData = new FormData();
        formData.append('id', id);

        axios.post('{{route("delete.products")}}', formData).then((res) => {
            alert('Delete Success!');
            location.reload();
        }).catch((err) => {
            return 'error';
        });
    }

</script>
@endsection
