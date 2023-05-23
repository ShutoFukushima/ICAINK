<?php
include '../classes/class.order.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'create':
        create_new_transaction();
	break;
    case 'additem':
        new_order_item();
	break;
    case 'saveitem':
        save_order_items();
	break;
}

function create_new_transaction(){
	$order = new Order();
    $name= ucwords($_POST['sname']);
    $or_add= ucwords($_POST['or_add']); 
    $amount= $_POST['amount']; 
    $rid = $order->new_order($name, $or_add, $amount);
    if(is_numeric($rid)){
        header('location: ../index.php?page=orders&action=order&id='.$rid);
    }
}

function new_order_item(){
	$order = new Order();
    $orderid= $_POST['orderid'];
    $prodid= $_POST['prodid']; 
    $qty= $_POST['qty']; 
    $rid = $order->new_order_item($orderid, $prodid, $qty);
    if($rid){
        header('location: ../index.php?page=orders&action=order&id='.$orderid);
    }
}

function save_order_items(){
	$order = new Order();
    $orderid = $_POST['orderid'];
    $rid = $order->save_order_items($orderid);
    if($rid){
        header('location: ../index.php?page=orders&action=order&id='.$orderid);
    }
}