<?php
	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
			'a' => 'á|à|ả|ã|ạ|ă|ằ|ặ|ẵ|ắ|ẳ|â|ậ|ẫ|ẩ|ầ|ấ',
			'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ằ|Ặ|Ẵ|Ắ|Ẳ|Â|Ậ|Ẫ|Ẩ|Ầ|Ấ',
			'd' => 'đ',
			'D' => 'Đ',
			'e' => 'é|è|ẹ|ẽ|ẻ|ê|ề|ễ|ể|ệ|ế',
			'E' => 'É|È|Ẹ|Ẽ|Ẻ|Ê|Ề|Ễ|Ể|Ệ|Ế',
			'i' => 'í|ì|ĩ|ị|ỉ',
			'I' => 'Í|Ì|Ĩ|Ị|Ỉ',
			'o' => 'ó|ò|ỏ|õ|ọ|ơ|ở|ớ|ờ|ợ|ô|ố|ồ|ỗ|ộ|ổ',
			'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ơ|Ở|Ớ|Ờ|Ợ|Ô|Ố|Ồ|Ỗ|Ộ|Ổ',
			'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y' => 'ý|ỳ|ỹ|ỵ|ỷ',
			'Y' => 'Ý|Ỳ|Ỹ|Ỵ|Ỷ'
		);

		foreach($unicode as $khongdau=>$codau){
			$arr = explode("|", $codau);
			$str = str_replace($arr, $khongdau, $str);
		};
		return $str;
	}

	function changeTitle($str){
		$str = trim($str);
		if($str == "") return "";
		$str = str_replace('"', '', $str);
		$str = str_replace("'", '',$str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
		//MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(' ', '-', $str);
		return $str;
}

	function cate_parent($data, $parent = 1, $str = "--", $select = 0){
		foreach($data as $key => $val){
			$name = $val["name"];
			$id = $val["id"];
			if($val["parent_id"] == $parent){
				if($select !=0 && $id == $select){
					echo "<option value='$id' selected = 'selected' >$str $name</option>";
				}else{
					echo "<option value='$id'>$str $name</option>";
				}				
				cate_parent($data, $id, $str."--", $select = 0);
			}
		}
	}
?>
