<?php
include "../config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
$obj = new GIay();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Them Giay</title>
</head>
<body>
<form action="themsanpham.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="60%" border="1">
    <tr>
      <td width="20%">Mã Giày:</td>
      <td width="80%"><input type="text" name="magiay" id="ma_giay" /></td>
    </tr>
    <tr>
      <td>Tên Giày :</td>
      <td><input type="text" name="tengiay" id="ten_giay" /></td>
    </tr>
    <tr>
      <td>Khuyến Mãi :</td>
      <td><input type="text" name="khuyenmai" id="khuyen_mai" /></td>
    </tr>
    <tr>
      <td>Mã Nhà Xuất Bản: </td>
      <td><select name="manhasanxuat" id="ma_nhasanxuat" />
           <?php
		   $ten = $obj->select("select * from nhasanxuat");
		   foreach($ten as $r)
		   {
			   ?>
          		<option value="<?php echo $r["manhasanxuat"];?>"><?php echo $r["tennhasanxuat"];?></option>
		  	<?php
			   
			}
		   ?>
      </select></td>
    </tr>
    <tr>
      <td>Giá :</td>
      <td><input type="text" name="gia" id="gia" /></td>
    </tr>
    <tr>
      <td>Thuộc Tính</td>
      <td><input type="text" name="thuoctinh" id="thuoc_tinh" /></td>
    </tr>
     <tr>
      <td>Hình :</td>
      <td><input type="file" name="img" id="img" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="sm" id="sm" value="SaveGiay" /></td>
   
    </tr>
  </table>
</form>
</body>
</html>