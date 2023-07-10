<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data Packages</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    @include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Packages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/packages">Data Packages</a></li>
          <li class="breadcrumb-item active">Detail Packages</li>
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
                <h5 class="card-title" style="text-align: center">Detail Packages</h5>

                <div class="">
                    @foreach ($data as $d)
                        <h5 class="hd-customer">Packages Name</h5>
                            <span class="s-customer">
                                {{ $d->name }}
                            </span>

                        <h5 class="hd-customer">Speed</h5>
                            <span class="s-customer">
                                {{ $d->speed }}
                            </span>

                        <h5 class="hd-customer">Package Price</h5>
                            <span class="s-customer">
                                {{ $d->price }}
                            </span>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

  </main><!-- End #main -->

  @include('layouts.footer')

</body>

</html>
