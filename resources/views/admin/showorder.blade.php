<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        /* Table Styling */
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
            color: #333; /* Set text color to black for visibility */
        }

        th {
            background-color: #4CAF50;
            color: white; /* Ensuring the text is white in the header */
            font-size: 18px;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        /* Action Button Styling */
        .btn-success {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Page Title Styling */
        .page-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        /* Table Header Styling */
        .table-header {
            background-color: grey;
            color: white;
        }

        /* Container and page styling */
        .container {
            margin-top: 50px;
        }

        /* Responsive Table */
        @media (max-width: 768px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }

            .btn-success {
                font-size: 14px;
                padding: 8px 15px;
            }

            .container {
                padding: 10px;
            }
        }

    </style>
  </head>
  <body>
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container">
            <h2 class="page-title">Customer Orders</h2>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <table>
                <thead>
                    <tr class="table-header">
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $orders)
                        <tr>
                            <td>{{ $orders->name }}</td>
                            <td>{{ $orders->phone }}</td>
                            <td>{{ $orders->address }}</td>
                            <td>{{ $orders->product_name }}</td>
                            <td>{{ $orders->price }}</td>
                            <td>{{ $orders->quantity }}</td>
                            <td>{{ $orders->status }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ url('updatestatus', $orders->id) }}">Delivered</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.script')
  </body>
</html>
