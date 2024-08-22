<?php include("prod.php");
$product = new Product();
if(isset($_GET['grop'])){
	$products = $product->getSearch();
}
else{
	$products = $product->getProducts();
}
$productData = array(
	"products" => $products
);
echo json_encode($productData);?>