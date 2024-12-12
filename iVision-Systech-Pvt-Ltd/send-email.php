
<!--// // Include database connection-->
<!--// include('conn.php'); -->

<!--// // Include PHPMailer files-->
<!--// // require 'vendor/autoload.php';-->

<!--// // use PHPMailer\PHPMailer\PHPMailer;-->
<!--// // use PHPMailer\PHPMailer\Exception;-->

<!--// // Check if the form is submitted-->
<!--// if (isset($_POST['submit'])) {-->
<!--//     // Sanitize and validate input-->
<!--//     $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);-->
<!--//     $name = mysqli_real_escape_string($conn, $_POST['name']);-->
<!--//     $phone = mysqli_real_escape_string($conn, $_POST['phone']);-->
<!--//     $subject = mysqli_real_escape_string($conn, $_POST['subject']);-->
<!--//     $message = mysqli_real_escape_string($conn, $_POST['message']);-->

<!--//     // Insert into the database-->
<!--//     $sql = "INSERT INTO `tbl_contact` (`name`, `email`, `phone`, `subject`, `message`) -->
<!--//             VALUES ('$name', '$email', '$phone', '$subject', '$message')";-->
<!--//     $res = mysqli_query($conn, $sql);-->
    
<!--//     if($res){-->
<!--//          echo '<script>-->
<!--//                     Swal.fire({-->
<!--//                         icon: "success",-->
<!--//                         title: "Data Sent Successfully",-->
                      
<!--//                         confirmButtonText: "OK"-->
<!--//                     }).then(function() {-->
<!--//                         window.location.href = "index.php";-->
<!--//                     });-->
<!--//                 </script>';-->
            
<!--//     }-->
<!--//      else {-->
<!--//                 echo '<script>-->
<!--//                     Swal.fire({-->
<!--//                         icon: "error",-->
<!--//                         title: "Email Error!",-->
<!--//                         text: "Failed to send Please try again later.",-->
<!--//                         confirmButtonText: "OK"-->
<!--//                     });-->
<!--//                 </script>';-->
<!--//             }-->

<!--//     // if (!$res) {-->
<!--//     //     die("Database error: " . mysqli_error($conn));-->
<!--//     // }-->

<!--//     // // Initialize PHPMailer-->
<!--//     // $mail = new PHPMailer(true);-->

<!--//     // try {-->
<!--//     //     // Admin Email (Notification)-->
<!--//     //     $mail->isSMTP();-->
<!--//     //     $mail->Host = 'https://web2tech.org';-->
<!--//     //     $mail->SMTPAuth = true;-->
<!--//     //     $mail->Username = 'khuranasimran033@gmail.com';  // Replace with your email-->
<!--//     //     $mail->Password = 'ebjm ktyx jilv tqjn';     // Use environment variable for security-->
<!--//     //   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;-->
<!--//     //     $mail->Port = 587;-->
    
<!--//     //     // Admin email settings-->
<!--//     //     $mail->setFrom('khuranasimran033@gmail.com', 'Simran Khurana');-->
<!--//     //     $mail->addAddress('khuranasimran033@gmail.com');  // Admin email-->
<!--//     //     $mail->isHTML(true);-->
<!--//     //     $mail->Subject = 'New Enquiry From ' . htmlspecialchars($name);-->
<!--//     //     $mail->Body = 'Name: ' . htmlspecialchars($name) . '<br>' .-->
<!--//     //                   'Email: ' . htmlspecialchars($email) . '<br>' .-->
<!--//     //                   'Phone: ' . htmlspecialchars($phone) . '<br>' .-->
<!--//     //                   'Subject: ' . htmlspecialchars($subject) . '<br>' .-->
<!--//     //                   'Message: ' . nl2br(htmlspecialchars($message));-->

<!--//     //     // Send admin email-->
<!--//     //     $mail->send();-->

<!--//     //     // Thank You Email (to User)-->
<!--//     //     $mail->clearAddresses();-->
<!--//     //     $mail->addAddress($email, $name);  // User email-->
<!--//     //     $mail->Subject = 'Thank You for Contacting Us!';-->
<!--//     //     $mail->Body = 'Hi ' . htmlspecialchars($name) . ',<br>Thank you for reaching out! We appreciate your message and will get back to you shortly.<br>Best regards,<br>Your Developer Simi Team';-->
<!--//     //     $mail->send();-->

<!--//     //     // Redirect after successful operation-->
<!--//     //     echo '<script>alert("Form has been submitted successfully!");</script>';-->
<!--//     //     header("Location: index.html");-->
<!--//     //     exit;-->
<!--//     // } catch (Exception $e) {-->
<!--//     //     // Handle email sending error-->
<!--//     //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";-->
<!--//     // }-->
<!--// }-->









 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Start session if using CSRF protection (optional)
session_start();

// Include database connection
include('conn.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Validate and sanitize input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($phone) || empty($subject) || empty($message)) {
        echo '<script>Swal.fire("Missing Fields", "All fields are required.", "error");</script>';
        exit;
    }

    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        echo '<script>Swal.fire("Invalid Phone", "Please enter a valid 10-digit phone number.", "error");</script>';
        exit;
    }

    // Insert into the database using prepared statements for security
    $stmt = $conn->prepare("INSERT INTO `tbl_contact` (`name`, `email`, `phone`, `subject`, `message`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

    if ($stmt->execute()) {
        // Show success message and redirect
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Data Sent Successfully",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "index.php";
                });
              </script>';
    } else {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Something went wrong",
                     text: "Failed to send data. Please try again later.",
                confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "index.php";
                });
              </script>';
    }

    $stmt->close();
}
?>


