<?php
    if ($com == 'gio-hang') {
    if (array_key_exists($loginMember, $_SESSION) && $_SESSION[$loginMember]['active'] == true)  {
        if (!defined('SOURCES')) die("Error");
        if (!empty($_POST['dataOrder']['fullname'])) {

            /* Check order */
            if (empty($_SESSION['cart'])) {
                $func->transfer("Đơn hàng không hợp lệ. Vui lòng thử lại sau.", $configBase, false);
            }
        
            /* Data */
            $dataOrder = (!empty($_POST['dataOrder'])) ? $_POST['dataOrder'] : null;
            
            /* Check data */
            if (!empty($dataOrder)) {
                /* Info */
                $code = strtoupper($func->stringRandom(6));
                $order_date = time();
                $fullname = (!empty($dataOrder['fullname'])) ? htmlspecialchars($dataOrder['fullname']) : '';
                $email = (!empty($dataOrder['email'])) ? htmlspecialchars($dataOrder['email']) : '';
                $phone = (!empty($dataOrder['phone'])) ? htmlspecialchars($dataOrder['phone']) : '';
                $address = (!empty($dataOrder['address'])) ? htmlspecialchars($dataOrder['address']) : '';
                $requirements = (!empty($dataOrder['requirements'])) ? htmlspecialchars($dataOrder['requirements']) : '';
        
                /* Price */
                $total_price = $cart->getOrderTotal();
        
                $data_donhang = array();
                $data_donhang['fullname'] = $fullname;
                $data_donhang['id_user'] = $userDetail['id'];
                $data_donhang['email'] = $email;
                $data_donhang['phone'] = $phone;
                $data_donhang['notes'] = $requirements;
                $data_donhang['code'] = $code;
                $data_donhang['total_price'] = $total_price;
                $data_donhang['order_status'] = 1;
                $data_donhang['date_created'] = time();
                $insert_order = $d->insert('`order`', $data_donhang);
                /* Cart */
                $order_detail = '';
                $max = (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
                for ($i = 0; $i < $max; $i++) {
                    $pid = $_SESSION['cart'][$i]['productid'];
                    $q = $_SESSION['cart'][$i]['qty'];
                    $data_donhangchitiet = array();
                    $data_donhangchitiet['id_product'] = $pid;
                    $data_donhangchitiet['id_order'] = $insert_order;
                    $data_donhangchitiet['quantity'] = $q;
                    $flags = -1;
                    /* Kiểm tra số lượng tồn */
                    $rowDetail = $d->rawQueryOne("select id, name, inventory from #_product where id = ? limit 0,1", array($pid));
                    $inventoryed = 0;
                    $inventoryed = $rowDetail['inventory'] - $q;
                    if($inventoryed >= 0){
                        $d->insert('order_detail', $data_donhangchitiet);
                    } else {
                        /* Xóa đơn hàng */
                        $error = true;
                        unset($_SESSION['cart'][$i]);
                        $d->rawQuery("delete from `order` where id = ?", array($insert_order));
                        $func->transfer("".$rowDetail['name']." không đủ số lượng tồn kho, bạn vui lòng liên hệ quản trị viên website để được giải quyết", $configBase."lien-he");
                    }
                }
                if($error != true){
                    for ($i = 0; $i < $max; $i++) {    
                        $id_product = $_SESSION['cart'][$i]['productid'];  
                        $quanlity = $_SESSION['cart'][$i]['qty']; 
                        $detail = $d->rawQueryOne("select id, name, inventory from #_product where id = ? limit 0,1", array($id_product));   
                        $inventory = array();
                        $inventory['inventory'] = $detail['inventory'] - $quanlity;
                        $d->where('id', $detail['id']);
                        $d->update('product', $inventory);
                    }
                }
            }
            /* Xóa giỏ hàng */
            unset($_SESSION['cart']);
            $func->transfer("Đặt hàng thành công", $configBase);
        }

    }else
    $func->transfer("Bạn vui lòng đăng nhập để có thể mua hàng!", "account/dang-nhap", false);
}