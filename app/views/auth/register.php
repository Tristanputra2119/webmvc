<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= $data['title'] ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap-login.css" />
</head>

<body>
    <!-- Start your project here-->

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="<?= BASE_URL ?>/img/login.svg" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h1>Register</h1>

                    <form action="<?= BASE_URL ?>/register/process" method="post">
                        <!-- Nama input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form1Example13" class="form-control form-control-lg" name="nama" />
                            <label class="form-label" for="form1Example13">Nama</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form1Example14" class="form-control form-control-lg" name="email" />
                            <label class="form-label" for="form1Example14">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
                            <label class="form-label" for="form1Example23">Password</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                    </form>
                    <!-- <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- End your project here-->
    <script type="text/javascript" src="<?= BASE_URL ?>/js/auth.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>