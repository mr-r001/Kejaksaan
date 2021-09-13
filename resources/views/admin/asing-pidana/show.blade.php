
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" />
    <style>
        @page {
            size: A4 landscape;
        }
        
        table,
        div,
        span {
            font-size: 14px;
        }
    </style>

    <title>Labul Intel</title>
</head>

<body class="A4 landscape">
    <section class="sheet padding-10mm">
        <u><span>KEJAKSAAN PAGAR ALAM </span></u>
        <br />
        <br />
        <h6 class="text-center py-3">
            LAPORAN BULANAN <br /> WARGA NEGARA ASING YANG TERLIBAT PERKARA TINDAK PIDANA<br /> BULAN {{ $month }} TAHUN {{ $year }}
        </h6>
        <br />

        <div class="tabel-responsive">
            <table class="table table-sm table-bordered">
                <thead class="table">
                    <tr class="text-center text-wrap" style="width: 8rem">
                        <th rowspan="2">No</th>
                        <th rowspan="2">NAMA LENGKAP</th>
                        <th rowspan="2">ASAL NEGARA</th>
                        <th rowspan="2">TINDAK PIDANA</th>
                        <th colspan="4">
                            TAHAPAN <br /> (PIHAK YG MENANGANI)
                        </th>
                        <th rowspan="2">LAMA PIDANA PENJARA</th>
                        <th rowspan="2">KETERANGAN</th>
                    </tr>
                    <tr>
                        <th>DIK</th>
                        <th>PRATUT</th>
                        <th>TUT</th>
                        <th>EXSEKUSI</th>
                    </tr>
                    <tr height="5px" class="text-center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                </thead>
                @foreach ( $data as $item )
                <tbody>
                    <tr height="40px">
                        <td></td>
                        <td>{{ $item->biodata->name  }}</td>
                        <td>{{ $item->biodata->country->name  }}</td>
                        <td>{{ $item->tindak_pidana  }}</td>
                        <td>{{ $item->tahapan_dik  }}</td>
                        <td>{{ $item->tahapan_pratut  }}</td>
                        <td>{{ $item->tahapan_tut  }}</td>
                        <td>{{ $item->tahapan_eksekusi  }}</td>
                        <td>{{ $item->lama_pidana  }}</td>
                        <td>{{ $item->keterangan  }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

        <div class="container">
            <div class="tabel-responsive">
                <table class="table table-sm table-borderless">
                    <div class="row">
                        <div class="col-md-4 offset-md-7 text-center py-5 mb-5">
                            {{ $jabatan }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-7 text-center">
                           {{ $nama }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-7 text-center">{{ $nip }}</div>
                    </div>
                </table>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js " integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js " integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/ " crossorigin="anonymous "></script>
    -->
</body>

</html>