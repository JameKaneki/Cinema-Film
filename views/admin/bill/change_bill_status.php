<?php 
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $status = 1;
        update_status_bill($id,$status);
        echo "
        <script type='text/javascript'>
            alert('Payment success, back to home page !!');
            location.href =`http://localhost/Cinema-Film/views/admin/index.php?act=bill`
        </script>
        ";
    }else{
        echo "
        <script>
        location.href =`http://localhost/Cinema-Film/views/admin/index.php?act=bill`;
        window.onload = function(){alert('Don't try to skip any step');}
        </script>
      ";
    }

?>