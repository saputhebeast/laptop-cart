<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $customer_id = $_SESSION['customer_id'];

    $sql = "SELECT * FROM customer WHERE customer_id = '$customer_id';";
    $result = mysqli_query($conn, $sql);
    
    $row = $result->fetch_assoc();
    $password = $row['password'];
    
    $oldPassword = $_POST['old-password'];
    $newPassword = $_POST['new-password'];
    $confirmNewPassword = $_POST['confirm-new-password'];

    if ((empty($newPassword)) && (empty($confirmNewPassword))) {
        header("Location: admin-manage-user-password.php?error=empty blanks not valid");
        exit();
    }elseif($password !== $oldPassword){
            header("Location: admin-manage-user-password.php?error=incorrect old password");
            exit();
    }elseif ($newPassword !== $confirmNewPassword) {
        header("Location: admin-manage-user-password.php?error=new password and confirm new password doesn't match");
        exit();
    }elseif (($oldPassword === $password) && ($newPassword === $confirmNewPassword)) {
        $sql = "UPDATE customer SET password = '$confirmNewPassword' WHERE customer_id = '$customer_id';";
        mysqli_query($conn, $sql);
        
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script type='text/javascript'>";
            echo "alert('Updated Password Successfully');";
            echo "window.location.href = 'admin-manage-user.php'";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Not Updated');";
            echo "window.location.href = 'admin-manage-user.php'";
            echo "</script>";
        }
    }
?>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>