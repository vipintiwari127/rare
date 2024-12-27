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
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Our Products</span>
    </h2>
    <div class="row px-xl-5">
        <!-- Sidebar for Filters -->
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="bg-light p-4">
                <h5 class="section-title text-uppercase mb-4"><i class="fa fa-filter mr-2"></i>Filter</h5>
                <!-- Price Filter -->
                <div class="mb-4">
                    <h6 class="text-uppercase">Price</h6>
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control mr-2" id="minPrice" placeholder="Min" />
                        <input type="number" class="form-control" id="maxPrice" placeholder="Max" />
                    </div>
                </div>
                <!-- Size Filter -->
                <div class="mb-4">
                    <h6 class="text-uppercase">Size</h6>
                    <div>
                        <input type="checkbox" id="sizeSmall" class="size-filter" value="S" />
                        <label for="sizeSmall" class="ml-2">S</label><br />
                        <input type="checkbox" id="sizeMedium" class="size-filter" value="M" />
                        <label for="sizeMedium" class="ml-2">M</label><br />
                        <input type="checkbox" id="sizeLarge" class="size-filter" value="L" />
                        <label for="sizeLarge" class="ml-2">L</label><br />
                        <input type="checkbox" id="sizeXL" class="size-filter" value="XL" />
                        <label for="sizeXL" class="ml-2">XL</label><br />
                        <input type="checkbox" id="sizeXXL" class="size-filter" value="XXL" />
                        <label for="sizeXXL" class="ml-2">XXL</label><br />
                    </div>
                </div>
                <!-- Apply Filters -->
                <button class="btn btn-primary btn-block" id="applyFilters">Apply Filters</button>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="col-lg-9 col-md-8 bg-light">
            <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql) or die("Query unsuccessful");
            if (mysqli_num_rows($result) > 0) {
                ?>
                <div class="row px-xl-5" id="productGrid">
                    <?php
                    $counter = 0; // To keep track of columns
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Start a new row for every 4 items
                        if ($counter % 4 == 0 && $counter != 0) {
                            echo '</div><div class="row px-xl-5">';
                        }
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-3" data-size="<?php echo $row['size']; ?>" data-price="<?php echo $row['discount_price']; ?>">
                                <div class="product-img position-relative overflow-hidden " style=" top:10px">
                                    <a href="single-item.php?id=<?php echo $row['id']; ?>">
                                        <img class="img-fluid w-100"
                                            src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                            style="height:200px;" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square add-to-cart" href="#"
                                            data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['product_name']; ?>"
                                            data-price="<?php echo $row['product_price']; ?>"><i class="fa fa-shopping-cart"
                                                data-id="<?php echo $row['id']; ?>"></i></a>
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
                                        <a class="btn  btn-square add-to-cart w-100"
                                           data-id="<?php echo $row['id']; ?>" href="#">Add to Cart</a>
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
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JavaScript Libraries -->
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

            console.log('Min Price:', minPrice);
            console.log('Max Price:', maxPrice);
            console.log('Selected Sizes:', selectedSizes);

            const products = document.querySelectorAll('.product-item');
            products.forEach(product => {
                const productPrice = parseFloat(product.getAttribute('data-price'));
                const productSize = product.getAttribute('data-size');

                console.log('Product Price:', productPrice);
                console.log('Product Size:', productSize);

                const priceMatch = productPrice >= minPrice && productPrice <= maxPrice;
                const sizeMatch = selectedSizes.length === 0 || selectedSizes.includes(productSize);

                console.log('Price Match:', priceMatch);
                console.log('Size Match:', sizeMatch);

                if (priceMatch && sizeMatch) {
                    product.parentElement.style.display = '';
                } else {
                    product.parentElement.style.display = 'none';
                }
            });
        });
    });
</script>

<?php include 'inc/footer.php'; ?>
<?php
// Close the database connection at the end
mysqli_close($conn);
?>
