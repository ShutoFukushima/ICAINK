<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.product.php';
?>
<div id="content">
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                case 'products':
                    require_once 'products-module/index.php';
                break; 
                case 'category':
                    require_once 'products-module/list-item-category.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>