  <?php

       function redirect($url){
           header("Location:".$url);
           die();
           
        } 
    
        //### checks wheather the user is loggedin################
        

        //#########jobseeker function############
		
	
		
		//###################### user login function #############################//
        
		 
		
		
        
       
        
        //###################### user login function #############################//
        function login($email, $password, $mysqli) {
            // Using prepared statements means that SQL injection is not possible. 
		
            if ($stmt = $mysqli->prepare("SELECT id, username, password 
        FROM org_info
       WHERE username = ? 
        LIMIT 1")) {
                $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
                $stmt->execute();    // Execute the prepared query.
                $stmt->store_result();
                

                // get variables from result.
                $stmt->bind_result($user_id, $username, $db_password);
                $stmt->fetch();

                // hash the password with the unique salt.
                $password = hash('sha512', $password);
                if ($stmt->num_rows == 1) {
				
                    // If the user exists we check if the account is locked
                    // from too many login attempts 
                    // Check if the password in the database matches
                    // the password the user submitted.
                    if ($db_password == $password) {
                        // Password is correct!
                        // Get the user-agent string of the user.
                        $user_browser = $_SERVER['HTTP_USER_AGENT'];
                        // XSS protection as we might print this value
                        //$user_id = preg_replace("/[^0-9]+/", "", $user_id);
                       // $_SESSION['user_id'] = $user_id;
                        // XSS protection as we might print this value
                        $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                        $_SESSION['username'] = $username;
                        $_SESSION['id'] = $user_id;
                        $_SESSION['login_string'] = hash('sha512', $username);
                        setcookie("user",$_SESSION['login_string'], time()+3600);
                        
                        
                        // Login successful.
                        return true;
                    } else {

                        // Password is not correct
                        // We record this attempt in the database
                        // $now = time();
                        //$mysqli->query("INSERT INTO login_attempts(user_id, time)
                        //VALUES ('$user_id', '$now')");
                        return false;
                    }
                } else {
                    // No user exists.
                    return false;
                }
            }
        }

        
        ?>
