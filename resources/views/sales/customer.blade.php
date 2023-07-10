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
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Data Customer</li>
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
                  <h5 class="card-title" style="text-align: center">Registered Customers</h5>

                    <div class="d-flex align-items-center">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" style="width: 30%">Name</th>
                                <th scope="col" style="width: 20%">Email</th>
                                <th scope="col" style="width: 20%">Phone Number</th>
                                <th scope="col" style="width: 15%">Options</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)

                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->phone_number }}</td>
                                    <td>
                                        <a href="/detail-customers-{{ $d->slug }}" type="button"><i class="bi bi-eye svg_cs"></i></a>
                                        <a href="/edit-customers-{{ $d->slug }}" type="button"><i class="bi bi-pencil-square svg_ce"></i></a>

                                        <form action="{{  url('/delete-customers-'.$d->slug) }}" method="POST" enctype="multipart/form-data" class="d-inline" onsubmit="return confirm('Are you sure want to delete this data?')">
                                            @csrf
                                            <button type="submit" class="delC"><i class="bi bi-trash svg_cd"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                          </table>

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
