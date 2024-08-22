<?php
include 'connection.php';
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$srch = array();
$len = strlen($search);
$j = 0;
$ch = '';

for ($i = 0; $i < $len; $i++) {
    if (substr($search, $i, 1) != ' ') {
        $ch .= substr($search, $i, 1);
    } else {
        $srch[$j] = $ch;
        $j++;
        $ch = '';
    }
}
if (!empty($ch)) {
    $srch[$j] = $ch;
}
for($i=0;$i<count($srch);$i++){
    if($srch[$i]=="mens" || $srch[$i]=="men" ){
        $srch[$i]="Mens";
    }
    if($srch[$i]=="womens" || $srch[$i]=="women" ){
        $srch[$i]="Womans";
    }
    if($srch[$i]=="kids" || $srch[$i]=="kid" ){
        $srch[$i]="Kids";
    }
}
$categry=array();
$protype=array();
$proname=array();
$color=array();
$group=array();
$i=0;
$sql="SELECT Category_name FROM category GROUP BY Category_name";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
    $categry[$i]=$row['Category_name'];
    $i++;
}
$i=0;
$sql="SELECT product_type FROM product_desc GROUP BY product_type";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
    $protype[$i]=$row['product_type'];
    $i++;
}
$i=0;
$sql="SELECT grp FROM product GROUP BY grp";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
    $group[$i]=$row['grp'];
    $i++;
}
$i=0;
$sql="SELECT product_name FROM product GROUP BY product_name";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
    $proname[$i]=$row['product_name'];
    $i++;
}
$i=0;
$sql="SELECT color FROM color GROUP BY color";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
    $color[$i]=$row['color'];
    $i++;
}

$grop="";
$cat="";
$brand="";
$prtype="";
$col="";
foreach($srch as $item){
    $flag=false;

// foreach($srch as $item){
foreach($group as $grp){
    
        if($item===$grp){
            $grop=$item;
            // echo $grop;
            $flag=true;
        }
    }
if($flag==true){
    continue;
}

// foreach($srch as $item){
foreach($categry as $categ){
    
        if($item===$categ){
            $cat=$item;
            // echo $cat;
            $flag=true;
        }
    }
    if($flag==true){
        continue;
    }

// foreach($srch as $item){
foreach($proname as $prn){
    
        if($item===$prn){
            $brand=$item;
            // echo $brand;
            $flag=true;
        }
    }
    if($flag==true){
        continue;
    }

// foreach($srch as $item){
foreach($protype as $prt){
    
        if($item===$prt){
            $prtype=$item;
            // echo $prtype;
            $flag=true;
        }
    }
    if($flag==true){
        continue;
    }

// foreach($srch as $item){
foreach($color as $cl){
    
        if($item===$cl){
            $col=$item;
            // echo $col;
            $flag=true;
        }
    }
    if($flag==true){
        continue;
    }

}

?>
<form action="select.php" class="form" method="post">
    <?php if($grop!=''){?>
    <input type="text" name="grp[]" value="<?php echo $grop;?>"><?php 
    }
    if($cat!=''){
        ?>
    <input type="text" name="category[]" value="<?php echo $cat;?>"><?php
    }
    if($prtype!=''){
        ?>
    <input type="text" name="type[]" value="<?php echo $prtype;?>"><?php
    }

    if($brand!=''){
    ?>
    <input type="text" name="brand[]" value="<?php echo $brand;?>"><?php
    }
    
    if($col!=''){
        ?>
    <input type="text" name="color[]" value="<?php echo $col;?>"><?php
    }
    ?>
</form>
<script>
    var form=document.querySelector(".form");
    form.submit();
</script>
