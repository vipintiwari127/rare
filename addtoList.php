<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
// }
include './inc/header.php';
include './inc/sidebar.php';
include 'admin/config.php';
?>


<style>
 
    .container {
        margin-top: 20px;
    }

    .product-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .product-details {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product-details img {
        width: 80px;
        border-radius: 5px;
    }

    .price-details {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .total-amount {
        font-size: 18px;
        font-weight: bold;
    }

    .btn-orange {
        background-color: #ff5722;
        color: #fff;
        font-weight: bold;
    }

    .btn-orange:hover {
        background-color: #e64a19;
    }

    @media (max-width: 768px) {
        .product-details {
            flex-direction: column;
            align-items: flex-start;
        }

        .price-details {
            margin-top: 15px;
        }
    }
</style>

<body>

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


    <div class="container">
        <div class="row" id="product-section">
            <!-- Products will be loaded here -->
        </div>
    </div>

    <script>
        let products = [];

        document.addEventListener('DOMContentLoaded', (event) => {
            // Initialize counts and IDs from localStorage or set to empty arrays
            let wishlistData = JSON.parse(localStorage.getItem('wishlistData')) || { count: 0, ids: [] };

            // Fetch product details using AJAX
            if (wishlistData.ids.length > 0) {
                fetch('fetch_wishlist.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ productIds: wishlistData.ids })
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const productSection = document.getElementById('product-section');
                        productSection.innerHTML = ''; // Clear existing content

                        if (data.products.length > 0) {
                            products = data.products;
                            data.products.forEach(product => {
                                const productCard = `
                                <div class="product-card" data-product-id="${product.id}">
                                    <div class="product-details">
                                        <img src="${product.image_paths}" alt="Product Image">
                                        <div class="ml-3">
                                            <a href="single-item.php?id=${product.id}" class="product-name-link">
                                                <h5>${product.product_name}</h5>
                                            </a>
                                            <p class="text-muted mb-1">${product.color}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="mb-1"><del>₹${product.product_price}</del> <strong class="text-danger">₹${product.discount_price}</strong></p>
                                            <p class="text-info">2 offers available</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div class="input-group" style="width: 100px;">
                                            <div class="input-group-prepend">
                                                <button class="btn" onclick="updateQuantity(${product.id}, -1)">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center" id="quantity-${product.id}" value="1" readonly>
                                            <div class="input-group-append">
                                                <button class="btn" onclick="updateQuantity(${product.id}, 1)">+</button>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#" class="text-muted" onclick="saveForLater(${product.id})">SAVE FOR LATER</a>
                                            <i class="fa fa-heart text-danger ml-2" onclick="removeFromWishlist(${product.id})"></i>
                                        </div>
                                    </div>
                                </div>
                            `;
                                productSection.innerHTML += productCard;
                            });

                            // Update total price
                            updateTotal(data.products);
                        } else {
                            productSection.innerHTML = '<p>No Record found</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching products:', error);
                    });
            } else {
                document.getElementById('product-section').innerHTML = '<p>No products in the cart</p>';
            }
        });

        function updateTotal(products) {
            let totalItemsPrice = 0;
            let totalDiscount = 0;
            let totalPrice = 0;

            products.forEach(product => {
                const discountedPrice = product.product_price - product.discount_price;
                totalItemsPrice += product.product_price * product.quantity;
                totalDiscount += product.discount_price * product.quantity;
                totalPrice += discountedPrice * product.quantity;
            });

        }

        function updateQuantity(productId, change) {
            const product = products.find(p => p.id === productId);
            if (product) {
                product.quantity = Math.max(1, product.quantity + change); // Ensure quantity is at least 1
                document.getElementById(`quantity-${productId}`).value = product.quantity;
                updateTotal(products);
            }
        }

        function removeFromWishlist(productId) {
    // Remove product from the array
    const productIndex = products.findIndex(p => p.id.toString() === productId.toString());
    if (productIndex !== -1) {
        products.splice(productIndex, 1);

        // Remove the product card from the UI
        const productCard = document.querySelector(`.product-card[data-product-id="${productId}"]`);
        if (productCard) {
            productCard.parentNode.removeChild(productCard);
        }

        // Update total price
        updateTotal(products);

        // Update localStorage for products
        localStorage.setItem('products', JSON.stringify(products));

        // Update localStorage for wishlistData
        let wishlistData = JSON.parse(localStorage.getItem('wishlistData').toString()) || { count: 0, ids: [] };
        const index = wishlistData.ids.indexOf(productId.toString());
        // console.log(`This is productId : ${productId}`);
        // console.log(`This is index : ${index}`)
        console.log(wishlistData)
        if (index !== -1) {
            wishlistData.ids.splice(index, 1);
            wishlistData.count--;
            localStorage.setItem('wishlistData', JSON.stringify(wishlistData));
        }

        // Update the UI with the new wishlist count
        const wishlistCountElement = document.getElementById('wishlistCount');
        if (wishlistCountElement) {
            wishlistCountElement.innerText = wishlistData.count;
        } else {
            console.error('Element with ID "wishlistCount" not found');
        }
    } else {
        console.error('Product ID not found in products array');
    }
}


        // Ensure products are loaded from localStorage on page load
        document.addEventListener('DOMContentLoaded', () => {
            const storedProducts = localStorage.getItem('products');
            if (storedProducts) {
                products = JSON.parse(storedProducts);
                // Render products or update UI based on the loaded products
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

            document.querySelectorAll('.remove-from-cart').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    let itemId = button.getAttribute('data-id'); // Assuming you have a data-id attribute on the button
                    if (cartData.ids.includes(itemId)) {
                        cartData.ids = cartData.ids.filter(id => id !== itemId);
                        cartData.count--;
                        document.getElementById('cartCount').innerText = cartData.count;
                        localStorage.setItem('cartData', JSON.stringify(cartData)); // Update localStorage
                    }
                });
            });

            document.querySelectorAll('.remove-from-wishlist').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    let itemId = button.getAttribute('data-id'); // Assuming you have a data-id attribute on the button
                    if (wishlistData.ids.includes(itemId)) {
                        wishlistData.ids = wishlistData.ids.filter(id => id !== itemId);
                        wishlistData.count--;
                        document.getElementById('wishlistCount').innerText = wishlistData.count;
                        localStorage.setItem('wishlistData', JSON.stringify(wishlistData)); // Update localStorage
                    }
                });
            });
        });
    </script>

    <?php include 'inc/footer.php'; ?>