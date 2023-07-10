<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    @include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Detail Profile</li>
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
                <h5 class="card-title" style="text-align: center">Detail Profile</h5>

                <div class="row">
                    <div class="col">

                        <h5 class="hd-customer"> Username</h5>
                            <span class="s-customer">
                                {{ auth()->user()->username }}
                            </span>

                        <h5 class="hd-customer">Name</h5>
                            <span class="s-customer">
                                {{ auth()->user()->name }}
                            </span>

                        <h5 class="hd-customer">Email</h5>
                            <span class="s-customer">
                                {{ auth()->user()->email }}
                            </span>

                    </div>
                    <div class="col">

                        <h5 class="hd-customer">Profile Picture</h5>
                        <img src="{{ asset('public/avatar/'.auth()->user()->avatar) }}" class="id-img" alt=""><br>

                    </div>


                </div>

            </div>
            <div class="card-footer pt-0">
                <a class="btn btn-primary mt-3" type="button" href="/edit-profile">
                    Edit Profile
                </a>
                <a class="btn btn-secondary mt-3" type="button" href="/edit-password">
                    Change Password
                </a>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

  @include('layouts.footer')

</body>

</html>
