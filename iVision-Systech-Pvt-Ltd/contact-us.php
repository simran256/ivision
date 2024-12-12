<?php 

include("conn.php");

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>	
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>"iVision" Systech Pvt. Ltd.</title>		
     <?php include('headcss.php')?>	
</head>
<body class="home-v1">
	
	<?php include('header.php')?>

    <!-- Page Heading Section Start -->	
	<div class="pagehding-sec">
		<div class="images-overlay"></div>		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-heading">
						<h1>Contact Us</h1>
					</div>				
					<div class="page-breadcrumb-inner">
						<div class="page-breadcrumb">
							<div class="breadcrumb-list">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="#">Contact Us</a></li>
								</ul>
							</div>					
						</div>				
					</div>				
				</div>				
			</div>
		</div>
	</div>
	<!-- Page Heading Section End -->	
<!-- Contact Page Section Start -->
	<div class="contact-page-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="contact-page-form">
						<h2>Get in Touch</h2>	
						<form action="" method="post">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="single-input-field">
									<input type="text" placeholder="Your Name" name="name" required/>
								</div>
							</div>	
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="single-input-field">
									<input type="email" placeholder="E-mail" name="email" required/>
								</div>
							</div>															
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="single-input-field">
									<input type="text" placeholder="Phone Number" name="phone" required/>
								</div>
							</div>	
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="single-input-field">
									<input type="text" placeholder="Subject" name="subject" required/>
								</div>
							</div>								
							<div class="col-md-12 message-input">
								<div class="single-input-field">
									<textarea  placeholder="Write Your Message" name="message" required></textarea>
								</div>
							</div>																								
							<div class="single-input-fieldsbtn">
								<input type="submit" name="submit" value="Send Now"/>
							</div>													
						</form>		
					</div>				
				</div>
				<div class="col-md-4">	
				<?php
				$sql = "SELECT * FROM `users` WHERE `status` = '1'";
                $res = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($res);
                $phone = $row['mobile'];
                $whatsapp = $row['whatsapp_number'];
                $email = $row['email'];
                $email2 = $row['enquiry_email'];
                $address = $row['address'];
                $fb = $row['facebook_link'];
                $link = $row['linkedin_link'];
                $tw = $row['twittter_link'];
                $insta = $row['instagram_link'];
                				
				?>
					<div class="contact-info">
						<div class="contact-info-item">
							<div class="contact-info-icon">
								<i class="icofont-map-pins"></i>
							</div>
							<div class="contact-info-text">
								<h2>address</h2>
								<span><?=$address?></span> 
							</div>
						</div>						
					</div>					
					<div class="contact-info">
						<div class="contact-info-item">
							<div class="contact-info-icon">
								<i class="icofont-email"></i>
							</div>
							<div class="contact-info-text">
								<h2>e-mail</h2>
								<span><?=$email?></span> 
								<span><?=$email2?></span>
							</div>
						</div>						
					</div>								
					<div class="contact-info">
						<div class="contact-info-item">
							<div class="contact-info-icon">
								<i class="icofont-telephone"></i>
							</div>
							<div class="contact-info-text">
								<h2>office time</h2>
								<span>+91-<?=$phone?></span>
								<span>+91-<?=$whatsapp?></span>
								
							</div>
						</div>						
					</div>					
				</div>				
			</div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13996.728566894588!2d77.1369959!3d28.7141022!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0164b34a6c19%3A0xb90e1c18d951a9af!2sIvision%20Systech%20Private%20Limited!5e0!3m2!1sen!2sin!4v1731318905534!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
	<!-- Contact Page Section End -->	

	<?php include('footer.php')?>
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
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














