<?php
session_start();

$message_output = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $S_First_Name = htmlspecialchars(strip_tags(trim($_POST["S_First_Name"] ?? "")), ENT_QUOTES, "UTF-8");
    $S_Last_Name = htmlspecialchars(strip_tags(trim($_POST["S_Last_Name"] ?? "")), ENT_QUOTES, "UTF-8");
    $gender = htmlspecialchars(strip_tags($_POST["Gender"] ?? ""), ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars(strip_tags(trim($_POST["S_email"] ?? "")), ENT_QUOTES, "UTF-8");
    $DOB = htmlspecialchars(strip_tags(trim($_POST["DOB"] ?? "")), ENT_QUOTES, "UTF-8");
    $Grade = htmlspecialchars(strip_tags(trim($_POST["Grade"] ?? "")), ENT_QUOTES, "UTF-8");
   

    if ($S_First_Name && $S_Last_Name && $gender && $DOB && $Grade && $email && filter_var($email, FILTER_VALIDATE_EMAIL) ) {

        $message_output = "<hr> Student Successfully Registered! <hr>";

        

 $file = fopen("userData\students.txt", "a");
        if ($file) {
        fwrite($file, "Name: $S_First_Name $S_Last_Name\nGender: $gender\nGrade: $Grade\nEmail: $email\nDate of Birth: $DOB\n\n");
            fclose($file);
            $_SESSION['feedback'] = $message_output;
            $_SESSION['popup'] = "Student Registered Successfully!"; 
            header("Location: School_Registration.php");exit;


        } else {
            echo "Error writing to file.";
        }
    }else{
        $_SESSION['feedback'] = "<p style='color:red;'>Please fill all fields correctly.</p>";
        header("Location: School_Registration.php");
        exit;
    }
}
?>
