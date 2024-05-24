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
 
	<form action="/student/editsave" method="post">
		{{ csrf_field() }}
		ID<input type="show" name="id" value="{{ $kapster->id }}"> <br/>
		Hair Artist Name <input type="text" name="name" value="{{ $kapster->name }}" required="required"> <br/>
		Place <textarea name="place" required="required">{{ $kapster->place }}</textarea> <br/>
        Schedule <input type="schedule" name="notelp" value="{{ $kapster->schedule }}" required="required"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
		
 
</body>
</html>