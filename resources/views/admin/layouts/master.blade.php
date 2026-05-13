<!DOCTYPE html>
<html lang="en">
{{-- Include the css head section  --}}
@include('admin.layouts.head')

<body>
    {{-- Include the header section --}}
    @include('admin.layouts.header')
    <div class="container my-4">
        @yield('content')
    </div>
  
    <footer class="text-center text-muted py-4 mt-5 border-top">
        <small>Enquiry Manager for internal enquiry tracking</small>
    </footer>

      <!-- Include the js footer section -->
    @include('admin.layouts.footer')
</body>

</html>
