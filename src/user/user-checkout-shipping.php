<?php
    require "../resources/config.php";
    session_start();
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php require "header.php"?>

    <!-- get user details -->
    <?php
    $customer_id = $_SESSION['customer_id'];
    
    $sql = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc()){
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $street_address = $row['street_address'];
        $city = $row['city'];
        $postal_code = $row['postal_code'];
        $phone = $row['phone'];
    }
    ?>
    <style>
        .container {
            margin-top: 30px;
        }
        .media-body a{
            color: black;
        }
        .media-body a:hover{
            text-decoration: none;
        }
        .card{
            margin-bottom: 10px;
        }
        h6{
            font-weight: normal;
        }
    </style>
    <div class="container">
        <h1>Order Review</h1>
    </div>
    <div class="container">

            <?php
            $sql = "SELECT * FROM cart WHERE cart_customer_id = '$customer_id'";
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc()){
                $item_type = $row['cart_item_type'];
                if ($item_type == 'mouse'){
                    $link = 'view-full-mouse-details.php';
                    $id = 'mouse_id';
                }elseif ($item_type == 'keyboard'){
                    $link = 'view-full-keyboard-details.php';
                    $id = 'keyboard_id';
                }elseif ($item_type == 'laptop'){
                    $link = 'view-full-laptop-details.php';
                    $id = 'laptop_id';
                }
                ?>

        <div class="card">
                <div class="card-body">
                    <div class="media position-relative">
                        <img src="<?php echo $row['cart_item_image']?>" class="mr-3" alt="..." width="120" height="120">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="<?php echo $link?>?<?php echo $id?>=<?php echo $row['item_id']?>"><?php echo $row['cart_item_model']?></a></h5>
                            <h6>Quantity: <?php echo $row['cart_item_quantity']?></h6>
                            <?php $price = number_format($row['cart_item_price'], 2); ?>
                            <h6><?php echo ucfirst($row['cart_item_type'])?> Price Rs: <?php echo $row['cart_item_price']?></h6>
                            <h6>Total Price Rs: <?php echo number_format($row['cart_item_quantity'] * $row['cart_item_price'], 2)?>
                        </div>
                    </div>
                </div>
        </div>
                <?php
            }
            ?>
        <div class="card">
            <div class="card-body">
                <?php $total = number_format($_SESSION['total'], 2);?>
                Total Price Rs: <?php echo $total?>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Shipping Details</h1>
    </div>
    <div class="container">
        <form action="user-checkout-shipping-submit.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?php echo $first_name?>">
                </div>
                <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo $last_name?>">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $email?>">
            </div>
            <div class="form-group">
                <label for="street_address">Street Address</label>
                <input type="text" class="form-control" placeholder="Address" name="street_address" value="<?php echo $street_address?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $city?>">
                </div>
                <div class="form-group col-md-2">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" value="<?php echo $postal_code?>">
                </div>
                <div class="form-group col-md-4">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $phone?>">
                </div>
            </div>
            <div class="form-group check">
                <input type="checkbox" name="detailsCheck" id="" required> I hereby certify that the above details are true and correct
            </div>
            <div class="form-group submit">
                <button type="submit" class="btn btn-primary btn-block">Continue to Payment</button>
            </div>
        </form>
    </div>
    <?php require "footer.php"?>

<?php
    }else{
        header("Location: user-login.php");
        exit();
    }
?>