<?php
include_once '../classes/class.product.php';
//include '../config/config.php';
$product = new Product();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
   <th>#</th>
        <th>Product Image</th>
        <th>Product Description</th>
        <th>Product Size</th>
        <th>Type</th>
        <th>Price</th>
</tr>';
$data = $product->list_product_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$prod_name. '</li>';
        $hint .= '
       <tr>
        <td>'.$count.'</td>
        <td><img src="img/'.$prod_image.'" class="tmbnail"/></td>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id='.$prod_id.'">'.$prod_name.'</a></td>
        <td>'.$prod_description.'</td>
        <td>'.$product->get_prod_type_name($product->get_prod_type($prod_id)).'</td>
        <td>'.$prod_price.'</td>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>