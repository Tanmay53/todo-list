<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/app-1.css">
</head>

<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card bg-white-1 rounded-4" id="list1">
                        <div class="card-body py-4 px-4 px-md-5">

                            <div class="mt-3">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" value="Logout" class="btn btn-secondary btn-sm">
                                    </div>
                                </form>
                            </div>

                            <div class="h1 text-center mb-4 pb-3 text-primary ">
                                <i class="fas fa-check-square me-1"></i>
                                <u>My Todo-s</u>
                            </div>

                            @yield('body')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('modals')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <script src="/js/main.js"></script>
</body>

</html>
