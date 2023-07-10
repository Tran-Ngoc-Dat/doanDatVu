<?php

    include "config.php";

    // $func->dump($_POST);die('xxx');
    
	$score=(float)$_POST['score'];
	$id=(int)$_POST['id'];

    $item = $d->rawQueryOne("select rate, count_rate, best_rate from #_product where id = ? and find_in_set('hienthi',status) limit 0,1",array($id));


	if($item['rate']){
		$data['rate'] = ($score+$item['rate'])/2;
		$data['count_rate'] = $item['count_rate'] + 1;
		if($score > $item['best_rate'])
			$data['best_rate'] = $score;
        $d->where('id', $id);
        $d->update('product', $data);
        // var_dump($data);
	}
	else{
		$data['rate'] = $score;
		$data['count_rate'] = 1;
		$data['best_rate'] = $score;
		$d->where('id', $id);
		$d->update('product',$data);
	}

    $row_item = $d->rawQueryOne("select count_rate from #_product where id = ? and find_in_set('hienthi',status) limit 0,1",array($id));

	// $d->reset();
	// $d->query("select count_rate from #_product where id='$id'");
	// $row_item=$d->fetch_array();
	$result = array('count' => $row_item['count_rate']);

	echo json_encode($result);
?>