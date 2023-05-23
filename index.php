<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.product.php';
include_once 'classes/class.order.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$product = new Product();
$order = new Order();

if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>ICA Ink</title>
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
    <script>
        function logout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location = "logout.php"; // Redirect to the logout script
            }
        }
    </script>
</head>
<body>
    <div id="navbar">
        <h1>ICA Ink</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=orders">Orders</a></li>
            <li class="dropdown">
                <a href="#">Settings<span>&rsaquo;</span></a>
                <ul>
                    <li><a href="index.php?page=settings&subpage=users">User Administration</a></li>
                    <li><a href="index.php?page=settings&subpage=products">Products</a></li>
                </ul>
            </li>
            <li><a href="#" onclick="logout()">Logout</a></li>
        </ul>
        <span class="loginprof"><?php echo $user->get_user_lastname($user_id) . ', ' . $user->get_user_firstname($user_id) . "<br>" . "(" .$user->get_user_access($user_id) . ")"; ?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span>
    </div>
    <div id="contents">
        <?php
        switch ($page) {
            case 'orders':
                require_once 'order-module/index.php';
                break;
            case 'settings':
                require_once 'settings-module/index.php';
                break;
            case 'products':
                require_once 'products-module/index.php';
                break;
            default:
                require_once 'main.php';
                break;
        }
        ?>
    </div>
</body>
</html>