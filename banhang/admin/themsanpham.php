<meta charset="utf-8" />
<?php
include "../config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
$obj = new GIay();
if (!isset($_POST["sm"])) {
	echo "No1 "; exit;
	}
if ($_POST["sm"]!="SaveGiay") {
	
	echo "No! "; exit;
	}	
$n = $obj->saveGiay();
if ($n==1) $thongbao =  "Đã thêm sản phẩm! ";
else $thongbao= "Lỗi rồi";
?>
<script language="javascript">
alert("<?php echo $thongbao;?>");
window.location="hienthisanpham.php";

</script>