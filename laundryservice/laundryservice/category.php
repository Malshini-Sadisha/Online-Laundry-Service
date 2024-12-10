<?php
// Include the database connection file
require_once('includes/conn.php');

// Fetch all user IDs
$query = "SELECT id FROM `products`";
$result = mysqli_query($conn, $query);
$ids = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/css.css"> <!--Link css file-->
    <script src="https://tympanus.net/Development/Elastislide/js/modernizr.custom.17475.js"></script>
</head>

<body>
    <!-- Elastislide Carousel -->
    <ul id="carousel" class="elastislide-list">
        <li><a href="#"><img src="https://www.svgrepo.com/show/381131/clothes-fashion-necktie-style-tie.svg" width="100px" height="100px" alt="image01" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/380347/clothes-fashion-homeless-poverty-tshirt.svg" width="100px" height="100px" alt="image02" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/387185/clothes-pants-sweat.svg" width="100px" height="100px" alt="image03" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/108239/women-dress.svg" width="100px" height="100px" alt="image04" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/55764/sexy-female-dress-black-shape.svg" width="100px" height="100px" alt="image05" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/21506/women-suit.svg" width="100px" height="100px" alt="image06" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/513946/tshirt-clothes-heart.svg" width="100px" height="100px" alt="image07" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/508348/pink-tshirt.svg" width="100px" height="100px" alt="image08" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/507107/clo-polo.svg" width="100px" height="100px" alt="image09" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/503989/celana-clothes-wear.svg" width="100px" height="100px" alt="image10" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/501910/skirt.svg" width="100px" height="100px" alt="image11" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/495445/lovely.svg" width="100px" height="100px" alt="image12" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/396331/dress.svg" width="100px" height="100px" alt="image13" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/384555/dress-womens.svg" width="100px" height="100px" alt="image14" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/299631/dress.svg" width="100px" height="100px" alt="image15" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/393096/dress.svg" width="100px" height="100px" alt="image16" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/313196/dress.svg" width="100px" height="100px" alt="image17" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/298374/dress-stylish.svg" width="100px" height="100px" alt="image18" /></a></li>
        <li><a href="#"><img src="https://www.svgrepo.com/show/312070/dress.svg" width="100px" height="100px" alt="image19" /></a></li>
    </ul>
    <!-- End Elastislide Carousel -->
    <main class="main-container">

        <section class="section">
            <h2 class="text-center">All Products</h2>
            <div class="products">
                <?php

                // Prepare and execute the SQL query to retrieve all records
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display the retrieved records
                    while ($row = $result->fetch_assoc()) {
                        $product_id = $row['id'];
                        $imageLink = $row['product_image'];
                        $productName = $row['product_name'];
                        $productPrice = $row['product_price'];

                        echo '<div class="product">';
                        echo '<img class="product__image" src="' . $imageLink . '" alt="Smoothie">';
                        echo '<h2 class="product__name">' . $productName . '</h2>';
                        echo '<h3 class="product__price">' . $productPrice . '</h3>';
                        echo '<button class="btn btn--primary delete-product" data-product-id="' . $product_id . '">Delete Product</button>';
                        echo '</div>';
                    }
                } else {
                    echo "No records found.";
                }

                // Close the database connection
                $conn->close();

                ?>
            </div>
        </section>

        <section class="section">
            <h2 class="text-center">Add New Product</h2>
            <form action="includes/insert_product.php" method="post" enctype="multipart/form-data">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required>

                <label for="productPrice">Product Price:</label>
                <input type="number" id="productPrice" name="productPrice" required>

                <label for="productImage">Product Image:</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" required>

                <input type="submit" value="Submit">
            </form>
            <hr style="color: #000;">
            <h2 class="text-center">Edit Product</h2>
            <form id="update-product-form">
                <div>
                    <label for="product-name">Product ID:</label>
                    <select id="id" name="id">
                        <option>Select a product ID:</option>
                        <?php foreach ($ids as $id) : ?>
                            <option value="<?php echo $id['id']; ?>"><?php echo $id['id']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="productName" name="productName">
                    </select>
                </div>
                <div>
                    <label for="product-price">Product Price:</label>
                    <input type="text" id="productPrice" name="productPrice">
                </div>
                <div>
                    <label for="product-image">Product Image:</label>
                    <input type="number" id="productImage" name="productImage">
                </div>
                <input type="submit" value="Update Product">
            </form>

        </section>

    </main>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://tympanus.net/Development/Elastislide/js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="https://tympanus.net/Development/Elastislide/js/jquery.elastislide.js"></script>
    <script type="text/javascript">
        $('#carousel').elastislide({
            minItems: 2
        });
    </script>
    <script type="text/javascript" src="js/js.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete-product').on('click', function() {
                var productID = $(this).data('product-id');

                $.ajax({
                    url: 'includes/delete_product.php',
                    type: 'POST',
                    data: {
                        productID: productID
                    },
                    success: function(response) {
                        alert(response); // Display the response message after deletion
                        window.location.href = 'category.php'; // Redirect to category.php
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#id').on('change', function() {
                var id = $(this).val();
                $.ajax({
                    url: 'fetchproductsdata.php',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        $('#productName').val(data.product_name);
                        $('#productPrice').val(data.product_price);
                        $('#productImage').val(data.product_image);
                    }
                });
            });
        });
    </script>
</body>