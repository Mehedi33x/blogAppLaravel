<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('frontend/auth/css/style.css') }}">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Sign Up</h3>
                        <form action="{{ route('do.signup') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control rounded-left"
                                    placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control rounded-left"
                                    placeholder="Email" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    {{-- <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label> --}}
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="{{ route('auth.signin') }}">Already have an account?</a>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="{{ route('auth.google') }}">Google</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ url('frontend/auth/js/jquery.min.js') }}"></script>
    <script src="{{ url('frontend/auth/js/popper.js') }}"></script>
    <script src="{{ url('frontend/auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/auth/js/main.js') }}"></script>
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

</html>
