<?php
include "../modules/module.php";
include "../modules/module_bill.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/Cinema-Film/vnpay_php/vnpay_return.php";
$vnp_TmnCode = "D7GEL8KH";//Mã website tại VNPAY 
$vnp_HashSecret = "SOEALHLHQFMXSHXYZXFBZQRKXFOAYMST"; //Chuỗi bí mật

$vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = $_POST['order_desc'];
$vnp_OrderType = $_POST['order_type'] ; // mã loại hàng
$vnp_Amount = $_POST['amount'] * 100;
$vnp_Locale =  $_POST['language']; //
$vnp_BankCode =  $_POST['bank_code']; // mã ngân hàng thanh toán
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];// 127.0.0.1

//Add Params of 2.0.1 Version
// $vnp_ExpireDate = $_POST['txtexpire'];
//Billing
// $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
// $vnp_Bill_Email = $_POST['txt_billing_email'];
$fullName = trim($_POST['txt_billing_fullname']);
if (isset($fullName) && trim($fullName) != '') {
    $name = explode(' ', $fullName);
    $vnp_Bill_FirstName = array_shift($name);
    $vnp_Bill_LastName = array_pop($name);
}
// $vnp_Bill_Address=$_POST['txt_inv_addr1'];
// $vnp_Bill_City=$_POST['txt_bill_city'];
// $vnp_Bill_Country=$_POST['txt_bill_country'];
// $vnp_Bill_State=$_POST['txt_bill_state'];
// Invoice
// $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
// $vnp_Inv_Email=$_POST['txt_inv_email'];
// $vnp_Inv_Customer=$_POST['txt_inv_customer'];
// $vnp_Inv_Address=$_POST['txt_inv_addr1'];
// $vnp_Inv_Company=$_POST['txt_inv_company'];
// $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
// $vnp_Inv_Type=$_POST['cbo_inv_type'];
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    // "vnp_ExpireDate"=>$vnp_ExpireDate,
    // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
    // "vnp_Bill_Email"=>$vnp_Bill_Email,
    // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
    // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
    // "vnp_Bill_Address"=>$vnp_Bill_Address,
    // "vnp_Bill_City"=>$vnp_Bill_City,
    // "vnp_Bill_Country"=>$vnp_Bill_Country,
    // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
    // "vnp_Inv_Email"=>$vnp_Inv_Email,
    // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
    // "vnp_Inv_Address"=>$vnp_Inv_Address,
    // "vnp_Inv_Company"=>$vnp_Inv_Company,
    // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
    // "vnp_Inv_Type"=>$vnp_Inv_Type
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
// if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
//     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
// }

//var_dump($inputData);
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
    if (isset($_POST['paying-now'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        add_link_bill($vnp_TxnRef, $vnp_Url);
        echo "
        <script type='text/javascript'>
            alert('Your data has been saved  !!');
            location.href =`http://localhost/Cinema-Film/views/client/index.php`
        </script>";
    }
	// vui lòng tham khảo thêm tại code demo
    
?>


<!-- Thông tin truy cập Merchant Admin để quản lý giao dịch:
Địa chỉ: https://sandbox.vnpayment.vn/merchantv2/

Tên đăng nhập: choitaosao1999@gmail.com

Mật khẩu: (Là mật khẩu nhập tại giao diện đăng ký Merchant môi trường TEST) -->
<!-- 
Kịch bản test (SIT): https://sandbox.vnpayment.vn/vnpaygw-sit-testing/user/login

Tên đăng nhập: choitaosao1999@gmail.com

Mật khẩu: (Là mật khẩu nhập tại giao diện đăng ký Merchant môi trường TEST) -->


<!-- Ngân hàng	NCB
Số thẻ	9704198526191432198
Tên chủ thẻ	NGUYEN VAN A
Ngày phát hành	07/15
Mật khẩu OTP	123456 -->
