<?php 
    require "../resources/config.php";
    $laptop_brand = $_GET['laptop_brand'];
    if ($laptop_brand == 'Acer') {
        $tagline = 'explore beyond limits';
    }
    else if ($laptop_brand == 'Asus') {
        $tagline = 'Inspiring Innovation • Persistent Perfection';
    }
    else if ($laptop_brand == 'MSI') {
        $tagline = 'Innovation with Style';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/user/user.css">
    <title><?php echo $laptop_brand?> Laptops</title>
</head>
<body>
    <style>
        img {
            display:block;
            margin:auto;
        }
        .container{
            margin-top: 10px;
            padding-top: 10px;
        }
    </style>

    <?php require "header.php"?>

    <div class="jumbotron jumbotron-fluid bg-muted">
        <div class="container">
            <h1 class="display-4"><?php echo $laptop_brand?> Laptops</h1>
            <p class="lead"><?php echo $tagline?></p>
        </div>
    </div>

    <!-- all laptop -->
    <div class="laptop">
        <div class="container">
            <?php
                $sql = "SELECT * FROM laptop WHERE laptop_brand = '$laptop_brand'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='row'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='col'>";
                        ?>
                        <div class="card mb-3" style="width: 20rem;">
                            <div class="card text-center" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['laptop_model']?></h5>
                                <p class="card-text">
                                    <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                                    <?php echo "Rs: ".number_format($row['price'], 2)?>
                                </p>
                                <a href="view-full-laptop-details.php?laptop_id=<?php echo $row['laptop_id']?>" class="btn btn-primary">Full Details</a>
                            </div>
                            </div>
                        </div>
                        <?php
                        echo "</div>";
                    }
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <?php require "footer.php"?>
</body>
</html>