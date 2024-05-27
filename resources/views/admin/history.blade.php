<!DOCTYPE html>
<html lang="en">


<head>
    @include('admin.css')
    <style>
        /* Custom CSS to reduce the thickness of the top border in the table */
        .table-bordered thead th {
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;

        }
    </style>
        }
    </style>
</head>


<body>
    @include('admin.header')
    @include('admin.sidebar')


    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Hair Artist Data</h3>
                <a href="/admin/hairartist/add">+ Add Hair Artist Data</a>
                <br />
                <br />
                <p>Search Hair Artist ID:</p>
                <form action="/admin/search"class="form-inline mb-3" method="GET">
                    <input type="text" name="search"class="form-control mr-2" placeholder="Hair Artist ID"
                        value="{{ old('search') }}">
                    <input type="text" name="search"class="form-control mr-2" placeholder="Hair Artist ID"
                        value="{{ old('search') }}">
                    <input type="submit" class="btn btn-primary" value="Search">
                </form>

                <table id="hairArtistTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Hair Artist ID</th>
                            <th>Hair Artist</th>
                            <th>Service ID</th>
                            <th>Service</th>
                            <th>Schedule</th>
                            <th>Total Price</th>
                            <th>Service Status</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>

                    @foreach ($transactions as $tlog)
                        <tr>
                            <td>{{ $tlog->id }}</td>
                            <td>{{ $tlog->user_id }}</td>
                            <td>{{ $tlog->user_name }}</td>
                            <td>{{ $tlog->user_email }}</td>
                            <td>{{ $tlog->kapster_id }}</td>
                            <td>{{ $tlog->kapster_name }}</td>
                            <td>{{ $tlog->service_id }}</td>
                            <td>{{ $tlog->service_name }}</td>
                            <td>{{ $tlog->schedule }}</td>
                            <td>{{ $tlog->total_price }}</td>
                            <td>{{ $tlog->service_status }}</td>
                            <td>{{ $tlog->payment_status }}</td>
                        </tr>
                    @endforeach
                </table>
                

                <br>
                {{-- Jumlah Data : {{ $kapsters->total() }} <br> --}}

            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const table = document.getElementById("hairArtistTable");
            const headers = table.querySelectorAll("th.sortable");

            headers.forEach(function(header) {
                header.addEventListener("click", function() {
                    const column = this.dataset.column;
                    const isAscending = this.classList.contains("ascending");
                    const sortedRows = Array.from(table.querySelectorAll("tbody tr"));

                    sortedRows.sort(function(a, b) {
                        let aValue = getValue(a, column);
                        let bValue = getValue(b, column);

                        // For specific columns (ID), convert the values to numbers
                        if (column === "id") {
                            aValue = parseInt(aValue);
                            bValue = parseInt(bValue);
                            return isAscending ? aValue - bValue : bValue - aValue;
                        }

                        // For other columns, perform alphabetical sorting using localeCompare
                        return isAscending ? aValue.localeCompare(bValue) : bValue
                            .localeCompare(aValue);
                    });

                    const tbody = table.querySelector("tbody");
                    tbody.innerHTML = "";
                    sortedRows.forEach(function(row) {
                        tbody.appendChild(row);
                    });

                    headers.forEach(function(header) {
                        header.classList.remove("ascending", "descending");
                        // Remove any existing arrow emojis
                        header.innerHTML = header.innerHTML.replace("↓", "").replace("↑",
                            "");
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

