<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    @include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/profile">Detail Profile</a></li>
          <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif

    <section class="section dashboard">

        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center">Edit Profile</h5>

                <div class="row">
                    <div class="col">

                        <form action="/update-profile" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="mb-3">
                            <h5 class="hd-customer">Username</h5>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" style="width: 75%" required>
                        </div>

                        <div class="mb-3">
                            <h5 class="hd-customer">Name</h5>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" style="width: 75%" required>
                        </div>

                        <div class="mb-3">
                            <h5 class="hd-customer">Email</h5>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" style="width: 75%" required>
                        </div>

                    </div>
                    <div class="col">

                        <h5 class="hd-customer">Profile Picture</h5>
                        <img src="{{ asset('public/avatar/'.auth()->user()->avatar) }}" class="id-img" alt=""><br>

                        <div class="mt-3">
                            <input type="file" name="avatar" class="form-control" id="" style="width: 75%">
                        </div>
                    </div>

                </div>

            </div>
            <div class="card-footer pt-0">
                <button class="btn btn-primary mt-3" type="submit" >
                    Save Changes
                </button>
            </form>
            <a class="btn btn-secondary mt-3" type="button" href="/profile">
                Back
            </a>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

  @include('layouts.footer')

</body>

</html>
