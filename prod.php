<?php
class Product{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "ecomm";
	private $productTable = 'product';
	private $categoryTable='category';
	private $productdesc='product_desc';
	private $color='color'; 
	private $dbConnect = false;
	private $cat=array();
	private $cid=array();
	private $type=array();
	// private $catid=array();
	// private $grp=array();
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
		if(isset($_GET['type']))
		{
			$protype=$_GET['type'];
			$primaryquery="SELECT * FROM `category` INNER JOIN `product` ON product.Category_ID=category.category_id INNER JOIN `color` ON color.product_id=product.Product_id INNER JOIN `product_desc` ON product_desc.cid=color.cid WHERE product_desc.product_type='$protype';";
			$result=$conn->query($primaryquery);
			while($row=$result->fetch_assoc())
			{
				$this->cat[]=$row['category_id'];
				$this->cid[]=$row['cid'];
				$this->type[]=$row['product_type'];
			}
		}
    }
	// public function join(){
	// 	$sql="SELECT * FROM `category` INNER JOIN `product` ON product.Category_ID=category.category_id INNER JOIN `color` ON color.product_id=product.Product_id INNER JOIN `product_desc` ON product_desc.cid=color.cid";
	// 	return  $this->getData($sql);
	// }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function cleanString($str){
		return str_replace(' ',' ',$str);
	}
	public function getGrp()
	{
		$sql="";
		if(isset($_POST['grp']))
		{
			$grp=$_POST['grp'];
			// $sql.=" WHERE grp IN ('".implode("','",$grp)."')";
		}
		$sqlQuery="SELECT grp FROM `product` $sql GROUP BY grp";
		return  $this->getData($sqlQuery);
	}
	public function getCategories() {	
		$sql="";
		$catid=array();
		if(isset($_POST['grp']))
		{
			$grp=$_POST['grp'];
			// $sub="SELECT grp FROM product WHERE grp IN ('".implode("','",$grp)."')";
			// $result=$this->dbConnect->query($sub);
			// while($row=$result->fetch_assoc())
			// {
			// 	$catid=$row['grp'];
			// }
			$sql.=" WHERE product.grp IN ('".implode("','",$grp)."')";
		}
		$sqlQuery = "SELECT category.category_id,category.Category_name FROM category INNER JOIN product ON category.category_id=product.Category_ID
			$sql GROUP BY category.Category_name";
        return  $this->getData($sqlQuery);
	}
	public function getType(){
		$sql='';
		if((isset($_POST['grp']) && $_POST['grp']!="")){
			$grp=$_POST['grp'];
			$sql.=" WHERE product.grp IN ('".implode("','",$grp)."')";
		}
		if((isset($_POST['category']) && $_POST['category']!="")) {
			$category = $_POST['category'];
			if((isset($_POST['grp']) && $_POST['grp']!="")){
				$sql.=" AND category.Category_name IN ('".implode("','",$category)."')";
			}
			else{
				$sql.=" WHERE category.Category_name IN ('".implode("','",$category)."')";	
			}
		}
		
			$sqlQuery="SELECT DISTINCT product_desc.product_type FROM product_desc 
			INNER JOIN color ON product_desc.cid = color.cid 
			INNER JOIN product ON color.product_id = product.product_id 
			INNER JOIN category ON product.Category_ID = category.category_id
			$sql GROUP BY product_desc.product_type";
		return  $this->getData($sqlQuery);
	}
	public function getBrand () {
		$sql='';
		if((isset($_POST['grp']) && $_POST['grp']!="")){
			$grp=$_POST['grp'];
			$sql.=" WHERE product.grp IN ('".implode("','",$grp)."')";
		}
		if(isset($_POST['category']) && $_POST['category']!="") {
			$category = $_POST['category'];
			if((isset($_POST['grp']) && $_POST['grp']!="")){
				$sql.=" AND category.Category_name IN ('".implode("','",$category)."')";
			}
			else{
				$sql.=" WHERE category.Category_name IN ('".implode("','",$category)."')";	
			}
		}
		
		

		if (isset($_POST['type']) && $_POST['type'] != "") {
			$type = $_POST['type'];
			if(isset($_POST['category']) && $_POST['category']!=""){
				$sql .= " AND product_desc.product_type IN ('" . implode("','", $type) . "')";
			}
			else{
				$sql .= " AND product_desc.product_type IN ('" . implode("','", $type) . "')";
			}
		}
		
	
		
		
		
		// $sqlQuery = "SELECT DISTINCT product.product_name FROM product  
		// INNER JOIN color ON product.product_id = color.product_id
		// INNER JOIN product_desc ON color.cid = product_desc.cid " . $sql . " GROUP BY product.product_name";
		$sqlQuery = "SELECT DISTINCT product.product_name FROM product
		INNER JOIN category ON product.Category_ID = category.category_id 
		INNER JOIN color ON color.product_id = product.product_id 
		INNER JOIN product_desc ON product_desc.cid = color.cid 
		$sql GROUP BY product.product_name";

		// $sqlQuery = "SELECT distinct product.product_name
		// 	FROM ".$this->productTable." 
		// 	$sql GROUP BY product_name";
        return  $this->getData($sqlQuery);
	}
	public function getcolor () {
		$sql = '';
		// if(isset($_POST['brand']) && $_POST['brand']!="") {
		// 	$brand = $_POST['brand'];
		// 	$sub="SELECT product_id FROM `product` WHERE product_name IN ('".implode("','",$brand)."')";
		// 	$result=$this->dbConnect->query($sub);
		// 	$array=array();
		// 	while($row=$result->fetch_assoc())
		// 	{
		// 		array_push($array,$row['product_id']);

		// 	}
			
		// 	$sql.=" WHERE color.product_id IN ('".implode("','",$array)."')";
		// }
		// if(isset($_POST['type']) && $_POST['type']!="") {
		// 	$type = $_POST['type'];
		// 	$sql.=" AND product_desc.product_type IN ('".implode("','",$type)."')";
		// }
		if((isset($_POST['grp']) && $_POST['grp']!="")){
			$grp=$_POST['grp'];
			$sql.=" WHERE product.grp IN ('".implode("','",$grp)."')";
		}
		if(isset($_POST['category']) && $_POST['category']!="") {
			$category = $_POST['category'];
			if((isset($_POST['grp']) && $_POST['grp']!="")){
				$sql.=" AND category.Category_name IN ('".implode("','",$category)."')";
			}
			else{
				$sql.=" WHERE category.Category_name IN ('".implode("','",$category)."')";	
			}
		}
		
		

		if (isset($_POST['type']) && $_POST['type'] != "") {
			$type = $_POST['type'];
			
			if(isset($_POST['category']) && $_POST['category']!=""){
				$sql .= " AND product_desc.product_type IN ('" . implode("','", $type) . "')";
			}
			else{
				$sql .= " AND product_desc.product_type IN ('" . implode("','", $type) . "')";
			}
		}
		if(isset($_POST['brand']) && $_POST['brand']!="") {
				$brand = $_POST['brand'];
				$sql .= " AND product.product_name IN ('" . implode("','", $brand) . "')";
		}


		$sqlQuery="SELECT DISTINCT color.color FROM color 
		INNER JOIN product_desc ON product_desc.cid = color.cid 
		INNER JOIN product ON color.product_id = product.product_id 
		INNER JOIN category ON product.Category_ID = category.category_id
		$sql GROUP BY color.color";
        return  $this->getData($sqlQuery);
	}
	// public function getProductSize () {
	// 	$sql = '';
	// 	if((isset($_POST['grp']) && $_POST['grp']!="")){
	// 		$grp=$_POST['grp'];
	// 		$sql.=" WHERE product.grp IN ('".implode("','",$grp)."')";
	// 	}
	// 	if(isset($_POST['category']) && $_POST['category']!="") {
	// 		$category = $_POST['category'];
	// 		if((isset($_POST['grp']) && $_POST['grp']!="")){
	// 			$sql.=" AND category.Category_name IN ('".implode("','",$category)."')";
	// 		}
	// 		else{
	// 			$sql.=" WHERE category.Category_name IN ('".implode("','",$category)."')";	
	// 		}
	// 	}
		
		

	// 	if (isset($_POST['type']) && $_POST['type'] != "") {
	// 		$type = $_POST['type'];
			
	// 		if(isset($_POST['category']) && $_POST['category']!=""){
	// 			$sql .= " AND product_desc.product_type IN ('" . implode("','", $type) . "')";
	// 		}
	// 		else{
	// 			$sql .= " AND product_desc.product_type IN ('" . implode("','", $type) . "')";
	// 		}
	// 	}
	// 	if(isset($_POST['brand']) && $_POST['brand']!="") {
	// 			$brand = $_POST['brand'];
	// 			$sql .= " AND product.product_name IN ('" . implode("','", $brand) . "')";
	// 	}

	// 	if(isset($_POST['color']) && $_POST['color']!="") {
	// 		$color = $_POST['color'];
	// 		$sql .= " AND color.color IN ('" . implode("','", $color) . "')";
	// }
	// 	$sqlQuery="SELECT DISTINCT product_desc.size FROM product_desc 
	// 	INNER JOIN color ON product_desc.cid = color.cid 
	// 	INNER JOIN product ON color.product_id = product.product_id 
	// 	INNER JOIN category ON product.Category_ID = category.category_id
	// 	$sql GROUP BY product_desc.size";
    //     return  $this->getData($sqlQuery);
		
	// }
	public function getTotalProducts () {
		$sql= "SELECT * FROM `category` INNER JOIN `product` ON product.Category_ID=category.category_id INNER JOIN `color` ON color.product_id=product.Product_id INNER JOIN `product_desc` ON product_desc.cid=color.cid INNER JOIN image ON image.cid=color.cid WHERE product_desc.quantity != 0";
		if(isset($_POST['grp']) && $_POST['grp']!="") {
			$grp = $_POST['grp'];
			$sql.=" AND product.grp IN ('".implode("','",$grp)."')";
		}
		if(isset($_POST['category']) && $_POST['category']!="") {
			$category = $_POST['category'];
			$sql.=" AND category.Category_name IN ('".implode("','",$category)."')";
		}
		if(isset($_POST['type']) && $_POST['type']!="") {
			$type = $_POST['type'];
			$sql.=" AND product_desc.product_type IN ('".implode("','",$type)."')";
		}
		if(isset($_POST['brand']) && $_POST['brand']!="") {
			$brand = $_POST['brand'];
			$sql.=" AND product.product_name IN ('".implode("','",$brand)."')";
		}
		if(isset($_POST['color']) && $_POST['color']!="") {
			$color = $_POST['color'];
			$sql.=" AND color.color IN ('".implode("','",$color)."')";
		}
		// if(isset($_POST['size']) && $_POST['size']!="") {
		// 	$size = $_POST['size'];
		// 	$sql.=" AND product_desc.size IN (".implode(',',$size).")";
		// }		
		$productPerPage = 9;		
		$rowCount = $this->getNumRows($sql);
		$totalData = ceil($rowCount / $productPerPage);
		return $totalData;
	}		
	public function getProducts() {
		$productPerPage = 9;	
		$totalRecord  = strtolower(trim(str_replace("/","",$_POST['totalRecord'])));
		$start = ceil($totalRecord * $productPerPage);		
		$sql= "SELECT * FROM `category` INNER JOIN `product` ON product.Category_ID=category.category_id INNER JOIN `color` ON color.product_id=product.Product_id INNER JOIN `product_desc` ON product_desc.cid=color.cid INNER JOIN `image` ON image.cid=color.cid WHERE product_desc.quantity != 0";	
		if(isset($_POST['grp']) && $_POST['grp']!="") {
			$grp = $_POST['grp'];
			$sql.=" AND product.grp IN ('".implode("','",$grp)."')";
		}
		if(isset($_POST['category']) && $_POST['category']!=""){			
			$sql.=" AND category.Category_name IN ('".implode("','",$_POST['category'])."')";
		}
		if(isset($_POST['type']) && $_POST['type']!="") {
			$type = $_POST['type'];
			$sql.=" AND product_desc.product_type IN ('".implode("','",$_POST['type'])."')";
		}
		if(isset($_POST['brand']) && $_POST['brand']!=""){			
			$sql.=" AND product.product_name IN ('".implode("','",$_POST['brand'])."')";
		}
		if(isset($_POST['color']) && $_POST['color']!="") {			
			$sql.=" AND color.color IN ('".implode("','",$_POST['color'])."')";
		}		
		// if(isset($_POST['size']) && $_POST['size']!="") {			
		// 	$sql.=" AND product_desc.size IN (".implode(',',$_POST['size']).")";
		// }
		$sql.=" AND product.pro_status = 'Enabled'";
		$sql.=" GROUP BY color.cid";
		
		if(isset($_POST['sorting']) && $_POST['sorting']!="") {
			$sorting = implode("','",$_POST['sorting']);			
			if($sorting == 'newest' || $sorting == '') {
				$sql.=" ORDER BY product.product_id DESC";
			} else if($sorting == 'low') {
				$sql.=" ORDER BY product.price ASC";
			} else if($sorting == 'high') {
				$sql.=" ORDER BY product.price DESC";
			}
		} else {
			$sql.=" ORDER BY product.product_id DESC";
		}		
		
		// $sql.=" LIMIT $start, $productPerPage";		
		$products = $this->getData($sql);
		// echo count($products);
		$rowcount = $this->getNumRows($sql);
		$productHTML = '';
		if(isset($products) && count($products)) {			
            foreach ($products as $key => $product) {				
                $productHTML .= '<a class="product-link" href="product.php?id='.$product['product_id'].'&color='.$product['color'].'" style="margin-top:40px">';
				$productHTML .= '<div class="product-card">';
				$productHTML .= '<div class="product-image">';
				$productHTML .= '<span class="discount-tag">'.round(($product['actual_price']-$product['price'])/$product['actual_price']*100).'% off</span>';
				$productHTML .= '<img src="'.$product['Image_path1'].'" class="product-thumb" alt="'.$product['product_name'].'">';
				$productHTML .= '</div>';
				$productHTML .= '<div class="product-info">';
				$productHTML .= '<div class="product-brand">'.$product['product_name'].'</div>';
				$productHTML .= '<p class="product-short-des">'.$product['product_details'].'</p>';
				$productHTML .= '<span class="price">₹'.$product['price'].'</span><span class="actual-price">₹'.$product['actual_price'].'</span>';
				$productHTML .= '</div>';
				$productHTML .= '</div>';
				$productHTML .= '</a>';
								
			}
		}
		return 	$productHTML;	
	}	
	
}
?>