<?php 
$vnp_TmnCode = "D7GEL8KH";//Mã website tại VNPAY 
$vnp_HashSecret = "SOEALHLHQFMXSHXYZXFBZQRKXFOAYMST"; //Chuỗi bí mật
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/Cinema-Film/vnpay_php/vnpay-return-admin.php";
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];// 127.0.0.1
$bankCode = 'VNPAYQR';  
$orderType = 190000;
$lang = 'vn';
    $id_bill = $_GET['id'];
    $payer = $_SESSION['email']['userName'];
    $billInfo = select_by_id_bill($id_bill);
    $amount = $billInfo['price'];
  
    $time = $time = date("Y-m-d H:i:s");
    $order_des = 'MS: id='.$id_bill.'payer'.$payer;
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $amount *100,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $lang,
        "vnp_OrderInfo" => $order_des,
        "vnp_OrderType" => $orderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $id_bill,
        "vnp_BankCode" => $bankCode,
    );
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
        header('Location: ' . $vnp_Url);
        die();
?>