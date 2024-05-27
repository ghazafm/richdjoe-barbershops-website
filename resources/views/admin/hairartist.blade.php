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
                <form action="/admin/hairartist/search"class="form-inline mb-3" method="GET">
                    <input type="text" name="search"class="form-control mr-2" placeholder="Hair Artist ID"
                        value="{{ old('search') }}">
                    <input type="submit" class="btn btn-primary" value="Search">
                </form>

                <table id="hairArtistTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="sortable text-center" data-column="id">ID</th>
                            <th class="sortable text-center" data-column="name">Hair Artist</th>
                            <th class="sortable text-center" data-column="place">Place</th>
                            <th class="sortable text-center" data-column="schedule">Schedule</th>
                            <th class="text-center">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kapsters as $kap)
                        <tr>
                            <td class="text-center">{{ $kap->id }}</td>
                            <td class="text-center">{{ $kap->name }}</td>
                            <td class="text-center">{{ $kap->place }}</td>
                            <td class="text-center">{{ $kap->schedule }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning btn-sm" href="/admin/hairartist/edit/{{ $kap->id }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="/admin/hairartist/delete/{{ $kap->id }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                

                <br>
                Jumlah Data : {{$kapstersCount}} <br>
               

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
