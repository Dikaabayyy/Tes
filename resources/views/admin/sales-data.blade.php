<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sales Data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    @include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sales Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Sales Data</li>
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
            <h5 class="card-title" style="text-align: center">Sales Data</h5>
              <div class="d-flex align-items-center">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" style="width: 20%">Name</th>
                          <th scope="col" style="width: 20%">Email</th>
                          <th scope="col" style="width: 20%">Created At</th>
                          <th scope="col" style="width: 15%">Options</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $d)

                          <tr>
                              <td>{{ $d->name }}</td>
                              <td>{{ $d->email }}</td>
                              <td>{{ $d->created_at }}</td>
                              <td>
                                  <form action="{{  url('/delete-packages-'.$d->slug) }}" method="POST" enctype="multipart/form-data" class="d-inline" onsubmit="return confirm('Are you sure want to delete this data?')">
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
