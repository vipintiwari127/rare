<?php
include './inc/header.php';
include './inc/sidebar.php';
include './admin/config.php';
?>
<style>
    .dropright a {
        background-color: white !important;
    }

    .collapse {

        padding-right: 3rem;
        background-color: black !important;
    }

    .row .px-xl-5 {
        background-color: black !important;
    }

    .cat {

        border: 2px solid black;
    }

    .nav-link .dropdown-toggle {
        color: beige !important;
    }

    .catogaries {
        background-color: black !important;
        padding-left: 3rem;
    }

    img {
        width: 100%;
        max-width: 330px;
        height: auto;
    }
</style>
<!-- Breadcrumb Start -->
<div class="container">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <span class="breadcrumb-item active">About</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- about Start -->
<div class="container">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">About</span>
    </h2>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form bg-light p-30" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <p>
                    🌟 <strong>Rare.Nomad</strong> is dedicated to creating <strong>luxury fashion </strong> for the
                    modern traveler—individuals who appreciate refined style and effortless functionality. Each
                    collection is thoughtfully designed to combine elegance with versatility, empowering our customers
                    to navigate life’s journeys with <strong>confidence</strong>and <strong> grace</strong>. ✈️<br><br>
                    Our in-house designs are <strong> original</strong> and <strong>protected </strong> by copyright,
                    ensuring that every piece is unique to the Rare.Nomad brand. We are committed to maintaining the
                    highest standards of <strong>creativity, craftsmanship</strong>, and <strong> ethical production
                    </strong>practices. By protecting our intellectual property, we guarantee that our products remain
                    authentic and exclusive to those who wear them. 🔒<br><br>
                    At Rare.Nomad, we believe in delivering more than just fashion; we create <strong>
                        timeless</strong>, sophisticated pieces that resonate with the essence of the modern nomad. 🌍
                    Our garments are designed to inspire a lifestyle of <strong> exploration, freedom,</strong> and
                    <strong> individuality</strong>. 🖤

                </p>

            </div>
        </div>
        <div class="col-lg-5 mb-5 ">
            <!-- <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="#"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div> -->
            <div class="bg-light p-30 mb-3 text-center" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <img src="img/product-7.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- about End -->




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