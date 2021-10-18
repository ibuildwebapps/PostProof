<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">

    <title>Post:Proof</title>
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">Post Proof</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#" onclick="copyListenerAddressToClipboard()">Copy Listener URI</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="{{ asset('images/postproof.png') }}" alt="" width="120">
                <h2>View Hit @ {{ $hit->created_at }}</h2>
                <p class="lead"></p>
            </div>

            <div class="row g-5">
                <div class="col-md-7 col-lg-8 order-md-last">
                    <div class="row">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Connection Info:</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Scheme</h6>
                                </div>
                                <span class="text-muted">{{ $hit->scheme }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Method</h6>
                                </div>
                                <span class="text-muted">{{ $hit->method }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Remote Address</h6>
                                </div>
                                <span class="text-muted">{{ $hit->remote_address }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Remote Host</h6>
                                </div>
                                <span class="text-muted">{{ $hit->remote_host }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">User Agent</h6>
                                </div>
                                <span class="text-muted">{{ $hit->user_agent }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Default Locale</h6>
                                </div>
                                <span class="text-muted">{{ $hit->default_locale }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Headers:</span>
                            <span class="badge bg-primary rounded-pill">{{ count($headerData) }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <ul class="list-group mb-3">
                                @foreach($headerData AS $data)
                                    <li class="list-group-item d-flex justify-content-between lh-sm">
                                        <div>
                                            <h6 class="my-0">{{ $data->metadata_key }}</h6>
                                            <small class="text-muted">Length: {{ Str::length($data->metadata_value) }}</small>
                                        </div>
                                        <span class="text-muted">{{ $data->metadata_value }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4 order-md-last">
                    <div class="row">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">GET Params:</span>
                            <span class="badge bg-primary rounded-pill">{{ count($getData) }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach($getData AS $data)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $data->metadata_key }}</h6>
                                    <small class="text-muted">Length: {{ Str::length($data->metadata_value) }}</small>
                                </div>
                                <span class="text-muted">{{ $data->metadata_value }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">POST Params:</span>
                            <span class="badge bg-primary rounded-pill">{{ count($postData) }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach($postData AS $data)
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">{{ $data->metadata_key }}</h6>
                                        <small class="text-muted">Length: {{ Str::length($data->metadata_value) }}</small>
                                    </div>
                                    <span class="text-muted">{{ $data->metadata_value }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Raw Params:</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $hit->raw_data }}</h6>
                                    <small class="text-muted">Length: {{ Str::length($hit->raw_data) }}</small>
                                </div>
{{--                                <span class="text-muted">Length: {{ Str::length($hit->data_input)  }}</span>--}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>
    function copyListenerAddressToClipboard() {
        /* Get the text field */
        var copyText = "{{ url('/listener') }}";

        /* Select the text field */
        // copyText.select();
        // copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText);

        /* Alert the copied text */
        alert("Listener URI copied: " + copyText);
    }
</script>

</body>
</html>
