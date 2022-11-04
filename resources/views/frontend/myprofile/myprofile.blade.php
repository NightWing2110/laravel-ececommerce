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
                                <div class="border p-2">{{ $information->email }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $information->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $information->email }}</div>
                                <label for="">Contact</label>
                                <div class="border p-2">{{ $information->phone }}</div>
                                <label for="">Address</label>
                                <div class="border p-2">
                                    {{ $information->country }}<br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Picture</h3>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
