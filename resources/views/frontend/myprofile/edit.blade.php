@extends('layouts.front')

@section('title')
    My Profile
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">My Profile
                            <a href="{{ route('my-profile') }}" class="btn btn-warning text-white float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h3>Information</h3>
                                <hr>
                                <form action="{{ route('update-profile', $information->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <label for="">First Name</label>
                                    <input class="form-control" value="{{ $information->name }}" name="name">
                                    <label for="">Last Name</label>
                                    <input class="form-control" value="{{ $information->lname }}" name="lname">
                                    <label for="">Email</label>
                                    <input class="form-control" value="{{ $information->email }}" name="email">
                                    <label for="">Contact</label>
                                    <input class="form-control" value="{{ $information->phone }}" name="phone">
                                    <label for="">Address1</label>
                                    <input class="form-control" value="{{ $information->address1 }}" name="address1">
                                    <label for="">Address2</label>
                                    <input class="form-control" value="{{ $information->address2 }}" name="address2">
                                    <label for="">City</label>
                                    <input class="form-control" value="{{ $information->city }}" name="city">
                                    <label for="">State</label>
                                    <input class="form-control" value="{{ $information->state }}" name="state">
                                    <label for="">Country</label>
                                    <input class="form-control" value="{{ $information->country }}" name="country"><br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-6">
                                <h3>Picture</h3>
                                <hr>
                                @if ($information->image)
                                    <img src="{{ asset('assets/uploads/profiles/' . $information->image) }}" width="100px"
                                        alt="Profile Image here">
                                @endif
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control" accept="image/*" />
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
