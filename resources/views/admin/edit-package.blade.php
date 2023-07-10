<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Packages</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    @include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Packages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/packages">Data Packages</a></li>
          <li class="breadcrumb-item active">Edit Packages</li>
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
                <h5 class="card-title" style="text-align: center">Edit Packages</h5>

                    @foreach ($data as $d)
                        <form method="POST" action="/update-packages" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="slug" value="{{ $d->slug }}" required>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Packages Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $d->name }}" style="width: 75%" required>
                                </div>

                                <div class="mb-3">
                                    <label for="speed" class="form-label">Speed</label>
                                    <input type="text" name="speed" class="form-control" id="speed" value="{{ $d->speed }}" style="width: 75%" oninput="numberOnly(this.id);" required>
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Package Price</label>
                                    <input type="text" name="price" class="form-control" id="price" value="{{ $d->price }}" style="width: 75%" oninput="numberOnly(this.id);" required>
                                </div>

                    @endforeach
                        </div>

                        <div class="card-footer" style="text-align: end">
                            <button type="submit" class="btn btn-primary">Edit Packages</button>
                        </form>

                        <a href="/packages" type="button" class="btn btn-secondary">Back</a>
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
