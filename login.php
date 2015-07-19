<?php
	$usernameoremail= $_POST[usernameoremail];
	$lpassword= $_POST[lpassword];
	//retrieves values entered in login form
	function choice($usernameoremail, $lpassword) {
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		//removes any illegal characters from the email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$choice= "email"
		}
		else {
			$choice= "username";
			
		}
	}

	$servername = "localhost";
	$DBusername = "cl29-mjgppg";
	$DBpassword = "f4V-NrKV7";
	$DBname = "cl29-mjgppg";
	
	
	$conn = new mysqli($servername, $DBusername, $DBpassword, $DBname);
	//connects to the database based on the variables defined in the first lines
	if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	}

	function login($choice, $lpassword, $conn) {
	$choice= mysqli_real_escape_string($conn, $choice);
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $conn->prepare("SELECT UserName, Email, Password FROM UserInfo WHERE $choice = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $choice);  // Bind "$choice" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
 
        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($user_id, $conn) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $conn->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}

?>