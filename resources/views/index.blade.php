<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <title>Binus Nilai Mahasiswa</title>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Binus Nilai Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#">Nilai Mahasiswa <span
                            class="sr-only">(current)</span></a>
                </div>
            </div>
        </div>
    </nav>
</head>

<body>
    <div class="container mt-5">
        <div class="row mb-3">
            <button type="button" class="btn btn-dark ml-auto" data-toggle="modal" data-target="#modal">Tambah</button>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/tambahnilaimahasiswa">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="quis">Nilai Quis</label>
                                <input type="text" class="form-control" id="quis" name="quis">
                            </div>
                            <div class="form-group">
                                <label for="tugas">Nilai Tugas</label>
                                <input type="text" class="form-control" id="tugas" name="tugas">
                            </div>
                            <div class="form-group">
                                <label for="absensi">Nilai Absensi</label>
                                <input type="text" class="form-control" id="absensi" name="absensi">
                            </div>
                            <div class="form-group">
                                <label for="praktek">Nilai Praktek</label>
                                <input type="text" class="form-control" id="praktek" name="praktek">
                            </div>
                            <div class="form-group">
                                <label for="uas">Nilai UAS</label>
                                <input type="text" class="form-control" id="uas" name="uas">
                            </div>
                            <div class="form-group">
                                <label for="ratanilai">Rata-rata Nilai</label>
                                <input type="text" class="form-control" id="ratanilai" name="ratanilai" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot</label>
                                <input type="text" class="form-control" id="bobot" name="bobot" readonly="">
                            </div>
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <table class="table table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nilai Quis</th>
                        <th scope="col">Nilai Tugas</th>
                        <th scope="col">Nilai Absensi</th>
                        <th scope="col">Nilai Praktek</th>
                        <th scope="col">Nilai UAS</th>
                        <th scope="col">Rata-rata Nilai</th>
                        <th scope="col">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilaimahasiswa as $nilai)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $nilai->nama }}</td>
                        <td>{{ $nilai->quis }}</td>
                        <td>{{ $nilai->tugas }}</td>
                        <td>{{ $nilai->absensi }}</td>
                        <td>{{ $nilai->praktek }}</td>
                        <td>{{ $nilai->uas }}</td>
                        <td>{{ $nilai->ratanilai }}</td>
                        <td>{{ $nilai->bobot }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

    </script>
    {{-- Hitung Rata-rata Nilai --}}
    <script type="text/javascript">
        $(document).ready(function () {
            $("#quis, #tugas, #absensi, #praktek, #uas").keyup(function () {
                var quis = $("#quis").val();
                var tugas = $("#tugas").val();
                var absensi = $("#absensi").val();
                var praktek = $("#praktek").val();
                var uas = $("#uas").val();

                var ratanilai = (parseInt(quis) + parseInt(tugas) + parseInt(absensi) + parseInt(
                    praktek) + parseInt(uas)) / 5;

                $("#ratanilai").val(ratanilai);

                function hitungBobot() {

                    if (ratanilai >= 85 && ratanilai <= 100) {
                        nilai = 'A';
                    } else if (ratanilai >= 75 && ratanilai <= 85) {
                        nilai = 'B';
                    } else if (ratanilai >= 65 && ratanilai <= 75) {
                        nilai = 'C';
                    } else {
                        nilai = 'D';
                    }
                    return nilai;
                }

                var bobot = hitungBobot();

                $("#bobot").val(bobot);
            });
        });

    </script>
</body>

</html>
