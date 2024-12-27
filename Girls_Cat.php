<?php
include './inc/header.php';
include './inc/sidebar.php';
include "admin/config.php";
?>
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
            Products</span></h2>
    <div class="container-fluid pt-5 pb-3">
        <?php
        $sql = "SELECT * FROM products WHERE gender='female' LIMIT 8;";
        $result = mysqli_query($conn, $sql) or die("Query unsuccessful");
        if (mysqli_num_rows($result) > 0) {
            ?>
            <div class="row px-xl-5">
                <?php
                $counter = 0; // To keep track of columns
                while ($row = mysqli_fetch_assoc($result)) {
                    // Start a new row for every 4 items
                    if ($counter % 4 == 0 && $counter != 0) {
                        echo '</div><div class="row px-xl-5">';
                    }
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <a href="single-item.php?id=<?php echo $row['id']; ?>">
                                    <img class="img-fluid w-100"
                                        src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                        style="height:250px; w-100;" alt="">
                                </a>
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square add-to-cart" href="#"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square add-to-wishlist" href="#"><i
                                            class="far fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate"
                                    href="single-item.php"><?php echo $row['product_name']; ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>RS <?php echo $row['product_price']; ?></h5>
                                    <h6 class="text-muted ml-2"><del>RS<?php echo $row['discount_price']; ?></del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small><?php echo $row['rating']; ?></small>
                                </div>
                                <!-- Buttons Section -->
                                <div class="d-flex justify-content-between mt-3">
                                    <a class="btn btn-success w-100 mr-2" href="addtocard.php">Buy Now</a>
                                    <a class="btn btn-primary btn-square add-to-cart w-100" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++; // Increment counter
                }
                ?>
            </div>
            <?php
        } else {
            echo '<p>No Record found</p>';
        }
        ?>
    </div>
</div>


<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid"
                    src="https://imgs.search.brave.com/OqjfxzowPkXsqkypSqNeM2aZ58cDFaA5M4DX5Td6gFc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvNDcw/NjIxMTQ5L3Bob3Rv/L2NhdWNhc2lhbi13/b21hbi1zaG9wcGlu/Zy1vbmxpbmUuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXpR/THZwTWxfUExQTFdl/WUhuVWxEY1dkbVNV/TGtTTFgtMFpJTFpJ/TXlXcXM9"
                    alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid"
                    src="https://imgs.search.brave.com/OqjfxzowPkXsqkypSqNeM2aZ58cDFaA5M4DX5Td6gFc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvNDcw/NjIxMTQ5L3Bob3Rv/L2NhdWNhc2lhbi13/b21hbi1zaG9wcGlu/Zy1vbmxpbmUuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXpR/THZwTWxfUExQTFdl/WUhuVWxEY1dkbVNV/TGtTTFgtMFpJTFpJ/TXlXcXM9"
                    alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->

<div class="container-fluid pt-5 pb-3">
    <?php
    $sql = "SELECT * FROM products WHERE gender='female' ORDER BY id DESC LIMIT 8;";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessful");
    if (mysqli_num_rows($result) > 0) {
        ?>
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Recent Products</span>
        </h2>
        <div class="row px-xl-5">
            <?php
            $counter = 0; // To keep track of columns
            while ($row = mysqli_fetch_assoc($result)) {
                // Start a new row for every 4 items
                if ($counter % 4 == 0 && $counter != 0) {
                    echo '</div><div class="row px-xl-5">';
                }
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <a href="single-item.php?id=<?php echo $row['id']; ?>">
                                <img class="img-fluid w-100"
                                    src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                    style="height:250px; w-100;" alt="">
                            </a>
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square add-to-cart" href="#"><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square add-to-wishlist" href="#"><i
                                        class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate"
                                href="single-item.php"><?php echo $row['product_name']; ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>RS <?php echo $row['product_price']; ?></h5>
                                <h6 class="text-muted ml-2"><del>RS<?php echo $row['discount_price']; ?></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small><?php echo $row['rating']; ?></small>
                            </div>
                            <!-- Buttons Section -->
                            <div class="d-flex justify-content-between mt-3">
                                <a class="btn btn-success w-100 mr-2" href="addtocard.php">Buy Now</a>
                                <a class="btn btn-primary btn-square add-to-cart w-100" href="#">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $counter++; // Increment counter
            }
            ?>
        </div>
        <?php
    } else {
        echo '<p>No Record found</p>';
    }
    ?>
</div>

<!-- Vendor Start -->
<div class="container-fluid py-5">
    <?php
    $sql = "SELECT * FROM brand";
    $result = mysqli_query($conn, $sql) or die("query unsuccessful");
    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bg-light p-4">
                            <img src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['brand_image']); ?>"
                                alt="">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo '<p>No Record found</p>';
    }
    ?>
</div>
<!-- Vendor End -->





<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>


<script>
    let cartCount = 0;
    let wishlistCount = 0;

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            cartCount++;
            document.getElementById('cartCount').innerText = cartCount;
        });
    });

    document.querySelectorAll('.add-to-wishlist').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            wishlistCount++;
            document.getElementById('wishlistCount').innerText = wishlistCount;
        });
    });
</script>
<!-- Footer Start -->
<?php include 'inc/footer.php'; ?>
<!-- Footer End -->