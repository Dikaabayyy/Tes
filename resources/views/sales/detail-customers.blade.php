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
                                <h5 class="hd-customer">Customers Name</h5>
                                <span class="s-customer">
                                    {{ $d->name }}
                                </span>

                                <h5 class="hd-customer">Email</h5>
                                <span class="s-customer">
                                    {{ $d->email }}
                                </span>

                                <h5 class="hd-customer">Phone Number</h5>
                                <span class="s-customer">
                                    {{ $d->phone_number }}
                                </span>
                            </div>

                            <div class="col">
                                <h5 class="hd-customer">Address</h5>
                                <span class="s-customer">
                                    {{ $d->address }}
                                </span>

                                <h5 class="hd-customer">ID Image</h5>
                                <img src="{{ asset('storage/image/'.$d->id_image) }}" class="id-img" alt="">
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="card-footer">
                        <a href="/customers" class="btn btn-secondary">Back</a>
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
