<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check In Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
            crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Check-in Tiket Pengunjung</h4>
                <hr>
                <form action="{{route('search-checkin')}}" method="post">
                    @if(Session::has('berhasil'))
                    <div class="alert alert-success">{{Session::get('berhasil')}}</div>
                    @endif
                    @if(Session::has('gagal'))
                    <div class="alert alert-success">{{Session::get('gagal')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" value="{{old('nik')}}">
                        <span class="text-danger">@error("nik") {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <hr>
                        <button class="btn btn-block btn-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            <a href="sudahcheckin"> pengunjung yang sudah check-in</a>
            <a href="belumcheckin"> pengunjung yang belum check-in</a>
            <a href="dbAgenX"> daftar semua pengunjung</a>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
        crossorigin="anonymous">
</script>

</html>
