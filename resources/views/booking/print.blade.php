<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Kartu Booking Hotel Insitu Wikrama</h1>
        <hr>
        <div class="d-flex justify-content-center">
            @foreach ($booking as $item)
            <div class="card border-dark mb-3" style="max-width: 20rem;">
                <div class="card-header text-center">{{ $item->status }}</div>
                <div class="card-body">
                    <h5 class="card-title text-center">
                        {{ $item->tipeKamars->nama }} x {{ $item->jml_kamar }}
                    </h5>
                    <h4 class="card-text">{{ $item->nama_pemesan }}</h4>
                    <p class="card-text">Tanggal Check-in : {{ $item->tgl_checkin }}</p>
                    <p class="card-text">Tanggal Check-in : {{ $item->tgl_checkout }}</p>
                    <p class="card-text">Total biaya : @rupiah($item->total)</p>
                    <p class="card-text">Pay by : {{ $item->PayBy }}</p>
                    <strong class="card-text">Booking ID : {{ $item->kode_booking }}</strong>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script type="text/javascript">
        window.print();
            window.onafterprint = back;

            function back() {
                window.history.back();
            }
    </script>
</body>

</html>
