<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .table-bordered thead th {
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Payment</h3>
                <br />
                <p>Search Payments:</p>

                <form action="/admin/search" method="GET" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Search Payment ID" value="{{ old('search') }}">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Kapster Name</th>
                            <th>Service Name</th>
                            <th>Service Price</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->kapster->name }}</td>
                            <td>{{ $transaction->service->name }}</td>
                            <td>{{ $transaction->service->price }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detailModal" data-id="{{ $transaction->id }}">Detail</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination justify-content-center">
                    {{ $transactions->links('pagination::bootstrap-5') }}
                </div>
                <br>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Payment Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded here -->
                </div>
                <div class="modal-footer justify-content-start">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-success btn-block">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes

            console.log('Fetching details for ID:', id); // Debugging

            // AJAX request to get the detail data
            $.ajax({
                url: '/admin/payment/' + id, // URL to fetch detail data
                method: 'GET',
                success: function (data) {
                    console.log('Data received:', data); // Debugging
                    var modal = $('#detailModal');
                    modal.find('.modal-body').html(data); // Load the data into the modal body
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching details:', status, error); // Debugging
                    var modal = $('#detailModal');
                    modal.find('.modal-body').html('<p>Error retrieving payment details.</p>'); // Error handling
                }
            });
        });

        $('#detailModal').on('hidden.bs.modal', function (e) {
            location.reload(); // Refresh the page
        });
    </script>
</body>

</html>
