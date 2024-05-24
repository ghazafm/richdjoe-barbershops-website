<!DOCTYPE html>
<html>
<head>
    <title>Dashboard mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <h3>Data mahasiswa</h3>

        <a href="{{ url('/admin/book') }}">Kembali</a>
        
        <br/>
        <br/>

        <form action="{{ url('/admin/book/addsave') }}" method="post">
			@csrf
			<div class="mb-3">
				<label for="kapster_id" class="form-label">Kapster ID:</label>
				<input type="text" id="kapster_id" name="kapster_id" class="form-control" required="required"  >
			</div>
			<div class="mb-3">
				<label for="service_id" class="form-label">Service ID:</label>
				<input type="text" id="service_id" name="service_id" class="form-control" required="required" >
			</div>
			<button type="submit" class="btn btn-primary">Simpan Data</button>
		</form>
		
    </div>
</body>
</html>
