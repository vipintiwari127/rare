<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include "admin/config.php";
?>
<!-- Carousel Start -->
<div class="container mb-3">
    <?php
    $sql = "SELECT * FROM sliders";
    $result = mysqli_query($conn, $sql) or die("query unsuccessful");
    $sql1 = "SELECT * FROM offer limit 2";
    $result1 = mysqli_query($conn, $sql1) or die("query unsuccessful");
    if (mysqli_num_rows($result1) > 0)
        if (mysqli_num_rows($result) > 0) {
            ?>
            <div class="row">
                <div class="col-lg-8">
                    <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <li data-target="#header-carousel" data-slide-to="<?php echo $i; ?>"
                                    class="<?php echo $i == 0 ? 'active' : ''; ?>"></li>
                                <?php
                                $i++;
                            }
                            ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            $result = mysqli_query($conn, $sql); // Reset the result set
                            $first = true;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="carousel-item position-relative" style="height: 430px;">
                                    <img class="position-absolute w-100 h-100"
                                        src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                        style="object-fit: cover;">
                                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                        <div class="p-3" style="max-width: 700px;">
                                            <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                                <?php echo $row['slider_name']; ?>
                                            </h1>
                                            <p class="mx-md-5 px-5 animate__animated animate__bounceIn"></p>
                                            <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                                href="shop.php">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($first) {
                                    echo '<script>document.querySelector(".carousel-item").classList.add("active");</script>';
                                    $first = false;
                                }
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#header-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#header-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                        ?>
                        <div class="product-offer mb-30" style="height: 200px;">
                            <a href="shop.php"><img class="img-fluid"
                                    src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                    alt=""></a>
                            <div class="offer-text">
                                <h6 class="text-white text-uppercase">Save <?php echo $row['offer_price']; ?>%</h6>
                                <h3 class="text-white mb-3">Special Offer</h3>
                                <a href="shop.php" class="btn btn-primary hidebutton">Shop Now</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        } else {
            echo '<p>No Record found</p>';
        }
    ?>
</div>

<!-- Carousel End -->

<!-- Featured Start -->
 <style>
      @media (max-width:768px){
    .product-action {
      position: absolute ;
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
<div class="container pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0"><a href="shipping.php">Free Shipping</a></h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0"><a href="cancel.php">14-Day Return</a></h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->

<!-- Categories Start -->
<div class="container pt-5">
    <?php
    $sql = "SELECT
    c.id AS category_id,
    c.category AS category_name,
    c.number,
    MIN(p.image_paths) AS image
FROM
    products p
JOIN
    category c
ON
    p.category = c.id
GROUP BY
    c.id, c.category, c.number
ORDER BY
    p.id DESC
LIMIT 4";

    $result2 = mysqli_query($conn, $sql) or die("query unsuccessful");
    if (mysqli_num_rows($result2) > 0) {
        ?>
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <?php
            while ($row = mysqli_fetch_assoc($result2)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="">
                        <div class="cat-item d-flex align-items-center mb-2">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <a href="category.php?category_id=<?php echo $row['category_id']; ?>">
                                    <img class="img-fluid"
                                        src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image']); ?>"
                                        style="height:100px; w-100;" alt="">
                                </a>
                            </div>
                            <div class="flex-fill pl-3">
                                <h6><a href="category.php?category_id=<?php echo $row['category_id']; ?>"
                                        class="nav-item nav-link"> <?php echo $row['category_name']; ?></a>
                                </h6>
                                <small class="text-body"><?php echo $row['number']; ?></small>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    } else {
        echo '<p>No Record found</p>';
    }
    ?>
</div>

<!-- Categories End -->

<div class="container pt-5 pb-3">
    <?php
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 8;";
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
                
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <a href="single-item.php?id=<?php echo $row['id']; ?>">
                                <img style="height: 250px;" class="img-fluid w-100"
                                    src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                    style="height:350px; w-100 ;" alt="">
                            </a>
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square add-to-cart" data-id="<?php echo $row['id']; ?>"
                                    href="#"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square add-to-wishlist" data-id="<?php echo $row['id']; ?>"
                                    href="#"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-5">
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
                                src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                alt=""></a>
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Save <?php echo $row['offer_price']; ?>%</h6>
                            <h3 class="text-white mb-3x">Special Offer</h3>
                            <a href="shop.php" class="btn btn-primary"> Now</a>
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
    $sql = "SELECT * FROM products LIMIT 8;";
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
                                <img style="height: 250px;" class="img-fluid w-100"
                                    src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                    style="height:350px; w-100;" alt="">
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
                                href="single-item.php?id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></>
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
                                    <!-- <a class="btn  btn-square add-to-cart w-100" data-id="<?php echo $row['id']; ?>" -->
                                    <a class="btn  btn-success add-to-cart w-100" data-id="<?php echo $row['id']; ?>"
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

<!-- Vendor Start -->
<!-- <div class="container py-5">
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
</div> -->
<!-- <div class="container-fluids py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Vendor End -->
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

        // Filter functionality
        document.getElementById('applyFilters').addEventListener('click', () => {
            const minPrice = parseFloat(document.getElementById('minPrice').value) || 0;
            const maxPrice = parseFloat(document.getElementById('maxPrice').value) || Infinity;
            const selectedSizes = Array.from(document.querySelectorAll('.size-filter:checked')).map(checkbox => checkbox.value);

            const products = document.querySelectorAll('.product-item');
            products.forEach(product => {
                const productPrice = parseFloat(product.getAttribute('data-price'));
                const productSize = product.getAttribute('data-size');

                const priceMatch = productPrice >= minPrice && productPrice <= maxPrice;
                const sizeMatch = selectedSizes.length === 0 || selectedSizes.includes(productSize);

                if (priceMatch && sizeMatch) {
                    product.parentElement.style.display = '';
                } else {
                    product.parentElement.style.display = 'none';
                }
            });
        });
    });
</script>
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>



<?php include 'inc/footer.php'; ?>
<?php
// Close the database connection at the end
mysqli_close($conn);
?>