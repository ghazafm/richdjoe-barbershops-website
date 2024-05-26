<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- Link to Font Awesome CSS -->
    <style>
        /* Custom CSS to reduce the thickness of the top border in the table */
        .table-bordered thead th {
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }
    </style>
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
                <a href="{{ url('/admin/book/add') }}">+ Add Booking Data</a>
                <br />
                <br />
                <p>Search Transaction ID:</p>
                <form action="/admin/book/book/search" method="GET" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Transaction ID"
                        value="{{ old('search') }}">
                    <input type="submit" class="btn btn-primary" value="search">
                </form>
                

                <table id="transactionTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="sortable text-center" data-column="id">ID</th>
                            <th class="sortable text-center" data-column="username">Username</th>
                            <th class="sortable text-center" data-column="service">Service</th>
                            <th class="sortable text-center" data-column="hair_artist">Hair Artist</th>
                            <th class="sortable text-center" data-column="schedule">Schedule</th>
                            <th class="sortable text-center" data-column="total_price">Total Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $trn)
                            <tr>
                                <td class="text-center">{{ $trn->id }}</td>
                                <td class="text-center">{{ $trn->user->name }}</td>
                                <td class="text-center">{{ $trn->service->name }}</td>
                                <td class="text-center">{{ $trn->kapster->name }}</td>
                                <td class="text-center">{{ $trn->schedule }}</td>
                                <td class="text-center">{{ $trn->total_price }}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm detail-btn" data-toggle="modal"
                                        data-target="#detailModal" data-id="{{ $trn->id }}">Detail</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                Jumlah Data : {{ $transactionCount }} <br>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
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
                            <form id="verifyForm" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block">Verify</button>
                            </form>
                        </div>
                        <div class="col">
                            <form id="declineForm" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block">Decline</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#detailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes

            // Set the action attribute for the forms
            $('#verifyForm').attr('action', '/admin/book/verify/' + id);
            $('#declineForm').attr('action', '/admin/book/decline/' + id);

            // AJAX request to get the detail data
            $.ajax({
                url: '/admin/book/' + id, // URL to fetch detail data
                method: 'GET',
                success: function(data) {
                    var modal = $('#detailModal');
                    modal.find('.modal-body').html(data); // Load the data into the modal body
                },
                error: function() {
                    var modal = $('#detailModal');
                    modal.find('.modal-body').html(
                    '<p>Error retrieving booking details.</p>'); // Error handling
                }
            });
        });

        $('#detailModal').on('hidden.bs.modal', function(e) {
            // Merefresh halaman
            location.reload();
        });
    </script>
     <script>
        // JavaScript code to handle sorting when column headers are clicked
        document.addEventListener("DOMContentLoaded", function() {
            const table = document.getElementById("transactionTable");
            const headers = table.querySelectorAll("th.sortable");

            headers.forEach(function(header) {
                header.addEventListener("click", function() {
                    const column = this.dataset.column;
                    const isAscending = this.classList.contains("ascending");
                    const sortedRows = Array.from(table.querySelectorAll("tbody tr"));

                    sortedRows.sort(function(a, b) {
                        let aValue = getValue(a, column);
                        let bValue = getValue(b, column);

                        // Convert the values to numbers for the ID column
                        if (column === "id") {
                            aValue = parseInt(aValue);
                            bValue = parseInt(bValue);
                            return isAscending ? aValue - bValue : bValue - aValue;
                        }

                        // For other columns, perform alphabetical sorting
                        return isAscending ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
                    });

                    const tbody = table.querySelector("tbody");
                    tbody.innerHTML = "";
                    sortedRows.forEach(function(row) {
                        tbody.appendChild(row);
                    });

                    headers.forEach(function(header) {
                        header.classList.remove("ascending", "descending");
                        // Remove any existing arrow emojis
                        header.innerHTML = header.innerHTML.replace(" ↓", "").replace(" ↑", "");
                    });

                    // Add arrow emoji to indicate sorting order
                    this.innerHTML += isAscending ? " ↑" : " ↓";

                    this.classList.toggle(isAscending ? "descending" : "ascending");
                });
            });

            function getValue(row, column) {
                const columnIndex = getColumnIndex(column);
                return row.cells[columnIndex].textContent.trim();
            }

            function getColumnIndex(columnName) {
                const headers = Array.from(table.querySelectorAll("thead th"));
                return headers.findIndex(header => header.dataset.column === columnName);
            }
        });
    </script>
</body>

</html>