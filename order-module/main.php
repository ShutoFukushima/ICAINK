<span id="search-result">
<h3>Order Details</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Order Date / ID</th>
        <th>Customer Name</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Status</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($order->list_order() != false){
foreach($order->list_order() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=orders&action=order&id=<?php echo $order_id;?>"><?php echo $order_date_added.' - '.$order_id;?></a></td>
        <td><?php echo $order_customer;?></td>
          <td><?php echo $order_address;?></td>
          <td><?php echo $order_amount;?></td>
      <td>
    <?php 
    if($order_saved == 0){
        echo '<span style="color:red;">Order Processing</span>';
    } else {
        echo '<span style="color:green;">Order Done</span>';
    }
    ?>
</td>

      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>