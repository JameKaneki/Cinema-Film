<?php 
include "../modules/module.php";
include "../modules/module_bill.php";
include "../modules/ticket.php";
$inputData = array();
$returnData = array();
$vnp_HashSecret = "SOEALHLHQFMXSHXYZXFBZQRKXFOAYMST";
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

$vnp_SecureHash = $inputData['vnp_SecureHash'];
unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
$vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
$vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
$vnp_Amount = $inputData['vnp_Amount']/100; // Số tiền thanh toán VNPAY phản hồi

$Status = 0; // Là trạng thái thanh toán của giao dịch chưa có IPN lưu tại hệ thống của merchant chiều khởi tạo URL thanh toán.
$orderId = $inputData['vnp_TxnRef'];

try {
    //Check Orderid    
    //Kiểm tra checksum của dữ liệu
    if ($secureHash == $vnp_SecureHash) {
        //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId            
        //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
        //Giả sử: $order = mysqli_fetch_assoc($result);   

        $order = select_by_id_bill($orderId);
        if ($order != NULL) {
            if($order["price"] == $vnp_Amount) //Kiểm tra số tiền thanh toán của giao dịch: giả sử số tiền kiểm tra là đúng. //$order["Amount"] == $vnp_Amount
            {
                if ($order["status"] == 0) {
                    if ($inputData['vnp_ResponseCode'] == '00' || $inputData['vnp_TransactionStatus'] == '00') {
                        $Status = 1; // Trạng thái thanh toán thành công
                        $returnData['RspCode'] = '00';
                        $returnData['Message'] = 'Confirm Success';
                    } else {
                        $Status = 2; // Trạng thái thanh toán thất bại / lỗi
                    }
                    //Cài đặt Code cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
                    //
                    //
                    //
                    //Trả kết quả về cho VNPAY: Website/APP TMĐT ghi nhận yêu cầu thành công                
                } else {
                    $returnData['RspCode'] = '02';
                    $returnData['Message'] = 'Order already confirmed';
                }
            }
            else {
                $returnData['RspCode'] = '04';
                $returnData['Message'] = 'invalid amount';
            }
        } else {
            $returnData['RspCode'] = '01';
            $returnData['Message'] = 'Order not found';
        }
    } else {
        $returnData['RspCode'] = '97';
        $returnData['Message'] = 'Invalid signature';
    }
} catch (Exception $e) {
    $returnData['RspCode'] = '99';
    $returnData['Message'] = 'Unknow error';
}
//Trả lại VNPAY theo định dạng JSON
    if($returnData['RspCode'] == '00'){
        update_status_bill($orderId,1);
        echo "
        <script type='text/javascript'>
            alert('Payment success, back to home page !!');
            location.href =`http://localhost/Cinema-Film/views/client/index.php`
        </script>
        "; 
    }else{
        delete_ticket_by_id_bill($orderId);
        remove_bill($orderId);
        echo "
        <script type='text/javascript'>
            alert('{$returnData['Message']}, please check your wallet and try again !!');
            window.history.back(-3)
        </script>
        ";
    }
?>