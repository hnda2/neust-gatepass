<?php
    include 'includes/session.php';
    if(isset($_POST['submit'])){
        $ID=$_POST['ID'];
        $sql="DELETE FROM tbl_contact WHERE CID='$ID'";
        if($conn ->query($sql)){
            $_SESSION['success'] ="Contact has been successfully deleted";
        }else{
            $_SESSION['error'] ="No record deleted!";
        }
    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:contact.php?'.urlencode(base64_encode($code)));
?>