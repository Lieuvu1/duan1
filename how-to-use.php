<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hairnic - Single Product Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include './view/header.php'; ?>

    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3">How To Use</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">How To Use</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-item bg-primary text-center p-3">
                        <i class="fa fa-leaf fa-3x text-dark mb-4"></i>
                        <h5 class="text-white">100% Natural</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-item bg-primary text-center p-3">
                        <i class="fa fa-tint-slash fa-3x text-dark mb-4"></i>
                        <h5 class="text-white">Anti Hair Fall</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-item bg-primary text-center p-3">
                        <i class="fa fa-times fa-3x text-dark mb-4"></i>
                        <h5 class="text-white">Hypoallergenic</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './view/footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>