<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">Sales Data</h5>

            <div class="d-flex align-items-center">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 20%">No</th>
                        <th scope="col" style="width: 20%">Name</th>
                        <th scope="col" style="width: 20%">Email</th>
                        <th scope="col" style="width: 20%">Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach ($sales as $d)

                        <tr>
                            <td>{{ $i++ }}</td>
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

    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">Packages Data</h5>

            <div class="d-flex align-items-center">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 20%">No</th>
                        <th scope="col" style="width: 20%">Name</th>
                        <th scope="col" style="width: 20%">Speed</th>
                        <th scope="col" style="width: 20%">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php $j=1 @endphp
                        @foreach ($packages as $d)

                        <tr>
                            <td>{{ $j++ }}</td>
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

        <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center">Customers Data</h5>

                <div class="d-flex align-items-center">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 20%">No</th>
                            <th scope="col" style="width: 20%">Name</th>
                            <th scope="col" style="width: 20%">Email</th>
                            <th scope="col" style="width: 20%">Phone Number</th>
                            <th scope="col" style="width: 15%">Address</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $k=1 @endphp
                            @foreach ($customers as $d)

                            <tr>
                                <td>{{ $k++ }}</td>
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

</body>
</html>
