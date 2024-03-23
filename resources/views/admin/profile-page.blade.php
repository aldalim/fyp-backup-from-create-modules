@extends('admin-layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <!-- <div class="text-center"> -->
            <div class="row">
                <!-- <div class="col-md-3"></div> -->
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <img src="{{ $user->profile->profilePictureUrl }}" alt="Employee Photo"
                            class="profile-photo">
                    </div>
                </div>
                <div class="col-md-6" style="margin-top:5%">
                    <h2>Hello {{ $admin->name }}</h2>
                </div>
                <!-- <div class="col-md-3"></div> -->

            </div>
            <!-- </div> -->

            <form method="post" action="{{ route('admin.update-profile') }}">
            @csrf
                <div class="row">
                    <div class="col-md-6">

                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="employeeid" class="form-label">Employee ID:</label>
                                <input type="text" class="form-control" id="employeeid" placeholder="Employee ID"
                                    value="{{ $admin->employee_id}}">
                            </div>
                        </fieldset>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone No:</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter phone number"
                                value="{{ $admin->phone_no }}">
                        </div>

                        <!-- <fieldset disabled>
                            <div class="mb-3">
                                <label for="idNumber" class="form-label">IC Number:</label>
                                <input type="text" class="form-control" id="icNumber" placeholder="Enter IC number" value="{{ $admin->ic_number }}">
                            </div>
                        </fieldset> -->

                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" value="{{ $admin->dob }}">
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender:</label>
                            <input type="text" class="form-control" id="gender" value="{{ $admin->gender }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email address"
                                value="{{ $admin->user->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="mailingAddress" class="form-label">Mailing Address:</label>
                            <textarea class="form-control" id="mailingAddress" rows="3"
                                placeholder="Enter mailing address">{{ $admin->address }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="department" class="form-label">Department:</label>
                                <input type="text" class="form-control" id="department" placeholder="Enter department"
                                    value="{{ $admin->dept }}">
                            </div>
                        </fieldset>

                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position:</label>
                                <input type="text" class="form-control" id="position" placeholder="Enter position"
                                    value="{{ $admin->position }}">
                            </div>
                        </fieldset>

                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age:</label>
                                <input type="number" class="form-control" id="age" value="{{ $admin->age }}">
                            </div>
                        </fieldset>

                        <div class="mb-3">
                            <label for="biography" class="form-label">Biography:</label>
                            <textarea class="form-control" id="biography" rows="10"
                                placeholder="Enter biography">{{ $admin->bio }}</textarea>
                        </div>


                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ $admin->user_id }}">
                <button type="submit" class="btn btn-primary float-end">Save</button>
            </form>

        </div>
    </div>
</div>

@endsection