<?php
include './inc/header.php';
include './inc/sidebar.php';
include "admin/config.php";

// Get the category ID from the URL
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : null;
?>
<div class="container pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Products</span>
    </h2>
    <div class="row px-xl-5">
        <!-- Product Grid -->
        <div class="col-lg-12 col-md-8 bg-light">
            <?php
            $sql = "SELECT
                    p.id AS product_id,
                    p.product_name,
                    p.product_price,
                    p.discount_price,
                    p.rating,
                    p.brand,
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
                    category c
                ON
                    p.category = c.id";

            if ($category_id) {
                $sql .= " WHERE c.id = $category_id";
            }

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
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1   border border-5">
                            <div class="product-item bg-light mb-4" data-size="<?php echo $row['size']; ?>"
                                data-price="<?php echo $row['discount_price']; ?>">
                                <div class="product-img position-relative overflow-hidden">
                                    <a href="single-item.php?id=<?php echo $row['product_id']; ?>">
                                        <img class="img-fluid w-100"
                                            src="<?php echo str_replace("../uploads/", "./admin/uploads/", $row['image_paths']); ?>"
                                            style="height:200px;" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square add-to-cart" href="#"
                                            data-id="<?php echo $row['product_id']; ?>" data-name="<?php echo $row['product_name']; ?>"
                                            data-price="<?php echo $row['product_price']; ?>"><i class="fa fa-shopping-cart"
                                                data-id="<?php echo $row['product_id']; ?>"></i></a>
                                        <a class="btn btn-outline-dark btn-square add-to-wishlist"
                                            data-id="<?php echo $row['product_id']; ?>" href="#"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate"
                                        href="single-item.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a>
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
                                        <a class="btn btn-success w-100 mr-2" href="checkOut.php">Buy Now</a>
                                        <a class="btn btn-primary btn-square add-to-cart w-100"
                                            data-id="<?php echo $row['product_id']; ?>" href="#">Add to Cart</a>
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
<?php include 'inc/footer.php'; ?>
<?php
// Close the database connection at the end
mysqli_close($conn);
?>
