<!DOCTYPE html>
<html>
<head>
	<title>Dashboard mahasiswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
 
	<h2>Dashboard</a></h2>
	<h3>Ubah data mahasiswa</h3>
 
	<a href="/student"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($mahasiswa as $mhs)
	<form action="/student/editsave" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="nim" value="{{ $mhs->nim }}"> <br/>
		Nama <input type="text" name="nama" value="{{ $mhs->nama }}" required="required"> <br/>
		Alamat <textarea name="alamat" required="required">{{ $mhs->alamat }}</textarea> <br/>
        No Telp <input type="text" name="notelp" value="{{ $mhs->notelp }}" required="required"> <br/>
		IPK <input type="number" name="ipk" min="0" max="4" step="0.01" value="{{ $mhs->ipk }}" required="required"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>
</html>