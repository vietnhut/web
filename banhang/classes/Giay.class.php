<?php
class Giay extends Db{
	private $size =5;
	public function getRand($n)
	{
		$sql="select magiay, tengiay,gia, img from giay order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	/*
	public function getByPubliser($manhasanxuat)
	{
		$sql="select magiay, tengiay, img from giay order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	*/
	function getAll($page=1)  //page=1, 2, ....
	{
		$vt = ($page -1) * $this->size;
		$sql="select giay.*, nhasanxuat.tennhasanxuat
		from giay, nhasanxuat
		where giay.manhasanxuat = nhasanxuat.manhasanxuat
		limit $vt, " . $this->size;
		return $this->select($sql);
	}
	
	function getNumPage()
	{
		$sql="select Count(*) as dem from giay ";
		$kq = $this->select($sql);	
		$sogiay = $kq[0]["dem"];
		$sotrang =  ceil($sogiay / $this->size);
		return $sotrang;
	}
	function saveGiay()
	{
		$magiay 	= $_POST["magiay"];
		$tengiay	 = $_POST["tengiay"];
		$khuyenmai	 = $_POST["khuyenmai"];
		$manhasanxuat = $_POST["manhasanxuat"];
		$gia = $_POST["gia"];
		$thuoctinh = $_POST["thuoctinh"];
		if ($_FILES["img"]["error"]>0) {
			
			echo "Hình lỗi";
			return 0;
			}
		$img = $_FILES["img"]["name"];
		//Save vao db
		$sql="insert into giay(magiay, tengiay, manhasanxuat, gia, thuoctinh, img, khuyenmai)
			values(:v1, :v2, :v3, :v4, :v5, :v6, :v7)";
		$arr = array(":v1"=>$magiay, ":v2"=>$tengiay, ":v3"=>$manhasanxuat, ":v4"=>$gia, ":v5"=>$thuoctinh,":v6"=>$img
		,":v7"=>$khuyenmai );
//	print_r($arr);
//	$sql="insert into giay(magiay, tengiay, manhasanxuat, gia, thuoctinh, img) values('$magiay', '$tengiay', '$manhasanxuat', '$gia', '$thuoctinh', '$img')";
		$n=$this->insert($sql, $arr);
		
		if ($n>0) //Them duoc
		{
		//save img vao images
		move_uploaded_file($_FILES["img"]["tmp_name"], ROOT."../image/giay/". $img);
		}
		
		return 1;
		
		
	}

}
?>