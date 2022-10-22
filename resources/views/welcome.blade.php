<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | {{ env('APP_DESCRIPTION') }}</title>
    <link rel="shortcut icon" href="https://laravel.com/img/logomark.min.svg" type="image/svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="card border-0">
                    <div class="card-body">
                        <h1>{{ env('APP_NAME') }}</h1>
                        <p>{{ env('APP_DESCRIPTION') }}</p>
                        <hr>
                        <span>Build on</span>
                        <span class="text-danger fw-bold">Laravel
                            v{{ Illuminate\Foundation\Application::VERSION }}</span> |
                        <span class="text-primary">(PHP v{{ PHP_VERSION }})</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
