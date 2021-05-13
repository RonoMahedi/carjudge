<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"carjudge");
?>

<?php
if(!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	ini_set("SMTP","ssl://smtp.gmail.com");
	ini_set("smtp_port","465");
	$headers = 'From:' $email->userEmail . "\r\n" .
	             'MIME-Version: 1.0' . "\r\n" .
	             'Content-Type: text/html; charset=utf-8';



	$toEmail = "carjudge.mailing.test@gmail.com";

	if(mail($toEmail, $subject, $content, $headers)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}
	$conn = mysqli_connect("localhost", "root", "", "cardatabase") or die("Connection Error: " . mysqli_error($conn));
	mysqli_query($conn, "INSERT INTO contact (userName, userEmail ,subject,content) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $content. "')");
	$insert_id = mysqli_insert_id($conn);
	if(!empty($insert_id)) {
	   $message = "Your contact information is saved successfully.";
	   $type = "success";
	}

}


?>
