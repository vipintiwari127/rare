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

    .card {
        width: 100%;
        padding: 25px 50px;
        height: 310px;
        /* max-height: 500px; */
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transition: .3s;
    }

    @media (max-width:1530px) {
        .card {
            height: 350px;
        }
    }

    @media (max-width:1350px) {
        .card {
            height: 490px;
        }
    }

    @media (max-width:993px) {
        .card {
            height: 400px;
        }
    }

    h1 {}

    h3 {
        font-size: 20px;
        font-weight: 600;
        text-align: center;
        text-decoration-line: underline;

    }

    .card:hover {
        transform: translateY(-20px);
    }


    p {
        font-size: 16px;
        font-weight: 400;
    }
</style>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <span class="breadcrumb-item active">Shipping</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- shipping Start -->
<div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Shipping</span></h2>
        <div class="container">
            <p class="text-center">Absolutely! Here's a more unique and engaging version of the <strong>RareNomad Fashion Shipping Policy.</strong>  I’ve reworded it to make it more personable, while keeping the essential information clear and accessible for your customers:</p>
        </div>

        <div class="row px-xl-5">
            
            <div class="col-lg-4 col-md-6 mb-5 ">
                <!-- <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="#"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div> -->
                <div class="bg-light p-30 mb-3  card">
                    <h3>RareNomad Fashion Shipping Policy</h3>
                    <p>Thank you for choosing <strong> RareNomad Fashion</strong>! We're excited to get your order to you. Please take a moment to review our shipping policy below, where you'll find details on shipping rates, delivery times, and other important information to ensure a smooth shopping experience.</p>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="bg-light p-30 mb-3 card">
                    <h3>Where We Ship</h3>
                    <p>We proudly offer shipping across <strong> India</strong>, delivering to over 25,000+ pincodes. Additionally, we also cater to selected international locations, so no matter where you are, we’ve got you covered!
                        
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5">
                <div class="bg-light p-30 mb-3 card">
                    <h3>Shipping Costs</h3>
                    <p>Shipping fees are determined by the destination and delivery method chosen at checkout. Rest assured, we will display the shipping costs upfront before you complete your purchase, so you’ll always know the total cost.
                        
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="bg-light p-30 mb-3 card">
                    <h3>Processing Orders</h3>
                    <p>We work hard to get your order out the door as quickly as possible. Typically, we’ll process and ship your order within <strong> 2 business days</strong> after payment is confirmed. However, during busy periods like sales or holidays, it may take a little longer. If any delays occur, we'll be sure to keep you updated. <br>
                       <i>Please note</i> : Our shipping partners do not operate on Sundays, so your order will not be processed on that day.
                        
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="bg-light p-30 mb-3 card">
                    <h3>Estimated Delivery Times</h3>
                    <p>We offer two main shipping options:</p>
                    <p>• <strong>	Standard Shipping:</strong> Expect your order within 5 to 7 business days. <br>
                        •	<strong>Expedited Shipping:</strong> Need it sooner? Get it in 3 to 5 business days.
                        These times are estimates and can vary based on your location, customs processes, or other unforeseen delays. For expedited shipping, an additional charge may apply, which will be added during checkout.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="bg-light p-30 mb-3 card">
                    <h3>Track Your Order</h3>
                    <p>Once your order is on its way, we’ll send you an email with your tracking number. You can easily follow the journey of your package by clicking on the link in the email or by logging into your account on our website.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="bg-light p-30 mb-3 card">
                    <h3>Shipping Limitations</h3>
                    <p>Certain items may not be eligible for shipping due to their size, weight, or other restrictions. If this applies to your order, we’ll notify you during checkout. If we can't ship your order, don’t worry—we’ll refund you within <strong> 5 days</strong> of notification.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="bg-light p-30 mb-3 card">
                    <h3>Make Sure Your Address is Correct</h3>
                    <p>To avoid any delays, please double-check that your shipping address and mobile number are accurate and complete. We are not responsible for orders shipped to incorrect or incomplete addresses. If your package needs to be reshipped because of an error, additional shipping fees will apply.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="contact-form bg-light p-30 card bg-secondary">
                    <h3>Delays Beyond Our Control</h3>
                   
                    <p>While we strive to get your order to you on time, please understand that there are some things beyond our control—like weather conditions, natural disasters, or postal service delays. We appreciate your patience in such cases.
                        
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="contact-form bg-light p-30 card bg-secondary">
                    <h3>Questions?</h3>
                   
                    <p>If you have any questions or concerns about your shipment or our shipping policy, we’re here to help! Just reach out to us at support@rarenomadfashion.com, and we’ll get back to you as soon as possible.
                        
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="contact-form bg-light p-30 card bg-secondary">
                   
                    <p>By placing an order with <strong>RareNomad Fashion</strong> , you acknowledge and agree to the terms outlined in this policy. We truly appreciate your business!
                        
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="contact-form bg-light p-30 card bg-secondary">
                   
                    <p>This version is more conversational and has a slightly friendlier tone while maintaining clarity. It avoids sounding too formal or generic, making it feel more like a personal interaction between the brand and the customer. Let me know if you'd like further tweaks!
                        
                    </p>
                </div>
            </div>
        </div>
    </div>
<!-- shiping End -->




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