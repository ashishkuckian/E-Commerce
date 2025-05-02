<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
      /* Table Styling */
      .table {
        width: 100%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .table th, .table td {
        padding: 15px;
        text-align: center;
        font-size: 16px;
        vertical-align: middle;
      }

      .table th {
        background-color: #343a40;
        color: #fff;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
      }

      .table td {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
      }

      .table tbody tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
      }

      /* Button Styling */
      .btn-custom {
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 4px;
        text-decoration: none;
        color: #fff;
        display: inline-block;
        transition: all 0.3s;
      }

      .btn-primary {
        background-color: #007bff;
        border: none;
      }

      .btn-primary:hover {
        background-color: #0056b3;
      }

      .btn-danger {
        background-color: #dc3545;
        border: none;
      }

      .btn-danger:hover {
        background-color: #c82333;
      }

      /* Image Styling - Fixing visibility issue */
      .img-thumbnail {
        width: 100px; /* Set the width */
        height: 100px; /* Set the height */
        object-fit: cover; /* Ensures the image doesn't stretch and maintains aspect ratio */
        border-radius: 4px; /* Optional, for rounded corners */
        margin: 0 auto;
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .table th, .table td {
          padding: 10px;
          font-size: 14px;
        }

        .img-thumbnail {
          width: 80px;
          height: 80px;
        }
      }
    </style>
  </head>

  <body>
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
      <div class="container mt-5">
        @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"></button>
            {{ session()->get('message') }}
          </div>
        @endif

        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Image</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $product)
              <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>
                  <img class="img-thumbnail" src="/productimage/{{ $product->image }}" alt="Product Image">
                </td>
                <td>
                  <a href="{{ url('updateview', $product->id) }}" class="btn btn-primary btn-custom">Update</a>
                </td>
                <td>
                  <a href="{{ url('deleteproduct', $product->id) }}" class="btn btn-danger btn-custom" onclick="return confirm('Are you sure?')">Delete</a>
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
