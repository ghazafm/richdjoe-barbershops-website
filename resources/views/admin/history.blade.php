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

#HistoryTable th,
#HistoryTable td {
    text-align: center;
    vertical-align: middle;
}

    </style>
        
</head>


<body>
    @include('admin.header')
    @include('admin.sidebar')


    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>History Data</h3>
                <br />
                <p>Search History:</p>
                <form action="/admin/search"class="form-inline mb-3" method="GET">
                    <input type="text" name="search"class="form-control mr-2" placeholder="Hair Artist ID"
                        value="{{ old('search') }}">
                    <input type="submit" class="btn btn-primary" value="Search">
                </form>

                <table id="HistoryTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="sortable text-center" data-column="id">ID</th>
                            <th class="sortable text-center" data-column="userid">User ID</th>
                            <th class="sortable text-center" data-column="username">Username</th>
                            <th class="sortable text-center" data-column="email">Email</th>
                            <th class="sortable text-center" data-column="hairartistid">Hair Artist ID</th>
                            <th class="sortable text-center" data-column="hairartist">Hair Artist</th>
                            <th class="sortable text-center" data-column="serviceid">Service ID</th>
                            <th class="sortable text-center" data-column="service">Service</th>
                            <th class="sortable text-center" data-column="schedule">Schedule</th>
                            <th class="sortable text-center" data-column="totalprice">Total Price</th>
                            <th class="sortable text-center" data-column="servicestatus">Service Status</th>
                            <th class="sortable text-center" data-column="paymentstatus">Payment Status</th>
                        </tr>
                    </thead>

                    @foreach ($transactions as $tlog)
                        <tr>
                            <td class="text-center">{{ $tlog->id }}</td>
                            <td class="text-center">{{ $tlog->user_id }}</td>
                            <td class="text-center">{{ $tlog->user_name }}</td>
                            <td class="text-center">{{ $tlog->user_email }}</td>
                            <td class="text-center">{{ $tlog->kapster_id }}</td>
                            <td class="text-center">{{ $tlog->kapster_name }}</td>
                            <td class="text-center">{{ $tlog->service_id }}</td>
                            <td class="text-center">{{ $tlog->service_name }}</td>
                            <td class="text-center">{{ $tlog->schedule }}</td>
                            <td class="text-center">{{ $tlog->total_price }}</td>
                            <td class="text-center">{{ $tlog->service_status }}</td>
                            <td class="text-center">{{ $tlog->payment_status }}</td>
                        </tr>
                    @endforeach
                </table>

                <br>
                Jumlah Data : {{$transactionLogsCount}} <br>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const table = document.getElementById("HistoryTable");
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
                        if (column === "id" || column === "userid" || column === "hairartistid" || column === "serviceid") {
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
                return headers.findIndex(header => header.dataset.column ===columnName);
}
});
</script>
</body>


</html>

