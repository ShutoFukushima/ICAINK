<?php
class Order{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='icaink_db';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_order($sname,$or_add,$amount){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$sname,$or_add,$amount,$NOW,$NOW,'0'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_order(order_customer, order_address, order_amount, order_date_added, order_time_added,order_saved) VALUES (?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}
	public function list_product_type(){
		$sql="SELECT * FROM tbl_type";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
    }
    public function list_order_search($keyword){
		
		//$keyword = "%".$keyword."%";

		$q = $this->conn->prepare('SELECT * FROM `tbl_order` WHERE `order_customer` LIKE ?');
		$q->bindValue(1, "%$keyword%", PDO::PARAM_STR);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]= $r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	public function list_order(){
		$sql="SELECT * FROM tbl_order";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	function get_order_customer($id){
		$sql="SELECT order_customer FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_customer = $q->fetchColumn();
		return $order_customer;
	}
	function get_order_date($id){
		$sql="SELECT order_date_added FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_date_added = $q->fetchColumn();
		return $order_date_added;
	}
	function get_order_amount($id){
		$sql="SELECT order_amount FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	function get_order_save($id){
		$sql="SELECT order_saved FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_saved = $q->fetchColumn();
		return $order_saved;
    }
	public function list_order_items($id){
		$sql="SELECT * FROM tbl_order_items WHERE order_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	public function new_order_item($orderid,$prodid,$qty){
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$orderid,$prodid,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_order_items(order_id, prod_id, order_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	public function save_order_items($id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$status = 1;
		$sql = "UPDATE tbl_order SET order_saved=:order_saved WHERE order_id=$id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':order_saved'=>$status));
		return true;
	}	
}