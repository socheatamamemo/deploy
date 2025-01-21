@extends('layout.user')

@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <style>
        body {
            background: rgb(224 231 255);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8;
        }

        .profile-button {
            background: rgb(30 64 175);
            box-shadow: none;
            border: none;
        }

        .profile-button:hover {
            background: #682773;
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none;
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none;
        }

        .back:hover {
            color: #682773;
            cursor: pointer;
        }

        .labels {
            font-size: 11px;
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8;
        }

        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

    <div class="container bg-white mt-7 mb-5">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-7">
            <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="center-content">
                                <img class="rounded-circle mt-5" width="150px" src="{{ $user->profile_image ? asset($user->profile_image) : 'https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg' }}">
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Profile Image</label>
                                    <input type="file" class="form-control" name="profile_image">
                                </div>
                            </div>
                <a href="{{ route('userprofile.show') }}" class="btn btn-primary mt-4">Profile</a>
                <div class="card-body mt-4">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->email }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->phone ?? 'N/A' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->address ?? 'N/A' }}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-start mb-6">
                    <a href="{{ url('overview') }}" class="btn btn-primary mr-9">Overview</a>
                    <a href="{{ url('activity') }}" class="btn btn-primary">Activity</a>
                </div>
                <hr style="background-color: blue; height: 5px;">
                <h4 class="mb-3">Update Profile</h4>
                <!-- <form action="{{ route('userprofile.update') }}" method="POST"> -->
                    <!-- @method('PATCH')
                    @csrf -->
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ $user->email }}" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone number"
                                value="{{ $user->phone }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter address"
                                value="{{ $user->address }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter new password">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                        </div>

                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
@endsection
