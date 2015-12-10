<?php
include "../config/config.php";
include ROOT."../include/function.php";
spl_autoload_register("loadClass");
$obj = new Giay();
$page = isset($_GET["page"])?$_GET["page"]:1;
$listBook = $obj->getAll($page);
$sotrang = $obj->getNumPage();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<table width="80%" border="1" id="giay" >
  <tr>
    <td width="7%" align="center"><a href="index.php">Trang chu Admin</a></td>
    <td width="15%" align="center"> <a href="xoasanpham.php">Xóa sản phẩm </a> <br />
    <a href="suasanpham.php" >Sửa sản phẩm</a> <br /> <a href="frmthemsanpham.php" >Thêm Sản Phẩm</a>
    </td>
   </tr>
</table>
<?php echo "Hiển Thị Sản Phẩm <br/>"; echo "Co $sotrang trang san pham ";?>
<?php
for($i=1; $i<= $sotrang; $i++)
{
	?>
    <a href="?page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;
    <?php	
}
?>
<table width="80%" border="1" id="giay" >
  <tr>
    <td width="7%" align="center">stt</td>
    <td width="15%" align="center">magiay</td>
    <td width="30%" align="center">tengiay</td>
    <td width="14%" align="center">Gia</td>
    <td width="17%" align="center">Hinh</td>
    <td width="17%" align="center">thuoctinh</td>
  </tr>
 <?php
try{
$pdh = new PDO("mysql:host=localhost; dbname=giaystore"  , "root"  , ""  );
$pdh->query("  set names 'utf8'"  );
}
catch(Exception $e){
		echo $e->getMessage(); exit;
}
$stm = $pdh->prepare("select * from giay");
$stm->execute();
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
 <?php
  $i=0;
  foreach($rows as $r)
  {
	  $i++;
	  ?>
  <tr>
    <td align="center"><?php echo $i;?></td>
    <td align="center"><?php echo $r["magiay"];?></td>
    <td align="center"><?php echo $r["tengiay"];?></td>
    <td align="center"><?php echo $r["gia"];?></td>
    <td><img src="../image/giay/<?php echo $r["img"];?>" width="400px" height="300px" /></td>
    <td align="center"><?php echo $r["thuoctinh"];?></td>
  </tr>
  <?php
  }
  ?>
</table>
</body>
</html>