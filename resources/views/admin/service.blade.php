<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <h3>Service Data</h3>
                <a href="/admin/service/add">+ Add Service</a>
                <br />
                <br />
                <p>Search Services:</p>
                <form action="/admin/service/search" method="GET" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Search Service" value="{{ old('search') }}">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>

                <table id="serviceTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="sortable text-center" data-column="id">ID</th>
                            <th class="sortable text-center" data-column="name">Service</th>
                            <th class="sortable text-center" data-column="description">Description</th>
                            <th class="sortable text-center" data-column="price">Total  Price</th>
                            <th class="text-center">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $svc)
                        <tr>
                            <td class="text-center">{{ $svc->id }}</td>
                            <td class="text-center">{{ $svc->name }}</td>
                            <td class="text-center">{{ $svc->description }}</td>
                            <td class="text-center">{{ number_format($svc->price, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning btn-sm" href="/admin/service/edit/{{ $svc->id }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="/admin/service/delete/{{ $svc->id }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                

               
                <br>
                Jumlah Data : {{$serviceCount}} <br>
                   
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const table = document.getElementById("serviceTable");
            const headers = table.querySelectorAll("th.sortable");
    
            headers.forEach(function(header) {
                header.addEventListener("click", function() {
                    const column = this.dataset.column;
                    const isAscending = this.classList.contains("ascending");
                    const sortedRows = Array.from(table.querySelectorAll("tbody tr"));
    
                    sortedRows.sort(function(a, b) {
                        let aValue = getValue(a, column);
                        let bValue = getValue(b, column);
    
                        // For specific columns (ID and price), convert the values to numbers
                        if (column === "id" || column === "price") {
                            aValue = parseInt(aValue);
                            bValue = parseInt(bValue);
                            return isAscending ? aValue - bValue : bValue - aValue;
                        }
    
                        // For other columns, perform alphabetical sorting using localeCompare
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
                return headers.findIndex(header => header.dataset.column === columnName);
            }
        });
    </script>
    
    
    
    
</body>

</html>
