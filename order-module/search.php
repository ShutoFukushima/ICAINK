<?php
include_once '../classes/class.order.php';
//include '../config/config.php';
$order = new Order();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
   <th>#</th>
        <th>Order Date / ID</th>
        <th>Customer Name</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Status</th>
      </tr>';
$data = $order->list_order_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);
        
        $status = "";
        if ($order_saved == "0") {
        $status = "<span style='color: red;'>Order Processing</span>";
        } else {
        $status = "<span style='color: green;'>Order Done</span>";
        }   
        //$hint .= '<li>'.$prod_name. '</li>';
        $hint .= '
       <tr>
        <td>'.$count.'</td>
         <td><a href="index.php?page=orders&action=order&id='.$order_id.'">'.$order_id.'-'.$order_date_added.'</a></td></td>
         <td>'.$order_customer.'</td>
        <td>'.$order_address.'</td>
        <td>'.$order_amount.'</td>
        <td>'.$status.'</td>
  
</td>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>