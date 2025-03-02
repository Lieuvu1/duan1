<?php include './view/header.php'; ?>

<!-- Hero Start -->
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Blog Articles</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Blog Articles</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->

<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary mb-3"><span class="fw-light text-dark">From Our</span> Blog Articles</h1>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet, erat non malesuada consequat, nibh erat tempus risus.</p>
        </div>
        <div class="row g-4">
            <?php
            $blogs = [
                ["img" => "img/blog-1.jpg", "title" => "Foods that are good for your hair growing"],
                ["img" => "img/blog-2.jpg", "title" => "How to take care of hair naturally"],
                ["img" => "img/blog-3.jpg", "title" => "How to use our natural & organic shampoo"]
            ];
            foreach ($blogs as $blog): ?>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="blog-item border h-100 p-4">
                        <img class="img-fluid mb-4" src="<?= $blog['img']; ?>" alt="">
                        <a href="#" class="h5 lh-base d-inline-block"><?= $blog['title']; ?></a>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-outline-primary px-3">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Blog End -->

<?php include './view/footer.php'; ?>