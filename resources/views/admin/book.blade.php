<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- Link to Font Awesome CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> <!-- Full version of jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Booking Data</h3>
                <a href="{{ url('/admin/addbook')}}">+ Add Booking Data</a>
                <br />
                <br />
                <p>Search Transaction ID:</p>
                <form action="/admin/search" method="GET">
                    <input type="text" name="search" placeholder="Transaction ID" value="{{ old('search') }}">
                    <input type="submit" value="Search">
                </form>

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Service</th>
                        <th>Hair Artist</th>
                        <th>Schedule</th>
                        <th>Total Price</th>
                        <th>Option</th>
                    </tr>
                    @foreach ($transaction as $trn)
                    <tr>
                        <td>{{ $trn->id }}</td>
                        <td>{{ $trn->user->name }}</td>
                        <td>{{ $trn->service->name }}</td>
                        <td>{{ $trn->kapster->name }}</td>
                        <td>{{ $trn->jadwal }}</td>
                        <td>{{ $trn->total_price }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detailModal" data-id="{{ $trn->id }}">Detail</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <br>
                Halaman : {{$transaction->currentPage()}} <br>
                Jumlah Data : {{$transaction->total()}} <br>
                Data Per Halaman : {{$transaction->perPage()}} <br>
                {{$transaction->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Booking Detail</h5>
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
                            <button type="button" class="btn btn-success btn-block">Accept</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger btn-block">Decline</button>
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

            // AJAX request to get the detail data
            $.ajax({
                url: '/admin/book/' + id, // URL to fetch detail data
                method: 'GET',
                success: function (data) {
                    var modal = $('#detailModal');
                    modal.find('.modal-body').html(data); // Load the data into the modal body
                },
                error: function () {
                    var modal = $('#detailModal');
                    modal.find('.modal-body').html('<p>Error retrieving booking details.</p>'); // Error handling
                }
            });
        });
        $('#detailModal').on('hidden.bs.modal', function (e) {
        // Merefresh halaman
        location.reload();
    });
    </script>
</body>

</html>
