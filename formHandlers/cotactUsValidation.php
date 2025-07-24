  <!-- php portion, server side -->
  <?php
  session_start();

  $message_output = "";  
  // Declares the variable before it's used later in the script.Ensures there are no "undefined variable" errors if the form wasn't submitted.


//  Sanitize and Validate Inputs
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // $_POST["First_name"] ?? "": Retrieves input or defaults to an empty string if not set.
    // trim(): Removes leading/trailing whitespace.
    // strip_tags(): Removes HTML tags (for security).
    // htmlspecialchars(): Converts special characters to HTML entities to prevent XSS.

      $firstname = htmlspecialchars(strip_tags(trim($_POST["First_name"] ?? "")), ENT_QUOTES, "UTF-8");
      $lastname = htmlspecialchars(strip_tags(trim($_POST["Last_name"] ?? "")), ENT_QUOTES, "UTF-8");
      $gender = htmlspecialchars(strip_tags($_POST["Gender"] ?? ""), ENT_QUOTES, "UTF-8");
      $email = htmlspecialchars(strip_tags(trim($_POST["Email_Address"] ?? "")), ENT_QUOTES, "UTF-8");
      $description = htmlspecialchars(strip_tags(trim($_POST["Problem-Description"] ?? "")), ENT_QUOTES, "UTF-8");

    // Validation
      // Checks that all fields are filled.
            // executes code once all data is sanitized and validated
      if ($firstname && $lastname && $gender && $email && filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        // filter_var(..., FILTER_VALIDATE_EMAIL): Ensures the email format is valid.
    // prepare message by substituting variables with validated user input .= used to append
          $message_output = "Your name is $firstname $lastname.<br>";
          $message_output .= "You are a $gender.<br>";
          $message_output .= "Your email address is $email.<br>";
          $message_output .= "Problem/Description: $description<br>";
          
  // Open and save to file
  $file = fopen("plain.txt", "a");
          if ($file) {
          fwrite($file, "Name: $firstname $lastname\nGender: $gender\nEmail: $email\nDescription: $description\n\n");
              fclose($file);
              $_SESSION['feedback'] = $message_output;
            // Success message
              $_SESSION['popup'] = "Form Submitted Successfully!"; 
              // reloads page
             header("Location: Mark-Anthony_Baker_ContactUs.php");exit;


          } else {
            // form opening error
              echo "Error writing to file.";
          }
      }else{
        // error message if data cannot be verified, user input was incomplete/invalid
          $_SESSION['feedback'] = "<p style='color:red;'>Please fill all fields correctly.</p>";
          // reload page to allow re-entering of data
          header("Location: Mark-Anthony_Baker_ContactUs.php");
          exit;
      }
  }

  
  ?>