<?php
try{
$pdh = new PDO("mysql:host=localhost; dbname=giaystore"  , "root"  , ""  );
$pdh->query("  set names 'utf8'"  );
}
catch(Exception $e){
		echo $e->getMessage(); exit;
}

$magiay = isset($_GET["magiay"])?$_GET["magiay"]:"";
$sql ="delete from giay where magiay = :magiay ";
$arr = array(":magiay"=>$magiay);

$stm = $pdh->prepare($sql);
$stm->execute($arr);
$n = $stm->rowCount();
if ($n>0) $thongbao="Da xoa $n loai sach! ";
else $thongbao="Loi xoa!";
?>
<script language="javascript">
alert("<?php echo $thongbao;?>");
window.location = "hienthisanpham.php";
</script>