<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
            .table thead th {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .table {
            table-layout: fixed;
            width: 100%;
        }

        .table th,
        .table td {
            overflow: hidden;
            text-overflow: ellipsis;
        }

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
                <h3>Payment Data</h3>
                <br />
                <p>Search Payment:</p>

                <form action="/admin/payment/payment/search" method="GET" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Search Payment"
                        value="{{ old('search') }}">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
                <p>Filter:</p>
                <form action="/admin/payment/payment/filter" method="GET" class="form-inline mb-3">
                    <label for="date_from">Date From:</label>
                    <input type="date" id="date_from" name="date_from" class="form-control mx-2"
                        placeholder="yyyy-mm-dd">

                    <label for="date_to">Date To:</label>
                    <input type="date" id="date_to" name="date_to" class="form-control mx-2" placeholder="yyyy-mm-dd">

                    <label for="price_from">Price From:</label>
                    <input type="number" id="price_from" name="price_from" class="form-control mx-2"
                        placeholder="Price From" step="5000" min="0">

                    <label for="price_to">Price To:</label>
                    <input type="number" id="price_to" name="price_to" class="form-control mx-2" placeholder="Price To"
                        step="5000" min="0">

                    <input type="submit" class="btn btn-secondary" value="Filter">
                </form>


                <table id="transactionTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="sortable text-center" data-column="id">ID</th>
                            <th class="sortable text-center" data-column="username">Username</th>
                            <th class="sortable text-center" data-column="service">Service</th>
                            <th class="sortable text-center" data-column="kapster">Hair Artist</th>
                            <th class="sortable text-center" data-column="schedule">Schedule</th>
                            <th class="sortable text-center" data-column="price">Total Price</th>

                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="text-center">{{ $transaction->id }}</td>
                                <td class="text-center">{{ $transaction->user->name }}</td>
                                <td class="text-center">{{ $transaction->service->name }}</td>
                                <td class="text-center">{{ $transaction->kapster->name }}</td>
                                <td class="text-center">{{ $transaction->schedule }}</td>
                                <td class="text-center">{{ number_format($transaction->total_price, 0, ',', '.') }}</td>

                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detailModal"
                                        data-id="{{ $transaction->id }}">Detail</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <br>
                Jumlah Data : {{$paymentCount}} <br>

            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
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
                            <form id="confirmForm" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block">Confirm</button>
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        <form id="declineForm" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block">Cancel</button>
                        </form>
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

            // Set the action attribute for the forms
            $('#confirmForm').attr('action', '/admin/payment/verify/' + id);
            $('#declineForm').attr('action', '/admin/payment/decline/' + id);

            // Set the action attribute for the forms
            $('#confirmForm').attr('action', '/admin/payment/verify/' + id);
            $('#declineForm').attr('action', '/admin/payment/decline/' + id);

            // AJAX request to get the detail data
            $.ajax({
                url: '/admin/payment/' + id, // URL to fetch detail data
                method: 'GET',
                success: function (data) {
                    var modal = $('#detailModal');
                    modal.find('.modal-body').html(data); // Load the data into the modal body
                },
                error: function () {
                    var modal = $('#detailModal');
                    modal.find('.modal-body').html('<p>Error retrieving payment details.</p>'); // Error handling
                }
            });
        });


        $('#detailModal').on('hidden.bs.modal', function (e) {
            // Merefresh halaman
            location.reload();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const table = document.getElementById("transactionTable");
            const headers = table.querySelectorAll("th.sortable");

            headers.forEach(function (header) {
                header.addEventListener("click", function () {
                    const column = this.dataset.column;
                    const isAscending = this.classList.contains("ascending");
                    const sortedRows = Array.from(table.querySelectorAll("tbody tr"));

                    sortedRows.sort(function (a, b) {
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
                    sortedRows.forEach(function (row) {
                        tbody.appendChild(row);
                    });

                    headers.forEach(function (header) {
                        header.classList.remove("ascending", "descending");
                        // Remove any existing arrow emojis
                        header.innerHTML = header.innerHTML.replace("↓", "").replace("↑", "");
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