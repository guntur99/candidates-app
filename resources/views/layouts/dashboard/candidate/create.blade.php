@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4>Create Candidate</h4>
                    </div>
                </div>
            </div>
        </div>
        <section class="pull-up">
            <div class="container">
                <form method="POST" action="{{ route('store.candidates') }}" enctype="multipart/form-data">
                @csrf
                    <div class="card m-b-30">
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
                                    <select id="gender" name="gender" class="form-control js-select2" required>
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

                            <button type="submit" id="create-new-candidate" class="w-100 mt-3 btn btn-dark">Create New Candidate</button>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </section>

@endsection
