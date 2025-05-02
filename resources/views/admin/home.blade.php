<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    l:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
      @include('admin.navbar')
        <!-- partial -->
        @include('admin.body')
          <!-- partial -->
        @include('admin.script')
  </body>
</html>