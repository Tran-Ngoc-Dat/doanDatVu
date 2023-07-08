<?php
	include "config.php";
	require_once LIBRARIES."config-type.php";

	/* Xử lý params */
	$flag = true;
	$param = (!empty($_POST['params'])) ? $_POST['params'] : null;
	$params = null;
	if($param) parse_str(base64_decode(addslashes($param)), $params);
	$id = (!empty($params['id'])) ? $params['id'] : 0;
	$com = (!empty($params['com'])) ? $params['com'] : '';
	$type = (!empty($params['type'])) ? $params['type'] : '';
	$hash = (!empty($_POST['hash'])) ? addslashes($_POST['hash']) : '';
	$numb = (!empty($_POST['numb'])) ? (int)$_POST['numb'] : 0;
	$e = (!empty($params['act'])) ? @explode("_", $params['act']) : null;
	if($e) $ex = (count($e) > 1) ? end($e) : '';
	else $ex = '';
	$kind = "man".(($ex) ? ("_".$ex) : '');
	$data = array('success' => true, 'msg' => 'Upload thành công');

	/* Xử lý $_FILE - Path image */
	$myFile = (!empty($_FILES['files'])) ? $_FILES['files'] : null;
	$_FILES['file'] = array('name' => $myFile['name'][0],'type' => $myFile['type'][0],'tmp_name' => $myFile['tmp_name'][0],'error' => $myFile['error'][0],'size' => $myFile['size'][0]);
	$file_name = $func->uploadName($_FILES['file']['name']);
	$upload_path = "upload/product/";
	
	/* Xử lý lưu image */
	$data_file = array();
		
		$data_file['name'] = "";
		$data_file['id_product'] = $id;
		$data_file['status'] = 'hienthi';
		$data_file['date_created'] = time();

		if($d->insert('gallery',$data_file))
		{
			$id_insert = $d->getLastInsertId();

			if($func->hasFile("file"))
			{
				$photoUpdate = array();

				if($photo = $func->uploadImage("file", ".jpg|.gif|.png|.jpeg|.gif", '../'.$upload_path, $file_name))
				{
					$photoUpdate['photo'] = $photo;
					$d->where('id', $id_insert);
					$d->update('gallery', $photoUpdate);
					unset($photoUpdate);
				}
			}
		}
		else
		{
			$flag = false;
		}

	if(!$flag)
	{
		$data = array('success' => false, 'msg' => 'Upload thất bại');
	}

	echo json_encode($data);
?>