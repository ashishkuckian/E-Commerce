<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        /* Overall Form Container */
        .form-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Title */
        .title {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* Label Styling */
        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        /* Input Field Styling */
        input[type="text"], 
        input[type="number"], 
        input[type="file"], 
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #333;
            background-color: #fff;
            box-sizing: border-box;
        }

        /* Styling for file input */
        input[type="file"] {
            padding: 10px;
            background-color: #f0f0f0;
        }

        /* Submit Button Styling */
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            font-size: 18px;
            border: none;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        /* Success Message */
        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
                margin: 20px;
            }

            .title {
                font-size: 24px;
            }

            label {
                font-size: 14px;
            }

            input[type="text"], 
            input[type="number"], 
            input[type="file"], 
            input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
  </head>
  <body>
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="form-container">
            <h1 class="title">Add Product</h1>

            @if(session()->has('message'))
                <div class="alert">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Product Title -->
                <div>
                    <label for="title">Product Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter product title" required>
                </div>

                <!-- Price -->
                <div>
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" placeholder="Enter product price" required>
                </div>

                <!-- Description -->
                <div>
                    <label for="des">Description</label>
                    <input type="text" name="des" id="des" placeholder="Enter product description" required>
                </div>

                <!-- Quantity -->
                <div>
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" placeholder="Enter product quantity" required>
                </div>

                <!-- Product Image -->
                <div>
                    <label for="file">Product Image</label>
                    <input type="file" name="file" id="file">
                </div>

                <!-- Submit Button -->
                <div>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

    @include('admin.script')
  </body>
</html>
