<div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Our Natural</span> Hair Products</h1>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet, erat non malesuada consequat, nibh erat tempus risus.</p>
            </div>
            <div class="row g-4">

  <?php
  $i=0;
  foreach($dssp as $sp){
    extract($sp);
    $hinh = $imgpath.$img;
    $linksp = "index.php?act=sanphamct&idsp=".$id;
if(($i==2)||($i==5)||($i==8)||($i==11)){
    $mr = "";
}else{
    $mr = "margin_right";
}
echo'
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="product-item text-center border h-100 p-4">
                        <img class="img-fluid mb-4" src="'.$hinh.'" alt="">
                        <a href="'.$linksp.'" class="h6 d-inline-block mb-2">'.$name.'</a>
                        <h5 class="text-primary mb-3">'.$price.'</h5>
                        <a href="'.$linksp.'" class="btn btn-outline-primary px-3">Add To Cart</a>
                    </div>
                </div>

';
  }
  
  ?>

            </div>
        </div>
    </div>