<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
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
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Start -->
<div class="container">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing
                    Address</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="first_name" id="first_name" placeholder="John"
                            required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Doe"
                            required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="example@email.com"
                            required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" name="mobile" id="mobile" placeholder="+123 456 789"
                            required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input class="form-control" type="text" name="address1" id="address1" placeholder="123 Street"
                            required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input class="form-control" type="text" name="address2" id="address2" placeholder="123 Street"
                            required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select class="custom-select" name="country" id="country" required>
                            <option selected>Country</option>
                            <option>Afghanistan</option>
                            <option>USA</option>
                            <option>India</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control" type="text" name="city" id="city" placeholder="Delhi" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <input class="form-control" type="text" name="state" id="state" placeholder="" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" name="zip" id="zip" placeholder="123" required>
                    </div>
                </div>
            </div>
            <div class="collapse mb-5" id="shipping-address">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping
                        Address</span></h5>
                <div class="bg-light p-30">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe" required >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" required>
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order
                    Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    <div id="checkout-products">
                        <!-- Product rows will be dynamically inserted here -->
                    </div>
                </div><br>
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Total MRP</h6>
                        <h6 id="checkout-subtotal">₹ 0</h6> <!-- Updated dynamically -->
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Discount MRP</h6>
                        <h6 id="discount"><span style="color:green">₹ 0</span></h6> <!-- Updated dynamically -->
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Coupon Discount</h6>
                        <h6 id="coupon"><span style="color:red">Apply Coupon</span></h6> <!-- Updated dynamically -->
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="font-weight-medium">Platfrom</h6>
                        <h6 class="font-weight-medium"><span style="color:green">Free</span></h6> <!-- Shipping cost -->
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium"><span style="color:green">Free</span></h6> <!-- Shipping cost -->
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id="checkout-total">₹ 10</h5>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span
                        class="bg-secondary pr-3">Payment</span></h5>
                <div class="bg-light p-30">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="cod">
                            <label class="custom-control-label" for="cod">Cash on Delivery</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="razorpay">
                            <label class="custom-control-label" for="razorpay">Razorpay</label>
                        </div>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit" name="btn" id="btn"
                        onclick="pay_now()">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->

<style>
    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .cart-item div {
        flex: 1;
    }

    .cart-item .product-name {
        text-align: left;
    }

    .cart-item .product-price {
        text-align: right;
    }
</style>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function pay_now() {
        var first_name = jQuery('#first_name').val();
        var last_name = jQuery('#last_name').val();
        var email = jQuery('#email').val();
        var mobile = jQuery('#mobile').val();
        var address1 = jQuery('#address1').val();
        var address2 = jQuery('#address2').val();
        var country = jQuery('#country').val();
        var city = jQuery('#city').val();
        var state = jQuery('#state').val();
        var zip = jQuery('#zip').val();
        var payment_method = jQuery('input[name="payment"]:checked').attr('id');
        var total = parseFloat(jQuery('#checkout-total').text().replace('₹ ', ''));

        // Form validation
        if (!first_name || !last_name || !email || !mobile || !address1 || !address2 || !country || !city || !state || !zip || !payment_method) {
            Swal.fire({
                icon: 'error',
                title: 'Form Incomplete!',
                text: 'Please fill in all required fields.',
                confirmButtonText: 'OK'
            });
            return;
        }

        jQuery.ajax({
            type: 'post',
            url: 'verify_payment.php',
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                mobile: mobile,
                address1: address1,
                address2: address2,
                country: country,
                city: city,
                state: state,
                zip: zip,
                payment_method: payment_method,
                total: total
            },
            success: function (result) {
                console.log('AJAX Success:', result);
                var response = JSON.parse(result);
                if (response.status === 'success') {
                    if (payment_method === 'razorpay') {
                        var options = {
                            "key": "rzp_live_HUEKQK9fvg1eUd", // Replace with your Razorpay API key
                            "amount": total * 100, // Amount is in paise (70000 = ₹700)
                            "currency": "INR",
                            "name": "Rare Nomad.",
                            "description": "Test Transaction",
                            "handler": function (response) {
                                console.log(response.razorpay_payment_id);
                                alert(response.razorpay_payment_id);

                                jQuery.ajax({
                                    type: 'post',
                                    url: 'verify_payment.php',
                                    data: { payment_id: response.razorpay_payment_id },
                                    success: function (result) {
                                        console.log('Payment Verification Success:', result);
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Order Completed!',
                                            text: 'Your order has been successfully placed.',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = "CheckOut.php";
                                            }
                                        });
                                    }
                                });
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Order Completed!',
                            text: 'Your order has been successfully placed.',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "CheckOut.php";
                            }
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Order Failed!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', xhr, status, error);
                Swal.fire({
                    icon: 'error',
                    title: 'Order Failed!',
                    text: 'An error occurred while processing your order.',
                    confirmButtonText: 'OK'
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        // Initialize counts and IDs from localStorage or set to empty arrays
        let cartData = JSON.parse(localStorage.getItem('cartData')) || { count: 0, ids: [] };

        // Fetch product details using AJAX
        if (cartData.ids.length > 0) {
            fetch('fetch_products.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ productIds: cartData.ids })
            })
                .then(response => response.json())
                .then(data => {
                    const checkoutProducts = document.getElementById('checkout-products');
                    checkoutProducts.innerHTML = ''; // Clear existing content

                    if (data.products.length > 0) {
                        data.products.forEach(product => {
                            const productRow = `
                                <div class="cart-item" data-price="${product.discount_price}" data-original-price="${product.product_price}" data-id="${product.id}">
                                    <div class="product-name">${product.product_name}</div>
                                    <div class="product-price">₹ ${product.discount_price}</div>
                                </div>
                            `;
                            checkoutProducts.innerHTML += productRow;
                        });

                        // Update cart summary
                        updateCartSummary();
                    } else {
                        checkoutProducts.innerHTML = '<div>No products in the cart</div>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                });
        } else {
            document.getElementById('checkout-products').innerHTML = '<div>No products in the cart</div>';
        }

        // Function to update subtotal, total, and discount
        function updateCartSummary() {
            const cartItems = document.querySelectorAll(".cart-item");
            let subtotal = 0;
            let totalDiscount = 0;

            cartItems.forEach((item) => {
                const price = parseInt(item.dataset.price, 10);
                const originalPrice = parseInt(item.dataset.originalPrice, 10);
                subtotal += price;
                totalDiscount += (originalPrice - price);
            });

            const shipping = 0; // Static shipping cost
            document.getElementById("checkout-subtotal").textContent = `₹ ${subtotal}`;
            document.getElementById("checkout-total").textContent = `₹ ${subtotal + shipping}`;
            document.getElementById("discount").textContent = `₹ ${totalDiscount}`; // Update discount MRP
        }
    });

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
    });
</script>

<?php include 'inc/footer.php'; ?>
