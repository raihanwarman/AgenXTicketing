<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
            crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-8" style="margin-top:20px;">
                <h4>Konfirmasi Check-In</h4>
                <hr>
                <table class="table">
                    <thead>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Nomor Handphone</th>
                        <th>Status Chek-In</th>
                    </thead>
                    <tbody>
                        @foreach ($auth as $prnt)
                        <tr>
                            <td>{{ $prnt->NIK }}</td>
                            <td>{{ $prnt->Nama }}</td>
                            <td>{{ $prnt->NoHP }}</td>
                            @if ($prnt->Status)
                                <td>Sudah Check - In</td>
                            @else
                                <td>Belum Check - In</td>
                            @endif
                        </tr>
                        <a href ='confirm-checkin/{{ $prnt->NIK }}'>Check-In</a>
                        @endforeach
                </table> 
               <!-- <a href="confirm-checkin/".$auth> Check-In</a> -->
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
        crossorigin="anonymous">
</script>

</html>
