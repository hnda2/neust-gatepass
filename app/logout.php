<?php
include('includes/session.php');

function updateLogoutTime($conn, $userID) {
    date_default_timezone_set('Asia/Manila');
    $logoutTime = date('Y-m-d h:i:s A', time());

    // Update logout time in tbl_userlog
    mysqli_query($conn, "UPDATE tbl_userlog SET LOGOUT = '$logoutTime', STATUS = 'LOGOUT' WHERE UID = '$userID' AND LOGOUT IS NULL");
}

// Check if the user is logged in
if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    // Get the user ID from the session
    $userID = $_SESSION['admin'];

    // Update logout time
    updateLogoutTime($conn, $userID);

    // Unset all session variables
    session_unset();
}

// Redirect to the index page
header('location: ../index.php?'.urlencode(base64_encode($code)));
?>