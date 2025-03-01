<?php include './view/header.php'; ?>

<!-- Hero Start -->
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Features</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Features</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->

<!-- Feature Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <?php
            $features = [
                ['icon' => 'fa-leaf', 'title' => '100% Natural'],
                ['icon' => 'fa-tint-slash', 'title' => 'Anti Hair Fall'],
                ['icon' => 'fa-times', 'title' => 'Hypoallergenic']
            ];
            foreach ($features as $feature) {
                echo "<div class='col-lg-4 wow fadeIn' data-wow-delay='0.1s'>
                        <div class='feature-item position-relative bg-primary text-center p-3'>
                            <div class='border py-5 px-3'>
                                <i class='fa {$feature['icon']} fa-3x text-dark mb-4'></i>
                                <h5 class='text-white mb-0'>{$feature['title']}</h5>
                            </div>
                        </div>
                      </div>";
            }
            ?>
        </div>
    </div>
</div>
<!-- Feature End -->

<?php include './view/footer.php'; ?>