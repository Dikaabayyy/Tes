<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Report Data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    @include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Report Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Report Data</li>
        </ol>
      </nav>
        <a class="btn btn-secondary" href="{{ URL::to('/print') }}">Export to PDF</a>
    </div><!-- End Page Title -->

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif

    <section class="section dashboard">
        {{-- Sales Data --}}
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center">Sales Data</h5>

              <div class="d-flex align-items-center">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" style="width: 20%">Name</th>
                          <th scope="col" style="width: 20%">Email</th>
                          <th scope="col" style="width: 20%">Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($datauser as $d)

                          <tr>
                              <td>{{ $d->name }}</td>
                              <td>{{ $d->email }}</td>
                              <td>{{ $d->created_at }}</td>
                          </tr>

                          @endforeach
                      </tbody>
                    </table>

              </div>
            </div>
          </div>

          {{-- Package Data --}}
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center">Packages Data</h5>

                <div class="d-flex align-items-center">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 20%">Name</th>
                            <th scope="col" style="width: 20%">Speed</th>
                            <th scope="col" style="width: 20%">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($datapackages as $d)

                            <tr>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->speed }} Mbps</td>
                                <td>Rp. {{ $d->price }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                      </table>

                </div>
              </div>
            </div>

            {{-- Customers Data --}}
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center">Customers Data</h5>

                <div class="d-flex align-items-center">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 20%">Name</th>
                            <th scope="col" style="width: 20%">Email</th>
                            <th scope="col" style="width: 20%">Phone Number</th>
                            <th scope="col" style="width: 15%">Address</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($datacustomers as $d)

                            <tr>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->phone_number }}</td>
                                <td>{{ $d->address }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                      </table>

                </div>
              </div>
            </div>


    </div>
    </section>

  </main><!-- End #main -->

  @include('layouts.footer')

</body>

</html>
