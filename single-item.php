<?php
include './inc/header.php';
include './inc/sidebar.php';
include "admin/config.php";
?>
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
<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Open Content -->
<section class="bg-light">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "       SELECT
            p.id AS product_id,
            p.product_name,
            p.product_price,
            p.discount_price,
            p.rating,
            b.id AS brand_id,
            b.brand AS brand_name,
            p.color,
            p.size,
            c.id AS category_id,
            c.category AS category_name,
            p.gender,
            p.product_type,
            p.sales,
            p.description,
            p.specification,
            p.image_paths,
            p.image2_paths,
            p.shippingPrice
        FROM
            products p
        JOIN
            category c ON p.category = c.id
        JOIN
            brand b ON p.brand = b.id   
     WHERE p.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Display product details
                ?>
                <div class="container pb-6">
                    <div class="row">
                        <div class="col-lg-5 mt-5">
                            <div class="card mb-3">
                                <img class="card-img img-fluid"
                                    src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>" style="height:650px;  w-120;"
                                    alt="Card image cap" id="product-detail">
                            </div>
                            <div class="row">
                                <!--Start Controls-->
                                <!-- <div class="col-1 align-self-center">
                                    <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                        <i class="text-dark fas fa-chevron-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </div> -->
                                <!-- <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                                    data-bs-ride="carousel">
                                    <!--Start Slides-->
                                    <div class="carousel-inner product-links-wap" role="listbox">
                                        <!--First slide-->
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="" src="" <?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>">
                                                    </a>
                                                </div>
                                                <!-- </div>
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="assets/img/product_single_02.jpg"
                                                            alt="Product Image 2">
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="assets/img/product_single_03.jpg"
                                                            alt="Product Image 3">
                                                    </a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!--/.First slide-->
                                    </div>
                                    <!--End Slide
                                </div> -->
                                <!--End Carousel Wrapper-->
                                <!--Start Controls-->
                                <!-- <div class="col-1 align-self-center">
                                    <a href="#multi-item-example" role="button" data-bs-slide="next">
                                        <i class="text-dark fas fa-chevron-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div> -->
                                <!--End Controls-->
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-lg-7 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="h2"><?php echo $row['product_name']; ?></h1>
                                    <p class="h3 py-2">₹ <?php echo $row['discount_price']; ?></p>
                                    <p class="py-2">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <span class="list-inline-item text-dark">Rating <?php echo $row['rating']; ?> | 6
                                            Comments</span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Brand:</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong><?php echo $row['brand_name']; ?></strong></p>
                                        </li>
                                    </ul>

                                    <h6>Description:</h6>
                                    <p><?php echo $row['description']; ?></p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Avaliable Color :</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong><?php echo $row['color']; ?></strong></p>
                                        </li>
                                    </ul>

                                    <h6>Specification:</h6>
                                    <ul class="list-unstyled pb-3">
                                        <li><?php echo $row['specification']; ?></li>
                                    </ul>

                                    <form action="" method="GET">
                                        <input type="hidden" name="product-title" value="Activewear">
                                        <div class="row">
                                            <div class="col-auto">
                                                <ul class="list-inline pb-3">
                                                    <li class="list-inline-item">Size :
                                                        <input type="hidden" name="product-size" id="product-size" value="S">
                                                    </li>
                                                    <li class="list-inline-item"><span class="btn btn-success btn-size"><?php echo $row['size'];?></span>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="list-inline pb-3">
                                                    <li class="list-inline-item text-right">
                                                        Quantity
                                                        <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                                    </li>
                                                    <li class="list-inline-item"><span class="btn btn-success"
                                                            id="btn-minus">-</span></li>
                                                    <li class="list-inline-item"><span id="var-value">1</span></li>
                                                    <li class="list-inline-item"><span class="btn btn-success"
                                                            id="btn-plus">+</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col d-grid">
                                                <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy"><a
                                                        href="cart.php">Buy</a></button>
                                            </div>
                                            <!-- <div class="col d-grid">
                                                <button type="submit" class="btn btn-success btn-lg" name="submit"
                                                    value="addtocard">Add To Cart</button>
                                            </div> -->
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    } else {
        echo '<p>No product ID provided</p>';
    }
    ?>
</section>
<!-- Close Content -->

<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <?php
        $sql = "SELECT * FROM products LIMIT 4;";
        $result = mysqli_query($conn, $sql) or die("Query unsuccessful");
        if (mysqli_num_rows($result) > 0) {
            ?>
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
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
                                    <img style="height: 250px;  " class="img-fluid w-100  border border-1"
                                        src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                        style="height:300px;" alt="">
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
    <div class="container pt-5 pb-3">
        <?php
        $sql = "SELECT * FROM products ORDER BY id DESC  LIMIT 8;";
        $result = mysqli_query($conn, $sql) or die("Query unsuccessful");
        if (mysqli_num_rows($result) > 0) {
            ?>
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                    Products</span></h2>
            <div class="row px-xl-5">
                <?php
                $counter = 0; // To keep track of columns
                while ($row = mysqli_fetch_assoc($result)) {
                    // Start a new row for every 4 items
                    if ($counter % 4 == 0 && $counter != 0) {
                        echo '</div><div class="row px-xl-5">';
                    }
                    ?>
                    <!-- Product Card Example -->
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <a href="single-item.php?id=<?php echo $row['id']; ?>">
                                    <img  style="height: 250px;" class="img-fluid w-100"
                                        src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                        style="height:300px; w-100;" alt="">
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
</section>
<!-- End Article -->



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


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
<!-- End Script -->

<script src="assets/js/slick.min.js"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3
            }
        }
        ]
    });
</script>
<?php include 'inc/footer.php'; ?>
<?php
// Close the database connection at the end
mysqli_close($conn);
?>