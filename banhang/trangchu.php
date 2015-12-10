<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>giaythethao</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta name="robots" content="index, follow" />
  <link rel="stylesheet" type="text/css" href="css/reset.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery.slider.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.slider.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".slider").slideshow({
		width      : 980,
        height     : 450,
        transition : ['barLeft', 'barRight']
      });
    });
  </script>


</head>
<body id="body">
<div id="container">
<!--top--->
<div id="top">
	<div class="text-top">HOTLINE: 01648 345 593 - 01656 170 907
    <div class="dangnhap"> 
    <form action="admin/login.php" method="post" >
    <input type="submit" name="dangnhap" value="Admin"/>
    </form>
    </div>
    </div>

</div>
<!--ketthuc-top--->

<!--header--->
<div id="header">
	<div class="header">
    	<table width="1200" border="0" cellpadding="0">
  <tr>
    <td width="300" height="160px" align="center">
    <div class="mangxahoi">
    	<a target="_blank" title="Facebook" href="hhttps://www.facebook.com/levietnhut0810"><img src="image/facebook.png" /></a>
    	<a target="_blank" title="skype" href="https://www.facebook.com/nam.kun.144?fref=ufi"><img src="image/skype.png" /></a>
        <a href="#"></a><img src="image/gmail.png" />
    </div>
    </td>
    <td width="700" align="center"><a href="trangchu.php"><img src="image/logo6.png"></a>&nbsp;</td>
    </div></td>
    <td width="300"><div class="timkiem">
    <form action="timkiem.php" method="get" >
    <input type="text" name="text" size="13px">
    <input type="submit" name="tim" value="Tim Kiem" style="float:right"/>
    </form>
    </td>
  </tr>
</table>

    </div>
</div>


<!--ketthuc-header--->
<!--MENU-->   
 <div a align="center" id="menu">
    	 <ul>
             <li><a href="trangchu.php">TRANG CHỦ</a></li>
             <li><a href="giaynam.php">GIÀY NAM</a></li>
             <li><a href="giaynu.php">GIÀY NỮ</a></li>
             <li><a href="tintuc.php">TIN TỨC</a></li>
             <li><a href="lienhe.php">LIÊN HỆ</a></li>
             <li><a href="dathang.php">ĐẶT HÀNG</a></li>
         </ul>
    </div>   
<div align="center">
  <div class="slider" align="center">
  <div>
    <img src="image/slide/slide_1.jpg" alt=""/>
  </div>
  <div>
    <img src="image/slide/slide_2.jpg" alt=""/>
  </div>
  <div>
    <img src="image/slide/slide_3.jpg" alt=""/>
  </div>
    <div>
    <img src="image/slide/slide_4.jpg" alt=""/>
  </div> 
</div>
</div>
<div id="main">
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
<h1 style="font-weight:bold; font-size:25px">Giày Hot </h1><br/>
<?php
$i=0;
foreach($rows as $row)
{ $i++;
	?>
    <div class=sp>
       <a href="chitietsanpham.php?id=<?php echo $row["magiay"];?>"><img src="image/giay/<?php echo $row["img"];?>" width="350px" height="280px" /> <br /></a>
	   <?php echo $row["tengiay"]?><br />
	Giá: <?php echo $row["gia"];?>VND<br /></h3>
  </div><?php
}
?>
</div>
<div id="footer"> Copyright © 2015 Trường Đại Học Công Nghệ Sài Gòn | Designed by: PHAN HOÀNG NAM - LÊ VIỆT NHỰT </div>
</div>
</body>
</html>
