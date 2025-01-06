<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Mediumish - A Medium style template by WowThemes.net</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ url('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ url('frontend/assets/css/mediumish.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ url('frontend/auth/css/style.css') }}"> --}}

</head>

<body>
    @include('fixed.navbar')
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ url('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="{{ url('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/ie10-viewport-bug-workaround.js') }}"></script>

    @if (session('error'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000,
                toast: true,
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                toast: true,
            });
        </script>
    @endif
</body>

{{-- <script src="{{ asset('frontend/assets/quillText/quill_text.js') }}"></script> --}}
</html>
