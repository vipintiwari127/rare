<?php
include './inc/header.php';
include './inc/sidebar.php';
include './admin/config.php';
?>
<!-- Breadcrumb Start -->
<div class="container">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <span class="breadcrumb-item active">Contact</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container">
    <?php
    $sql = "SELECT * FROM information";
    $result2 = mysqli_query($conn, $sql) or die("query unsuccessful");
    if (mysqli_num_rows($result2) > 0) {
        ?>     <?php
             while ($row = mysqli_fetch_assoc($result2)) {
                 ?>
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact
                    Us</span></h2>
            <div class="row px-xl-5">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form bg-light p-30">
                        <div id="success"></div>
                        <form action="submit.php" method="POST" name="sentMessage" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="required"
                                    data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="required"
                                    data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required"
                                    data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="8" id="message" name="message" placeholder="Message" required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5 mb-5">
                    <div class="bg-light p-30 mb-3">
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?php echo $row['location'];?></p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo $row['email'];?></p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+91 <?php echo $row['mobile_no'];?></p>
                    </div>
                </div>

            </div>
        <?php } ?>
        <?php
    } else {
        echo '<p>No Record found</p>';
    }
    ?>
</div>
<!-- Contact End -->




<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Initialize counts and IDs from localStorage or set to empty arrays
        let cartData = JSON.parse(localStorage.getItem('cartData')) || { count: 0, ids: [] };
        let wishlistData = JSON.parse(localStorage.getItem('wishlistData')) || { count: 0, ids: [] };

        // Update the UI with the counts from localStorage
        document.getElementById('cartCount').innerText = cartData.count;
        document.getElementById('wishlistCount').innerText = wishlistData.count;

        // Function to update cart data
        const updateCart = (itemId) => {
            if (!cartData.ids.includes(itemId)) {
                cartData.ids.push(itemId);
                cartData.count++;
                document.getElementById('cartCount').innerText = cartData.count;
                localStorage.setItem('cartData', JSON.stringify(cartData)); // Update localStorage
            }
        };

        // Function to update wishlist data
        const updateWishlist = (itemId) => {
            if (!wishlistData.ids.includes(itemId)) {
                wishlistData.ids.push(itemId);
                wishlistData.count++;
                document.getElementById('wishlistCount').innerText = wishlistData.count;
                localStorage.setItem('wishlistData', JSON.stringify(wishlistData)); // Update localStorage
            }
        };

        // Add event listeners to all "Add to Cart" buttons
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                let itemId = button.getAttribute('data-id'); // Assuming you have a data-id attribute on the button
                updateCart(itemId);
            });
        });

        // Add event listeners to all "Add to Wishlist" buttons
        document.querySelectorAll('.add-to-wishlist').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                let itemId = button.getAttribute('data-id'); // Assuming you have a data-id attribute on the button
                updateWishlist(itemId);
            });
        });
    });

</script>

<?php include 'inc/footer.php'; ?>