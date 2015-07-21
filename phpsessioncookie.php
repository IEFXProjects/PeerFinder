<?php
include_once 'DBconnection.php';
 
function sec_session_start($conn) {
    $session_name = '9zxd3kp95yp3epp5ee3d4d2';
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        die("session creation error.  Please make sure that you have your cookies enabled on your browser<br> <a href=\"https://web125.secure-secure.co.uk/peerphinder.com/login.html\"> Click here to go back to the login page</a>" . $conn->connect_error);
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}
sec_session_start($conn);
?>