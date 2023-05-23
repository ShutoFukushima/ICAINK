<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "order-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<div id="content">
<div id="third-submenu">
    <a href="index.php?page=orders">Order List</a>
    <a href="index.php?page=orders&action=create">New Order</a> 

   <h> Search </h><input type="text" id="search" name="search" onkeyup="showResults(this.value)">
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'order-module/create-transaction.php';
                break; 
                case 'order':
                    require_once 'order-module/view-order.php';
                break; 
                case 'profile':
                    require_once 'order-module/view-product.php';
                break;
                case 'types':
                    require_once 'order-module/list-product-types.php';
                break;
                case 'upload':
                    require_once 'order-module/imageupload.php';
                break;
                default:
                    require_once 'order-module/main.php';
                break; 
            }
    ?>
  </div>
      </div>