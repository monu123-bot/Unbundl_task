<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php';
echo "my name is monu dixit <br>";
require("connection.inc.php");
echo "my name is monu dixit <br>";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["invoice"]) && isset($_FILES["warrantyForm"])) {
    
   

    $serviceOrderNo = $_POST['orderNo'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $pincode = $_POST['pincode'] ?? '';
    $serialNo = $_POST['serialNo'] ?? '';
    $purchaseDate = $_POST['purchaseDate'] ?? '';
    
  
    
   
    
    $targetDirectory = "uploads/"; 
    
    
    $randomString = bin2hex(random_bytes(5));
    $invoice = $targetDirectory . $randomString . basename($_FILES["invoice"]["name"]) ;

   
    move_uploaded_file($_FILES["invoice"]["tmp_name"],  $invoice);
    
    
    $warrantyForm = $targetDirectory . $randomString . basename($_FILES["warrantyForm"]["name"]);
    
    move_uploaded_file($_FILES["warrantyForm"]["tmp_name"],  $warrantyForm);
    
    
    
    echo $serviceOrderNo,$modelName,$name,$email,$mobile,$address,$city,$state,$pincode,$serialNo,$purchaseDate,$invoice,$warrantyForm;
    
    $username = "epiz_30874962";
    $password = "8RxeMsjLZen5D";
    $server = "sql210.epizy.com";
    $database = "epiz_30874962_consultancy";

   
    $conn = mysqli_connect($server,$username,$password,$database);
   
    if ($conn->connect_error) {
        
        header("Location: ../error.php");
    }
    else{
        echo 'connected';
    }

    $sql1 = "Select * from warranty_registration where orderNumber = '$serviceOrderNo' ";

    $result0 = $conn->query($sql1);
if($result0->num_rows>0){
    header("Location: ../exist.php");
}

   
    $sql = "INSERT INTO warranty_registration 
        (orderNumber, modelName, name, email, mobile, address, city, state, pincode, serialno, purchasedate, invoice, warrantyform) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);


$stmt->bind_param("sssssssssssss", 
    $serviceOrderNo, $modelName, $name, $email, $mobile, $address, 
    $city, $state, $pincode, $serialNo, $purchaseDate, $invoice, $warrantyForm);


$stmt->execute();

    
    if ($stmt->affected_rows > 0) {
        
        $mail = new PHPMailer(true);

try {
  

     $template = ' <h3>New Warranty Registration Request</h3>
    <table border="1">
       
       <tbody>
           <tr>
               <td><b> Installation Service Order Number</td>
              
               <td>{serviceOrderNo}</td>
           </tr>
           <tr>
               <td><b>Model Name</td>
               
               <td>{modelName}</td>
           </tr>
           <tr>
               <td><b>Customer Name</td>
              
               <td>{name}</td>
           </tr>
         <tr>
               <td><b>Customer Email</td>
              
               <td>{email}</td>
           </tr>
         <tr>
               <td><b>Customer Mobile Number</td>
              
               <td>{mobile}</td>
           </tr>
         <tr>
               <td><b>Customer Address</td>
              
               <td>{address}</td>
           </tr>
         <tr>
               <td><b>Customer City</td>
              
               <td>{city}</td>
           </tr>
         <tr>
               <td><b>Customer State</td>
              
               <td>{state}</td>
           </tr>
         <tr>
               <td><b>Customer Pincode</td>
              
               <td>{pincode}</td>
           </tr>
         <tr>
               <td><b>Product Serial Number</td>
              
               <td>{serialNo}</td>
           </tr><tr>
               <td><b>Product Purchase Date</td>
              
               <td>{purchaseDate}</td>
           </tr><tr>
               <td><b>Product Invoice</td>
              
               <td>Attached</td>
           </tr>
         <tr>
               <td><b>Product Warranty Registration Form</td>
              
               <td>Attached</td>
           </tr>
         
       </tbody>
    </table>
        ';

        $template = str_replace(
        ['{serviceOrderNo}', '{modelName}', '{name}','{email}','{mobile}','{address}','{city}','{state}','{pincode}','{serialNo}','{purchaseDate}'],
        [$serviceOrderNo, $modelName, $name,$email,$mobile,$address,$city,$state,$pincode,$serialNo,$purchaseDate],
        $template
    );
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'monudixit0007@gmail.com';                     
    $mail->Password   = 'oulgygcqbrdbjqea';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    
    $mail->setFrom('monudixit0007@gmail.com', 'Contact Form');
    $mail->addAddress('hr@unbundl.com', 'Company');  
    // $mail->addAddress('monudixit0007@gmail.com', 'Company');    
    
    $mail->addAttachment($invoice);         
    $mail->addAttachment($warrantyForm);    

    $mail->isHTML(true);                                  
    $mail->Subject = 'Warranty Registration';
    $mail->Body    = $template;
    
    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        
        
        header("Location: ../thanks.php");
        
    } else {
        
        header("Location: ../error.php");
        echo "Error inserting data: " . $stmt->error;
    }

    
    $stmt->close();
    $conn->close();
}
else{
    header("Location: ../error.php");
    echo 'no thisn';
}
?>
