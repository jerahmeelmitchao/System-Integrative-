<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/welcome.css"> <!-- Link to the CSS file -->

    <title>Mitchao System</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Landing Container -------------------------->

        <div class="row border rounded-5 p-3 shadow-lg welcome-container">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="/assets/images/1.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Welcome!</p>
                <small class="text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;">Join our platform or log in to continue your journey.</small>
            </div>

            <!--------------------------- Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-center">
                        <h2>Select an Option</h2>
                        <p>Choose whether to log in or register to get started.</p>
                    </div>

                    {{-- Login Button --}}
                    <div class="input-group mb-3">
                        <a href="{{ route('login') }}" class="btn btn-lg btn-primary w-100 fs-6">Login</a>
                    </div>

                    {{-- Register Button --}}
                    <div class="input-group mb-3">
                        <a href="{{ route('register') }}" class="btn btn-lg btn-success w-100 fs-6">Register</a>
                    </div>

                    {{-- Register Admin Button with Modal Trigger --}}
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-lg btn-success w-100 fs-6" data-bs-toggle="modal" data-bs-target="#adminKeyModal">Register as Admin</button>
                    </div>

                    {{-- Admin Key Modal --}}
                    <div class="modal fade" id="adminKeyModal" tabindex="-1" aria-labelledby="adminKeyModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="adminKeyModalLabel">Enter Admin Key</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="password" id="adminKeyInput" class="form-control" placeholder="Enter Admin Key" />
                                    <div class="text-danger" id="errorMessage" style="display: none;">Wrong Key!</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="proceedButton" class="btn btn-primary">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- New Info Modal Trigger --}}
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-lg btn-info w-100 fs-6" data-bs-toggle="modal" data-bs-target="#infoModal">Show Info</button>
                    </div>

                    {{-- New Info Modal --}}
                    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoModalLabel">Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>This website was created by Jerahmeel Mitchao.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Access Denied Modal --}}
                    <div class="modal fade" id="accessDeniedModal" tabindex="-1" aria-labelledby="accessDeniedModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="accessDeniedModalLabel">Access Denied</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Bubo ampvta.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/welcome.js"></script> <!-- Link to the JavaScript file -->
</body>

</html>