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
                            <a href="{{ '/' }}" class="btn btn-warning text-white float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h3>Information</h3>
                                <a href="{{ route('edit-profile', $information->id) }}"
                                    class="btn btn-warning text-white">Edit</a>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $information->name }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $information->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $information->email }}</div>
                                <label for="">Contact</label>
                                <div class="border p-2">{{ $information->phone }}</div>
                                <label for="">Address</label>
                                <div class="border p-2">
                                    {{ $information->address1 }}<br>
                                    {{ $information->address2 }}<br>
                                    {{ $information->city }}<br>
                                    {{ $information->country }}<br>
                                </div>
                            </div>
                            <div class="col-md-6"
                                style="text-align: center;display: flex; align-item: center; flex-direction: column; align-item: center">
                                <h3 style="margin-top: 38px">Picture</h3>
                                <hr>
                                <div><img src="{{ asset('assets/uploads/profiles/' . $information->image) }}" width="300px"
                                        style="margin-top: -10px;" alt="Image here"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
