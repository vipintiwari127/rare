<?php
include './inc/header.php';
include './inc/sidebar.php';
include "admin/config.php";
?>
<style>
    @media (max-width:768px) {
        .product-action {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.5s;
        }

        .product-action a.btn {
            position: relative;
            margin: 0 3px;
            margin-top: 100px;
            opacity: 0;
        }

        .product-item:hover {
            box-shadow: 0 0 30pxrgb(5, 249, 66);
        }

        .product-item:hover .product-action {
            background: rgba(241, 247, 243, 0.7);
        }

        .product-item:hover .product-action a.btn:first-child {
            opacity: 1;
            margin-top: 0;
            transition: 0.3s 0s;
        }

        .product-item:hover .product-action a.btn:nth-child(2) {
            opacity: 1;
            margin-top: 0;
            transition: 0.3s 0.05s;
        }

        .product-item:hover .product-action a.btn:nth-child(3) {
            opacity: 1;
            margin-top: 0;
            transition: 0.3s 0.1s;
        }

        .product-item:hover .product-action a.btn:nth-child(4) {
            opacity: 1;
            margin-top: 0;
            transition: 0.3s 0.15s;
        }
    }
</style>
<div class="container pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent
            Products</span></h2>
    <div class="container-fluid pt-5 pb-3">
        <?php
        $sql = "SELECT * FROM products LIMIT 8;";
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
                                        style="height:250px;" alt="">
                                </a>
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square add-to-cart" data-id="<?php echo $row['id']; ?>"
                                        href="#"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square add-to-wishlist"
                                        data-id="<?php echo $row['id']; ?>" href="#"><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate"
                                    href="single-item.php?id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>₹ <?php echo $row['discount_price']; ?></h5>
                                    <h6 class="text-muted ml-2"><del>₹<?php echo $row['product_price']; ?></del></h6>
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
                                    <a class="btn btn-success w-100 mr-2" href="cart.php">Buy Now</a>
                                    <a class="btn  btn-square add-to-cart w-100" data-id="<?php echo $row['id']; ?>"
                                        href="#">Add to Cart</a>
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
<div class="container pt-5 pb-3">
    <?php
    $sql1 = "SELECT * FROM offer ORDER BY id DESC limit 2";
    $result1 = mysqli_query($conn, $sql1) or die("query unsuccessful");
    if (mysqli_num_rows($result1) > 0) {
        ?>
        <div class="row px-xl-5">
            <?php
            while ($row = mysqli_fetch_assoc($result1)) {
                ?>
                <div class="col-md-6">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <a href="shop.php"><img class="img-fluid"
                                src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>" alt=""
                                style="height: 300px;"></a>
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Save <?php echo $row['offer_price']; ?>%</h6>
                            <h3 class="text-white mb-3">Special Offer</h3>
                            <a href="shop.php" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- <div class="col-md-6">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <img class="img-fluid"
                            src="https://imgs.search.brave.com/OqjfxzowPkXsqkypSqNeM2aZ58cDFaA5M4DX5Td6gFc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvNDcw/NjIxMTQ5L3Bob3Rv/L2NhdWNhc2lhbi13/b21hbi1zaG9wcGlu/Zy1vbmxpbmUuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXpR/THZwTWxfUExQTFdl/WUhuVWxEY1dkbVNV/TGtTTFgtMFpJTFpJ/TXlXcXM9"
                            alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Save 20%</h6>
                            <h3 class="text-white mb-3">Special Offer</h3>
                            <a href="shop.php" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div> -->
        </div>
        <?php
    } else {
        echo '<p>No Record found</p>';
    }
    ?>
</div>
<!-- Offer End -->

<div class="container pt-5 pb-3">
    <?php
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 8;";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessful");
    if (mysqli_num_rows($result) > 0) {
        ?>
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Our Products</span>
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
                                    style="height:250px;" alt="">
                            </a>
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square add-to-cart" data-id="<?php echo $row['id']; ?>"
                                    href="#"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square add-to-wishlist" data-id="<?php echo $row['id']; ?>"
                                    href="#"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate"
                                href="single-item.php?id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>₹ <?php echo $row['discount_price']; ?></h5>
                                <h6 class="text-muted ml-2"><del>₹<?php echo $row['product_price']; ?></del></h6>
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
                                <a class="btn btn-success w-100 mr-2" href="cart.php">Buy Now</a>
                                <a class="btn  btn-square add-to-cart w-100" data-id="<?php echo $row['id']; ?>" href="#">Add to
                                    Cart</a>
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

<!-- Vendor End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Initialize counts and IDs from localStorage or set to empty arrays
        let cartData = JSON.parse(localStorage.getItem('cartData')) || { count: 0, ids: [] };
        let wishlistData = JSON.parse(localStorage.getItem('wishlistData')) || { count: 0, ids: [] };

        // Update the UI with the counts from localStorage
        document.getElementById('cartCount').innerText = cartData.count;
        document.getElementById('wishlistCount').innerText = wishlistData.count;

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                let itemId = button.getAttribute('data-id'); // Assuming you have a data-id attribute on the button
                if (!cartData.ids.includes(itemId)) {
                    cartData.ids.push(itemId);
                    cartData.count++;
                    document.getElementById('cartCount').innerText = cartData.count;
                    localStorage.setItem('cartData', JSON.stringify(cartData)); // Update localStorage
                    alert('Item added to cart!'); // Show alert
                } else {
                    alert('Item is already in the cart!'); // Show alert if item is already in the cart
                }
            });
        });

        document.querySelectorAll('.add-to-wishlist').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                let itemId = button.getAttribute('data-id'); // Assuming you have a data-id attribute on the button
                if (!wishlistData.ids.includes(itemId)) {
                    wishlistData.ids.push(itemId);
                    wishlistData.count++;
                    document.getElementById('wishlistCount').innerText = wishlistData.count;
                    localStorage.setItem('wishlistData', JSON.stringify(wishlistData)); // Update localStorage
                    alert('Item added to wishlist!'); // Show alert
                } else {
                    alert('Item is already in the wishlist!'); // Show alert if item is already in the wishlist
                }
            });
        });
    });
</script>


<!-- Template Javascript -->
<?php include 'inc/footer.php'; ?>