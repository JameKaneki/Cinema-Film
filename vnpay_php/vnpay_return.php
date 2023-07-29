<?php 
 $vnp_SecureHash = $_GET['vnp_SecureHash'];
 $inputData = array();
 $id_bill = $_SESSION['id_bill'];
 foreach ($_GET as $key => $value) {
     if (substr($key, 0, 4) == "vnp_") {
         $inputData[$key] = $value;
     }
 }
 
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
 if ($secureHash == $vnp_SecureHash) {
     if ($_GET['vnp_ResponseCode'] == '00') {
        header('Location:index.php');
     } 
     else {
        delete_ticket_by_id_bill($id_bill);
        remove_bill($id_bill);
        header("Location:{$_SERVER['HTTP_REFERER']}");
        }
 } else {
     echo "Chu ky khong hop le";
     }
?>