<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    @include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/sales">Home</a></li>
          <li class="breadcrumb-item"><a href="/customers">Data Customers</a></li>
          <li class="breadcrumb-item active">Detail Customers</li>
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
                  <h5 class="card-title" style="text-align: center">Detail Customers</h5>

                        @foreach ($data as $d)
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="/update-customers" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="slug" value="{{ $d->slug }}" required>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Customers Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $d->name }}" style="width: 75%" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $d->email }}" style="width: 75%" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $d->phone_number }}" style="width: 75%" oninput="numberOnly(this.id);" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea type="text" name="address" class="form-control" id="address" style="width: 75%" required> {{ $d->address }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <img src="{{ asset('storage/image/'.$d->id_image) }}" class="form-label id-img" alt="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_image" class="form-label">ID Image</label>
                                        <input type="file" name="id_image" class="form-control" id="" style="width: 75%">
                                    </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit Customers</button>
                        </form>
                        <a href="/customers" type="button" class="btn btn-secondary">Back</a>
                    </div>
                  </div>
                </div>

              </div>


      </div>
    </section>

  </main><!-- End #main -->

  @include('layouts.footer')

</body>

</html>
