<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }
include './inc/header.php';
include './inc/sidebar.php';
include './admin/config.php';
?>
<style>
 

    body {
        background-color: #f9f9f9;
        color: #333;
        padding: 20px;
    }

    .container {
        max-width: 600px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .section {
        margin-bottom: 20px;
    }

    h2 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #444;
    }

    .coupon-section,
    .donation-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .gifting-section {
        margin-top: 5px;
        padding: 6px;
    }

    .coupon-input {
        flex: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
    }

    .apply-btn,
    .gift-btn {
        padding: 8px 10px;
        background: #ff6f61;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 13px;
    }

    .apply-btn:hover,
    .gift-btn:hover {
        background: #ff4b39;
    }

    .info {
        font-size: 12px;
        color: #666;
        margin-bottom: 5px;
        margin-top: 2px;
    }

    .highlight {
        color: #ff6f61;
        font-weight: bold;
    }

    .donation-section label {
        margin-right: 15px;
    }

    .price-details {
        background: #f4f4f4;
        padding: 15px;
        border-radius: 8px;
    }

    .price-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .discount {
        color: #ff4b39;
    }

    .free {
        color: #28a745;
    }

    .total-row {
        font-weight: bold;
        font-size: 16px;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    @media (max-width: 767px) {
    .section img {
        max-height: 50px; /* Adjust the height as per your requirement */
    }
}

    .apply-coupon {
        color: #007bff;
        text-decoration: none;
        font-size: 14px;
    }

    .apply-coupon:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-7 table-responsive mb-2">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="cart-items">
                        <!-- Product rows will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary Section -->
            <div class="col-lg-5">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-2" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="section">
    <h2>Gifting & Personalisation</h2>
    <div class="row w-100 ms-1"
        style="background-color: rgba(223, 189, 126, 0.74); opacity: 0.9; display: flex;">
        <div class="col-lg-3">
            <img class="img-fluid h-auto" src="img/coopan-removebg-preview.png" alt="" style="max-height: 150px; object-fit: contain;" />
        </div>
        <div class="col-lg-6">
            <div class="gifting-section">
                <p><b>Buying for a loved one?</b></p>
                <p class="info">
                    Gift wrap and personalised message on card, <br />
                    only for <span class="highlight">₹35</span>
                </p>
                <button class="gift-btn mt-2">ADD GIFT WRAP</button>
            </div>
        </div>
    </div>
</div>

                <!-- Cart Summary Section -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Total MRP</h6>
                            <h6 id="subtotal">₹ 0</h6> <!-- Updated dynamically -->
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Discount MRP</h6>
                            <h6 id="discount"><span style="color:green">₹ 0</span></h6> <!-- Updated dynamically -->
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Coupon Discount</h6>
                            <h6 id="coupon"><span style="color:red">Apply Coupon</span></h6>
                            <!-- Updated dynamically -->
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="font-weight-medium">Platfrom</h6>
                            <h6 class="font-weight-medium"><span style="color:green">Free</span></h6>
                            <!-- Shipping cost -->
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"><span style="color:green">Free</span></h6>
                            <!-- Shipping cost -->
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="total">0</h5> <!-- Updated dynamically -->
                        </div>
                        <a href="CheckOut.php"> <button
                                class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To
                                Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Initialize counts and IDs from localStorage or set to empty arrays
            let cartData = JSON.parse(localStorage.getItem('cartData')) || { count: 0, ids: [] };

            // Fetch product details using AJAX
            if (cartData.ids.length > 0) {
                fetch('fetch_products1.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ productIds: cartData.ids })
                })
                    .then(response => response.json())
                    .then(data => {
                        const cartItems = document.getElementById('cart-items');
                        cartItems.innerHTML = ''; // Clear existing content

                        if (data.products.length > 0) {
                            data.products.forEach(product => {
                                const productRow = `
                            <tr class="cart-item" data-price="${product.product_price}" data-original-price="${product.original_price}" data-id="${product.id}">
                                <td class="align-middle"><img src="${product.image_paths}" alt="" style="width: 50px;"> <a href="single-item.php?id=${product.id}">${product.product_name}</a></td>
                                <td class="align-middle">₹ ${product.product_price}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="number" class="form-control form-control-sm bg-secondary border-0 text-center quantity-input" value="1" min="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle total-price">₹ ${product.product_price}</td>
                                <td class="align-middle">
                                    <button class="btn btn-sm btn-danger remove-btn">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                                cartItems.innerHTML += productRow;
                            });

                            // Update cart summary
                            updateCartSummary();

                            // Attach event listener to Remove buttons
                            document.querySelectorAll(".remove-btn").forEach((button) => {
                                button.addEventListener("click", function () {
                                    const row = this.closest(".cart-item");
                                    const itemId = row.dataset.id;
                                    row.remove(); // Remove row

                                    // Update local storage
                                    cartData.ids = cartData.ids.filter(id => id !== itemId);
                                    cartData.count = cartData.ids.length;
                                    localStorage.setItem('cartData', JSON.stringify(cartData));

                                    // Update cart summary
                                    updateCartSummary();
                                });
                            });

                            // Update total on quantity change
                            document.querySelectorAll(".quantity-input").forEach((input) => {
                                input.addEventListener("change", updateCartSummary);
                            });

                            // Quantity increment and decrement functionality
                            document.querySelectorAll(".btn-minus").forEach((button) => {
                                button.addEventListener("click", function () {
                                    const input = this.closest(".quantity").querySelector(".quantity-input");
                                    if (input.value > 1) {
                                        input.value--;
                                        updateCartSummary();
                                    }
                                });
                            });

                            document.querySelectorAll(".btn-plus").forEach((button) => {
                                button.addEventListener("click", function () {
                                    const input = this.closest(".quantity").querySelector(".quantity-input");
                                    input.value++;
                                    updateCartSummary();
                                });
                            });
                        } else {
                            cartItems.innerHTML = '<tr><td colspan="5">No products in the cart</td></tr>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching products:', error);
                    });
            } else {
                document.getElementById('cart-items').innerHTML = '<tr><td colspan="5">No products in the cart</td></tr>';
            }

            // Function to update subtotal and total
            function updateCartSummary() {
                const cartItems = document.querySelectorAll(".cart-item");
                let subtotal = 0;
                let discount = 0;

                cartItems.forEach((item) => {
                    const price = parseInt(item.dataset.price, 10);
                    const originalPrice = parseInt(item.dataset.originalPrice, 10);
                    const quantity = parseInt(item.querySelector(".quantity-input").value, 10);
                    const totalPrice = price * quantity;
                    const totalDiscount = (originalPrice - price) * quantity;
                    subtotal += totalPrice;
                    discount += totalDiscount;
                    item.querySelector(".total-price").textContent = `₹ ${totalPrice}`;
                });

                const shipping = 0; // Static shipping cost
                document.getElementById("subtotal").textContent = `₹ ${subtotal}`;
                document.getElementById("discount").textContent = `₹ ${discount}`;
                document.getElementById("total").textContent = `₹ ${subtotal + shipping}`;
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
    <!-- Footer Start -->
    <?php include 'inc/footer.php'; ?>