<?php include('./view/header.php'); ?>

<!-- Hero Start -->
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Testimonial</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->

<!-- Testimonial Start -->
<div class="container-fluid testimonial bg-primary my-5 py-5">
    <div class="container text-white py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3">Our Customer Said <span class="fw-light text-dark">About Our Natural Shampoo</span></h1>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">
                    <?php
                    $testimonials = [
                        ["img" => "img/testimonial-1.jpg", "name" => "Client Name", "profession" => "Profession", "review" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit."],
                        ["img" => "img/testimonial-2.jpg", "name" => "Client Name", "profession" => "Profession", "review" => "Duis aliquet, erat non malesuada consequat, nibh erat tempus risus."],
                        ["img" => "img/testimonial-3.jpg", "name" => "Client Name", "profession" => "Profession", "review" => "Praesent tristique odio ut rutrum pellentesque."]
                    ];
                    foreach ($testimonials as $testimonial) {
                        echo '<div class="testimonial-item text-center">';
                        echo '<img class="img-fluid border p-2" src="' . $testimonial['img'] . '" alt="">';
                        echo '<h5 class="fw-light lh-base text-white">' . $testimonial['review'] . '</h5>';
                        echo '<h5 class="mb-1">' . $testimonial['name'] . '</h5>';
                        echo '<h6 class="fw-light text-white fst-italic mb-0">' . $testimonial['profession'] . '</h6>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<?php include('./view/footer.php'); ?>