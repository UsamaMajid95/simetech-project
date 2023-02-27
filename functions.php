<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Connect{
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $db = 'contact';
    public $conn;
 
    public function __construct(){
        
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db);

    }
    
}

class Person extends Connect{
    
    public function save_user($name,$email,$gender,$message,$city,$target){
        $ext = pathinfo($target,PATHINFO_EXTENSION);
#اضيفله المتداد
        $html = "<table><tr><td>Name</td><td>$name</td></tr>
                        <tr><td>Email</td><td>$email</td></tr>
                        <tr><td>Gender</td><td>$gender</td></tr>
                        <tr><td>City</td><td>$city</td></tr>
                        <tr><td>File</td><td>$target</td></tr>
                        <tr><td>Message</td><td>$message</td></tr></table>";

    if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'pdf' && $ext != 'png'){
        return " Only jpg, jpeg ,pdf and png are allowed ";
    }
    else if($_FILES['file']['size']>1000000){
        return "file size is too big";
    }
    else if(file_exists($target)){
        return "file is already exist";
    }
    else if(move_uploaded_file($_FILES['file']['tmp_name'],$target)){
        mysqli_query($this->conn,"INSERT INTO `contact_us`(`name`, `email`, `gender`, `message`, `city`, `file`) VALUES ('$name','$email','$gender','$message','$city','$target')");
        
        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->Port=587;
            $mail->SMTPSecure="tls";
            $mail->SMTPAuth=true;
            $mail->Username="osamatesting1@gmail.com";
            $mail->Password="vlxglvxavxuoelqt";
            $mail->setFrom("osamatesting1@gmail.com");
            $mail->addAddress("osamatesting1@gmail.com");
            $mail->isHTML(true);
            $mail->Subject="New contact us";
            $mail->Body=$html;
            $mail->SMTPOptions = array('ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>false
            ));
            $mail->send();
            echo "Thanks for contact us";
        }catch (Exception $e){
            echo "couldnt send your information : {$mail->ErrorInfo}";
        }

        
    }
    else{
        return "Failed to upload your file";
    }
    }


    public function read_data(){
        
        $data= mysqli_query($this->conn,"SELECT * FROM `contact_us` WHERE 1");
        $num = mysqli_num_rows($data);
        $num_of_data = 2;
        $totalpages=ceil($num/$num_of_data);
        for($btn = 1 ; $btn<=$totalpages ; $btn++){
            echo'<button class="btn btn-dark mx-1 mb-2"><a href="read_data.php?page='.$btn.'" 
            class="text-light">'.$btn.'</a></button>';
        }
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page=1;
        }
        $startlimit=($page-1)*$num_of_data;
        $sql = "SELECT * FROM `contact_us` LIMIT " .$startlimit.','.$num_of_data;
        $result = mysqli_query($this->conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            echo"<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['message']."</td>
                <td>".$row['city']."</td>
                <td>".$row['file']."</td>  
                <td>
                    <a href ='delete.php?id=".$row['id']."' class = 'btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";
            
        }
    }   
    
    
    public function delete_data(){
        $id = $_GET['id'];
        $delete = mysqli_query($this->conn,"DELETE FROM `contact_us` WHERE `id`='$id'");
        header('location:read_data.php');  

    }

    // public function pagination(){
    //     $result= mysqli_query($this->conn,"SELECT * FROM `contact_us` WHERE 1");
    //     $num = mysqli_num_rows($result);
    //     $num_of_data = 3;
    //     $totalpages=ceil($num/$num_of_data);
    //     for($btn = 1 ; $btn<=$totalpages ; $btn++){
    //         echo'<button class="btn btn-dark mx-1 mb-2"><a href="read_data.php?page='.$btn.'" 
    //         class="text-light">'.$btn.'</a></button>';
    //     }

    //     $startlimit=($btn-1)*$num_of_data;
    //     $sql = "SELECT * FROM `contact_us` limit " .$startlimit.','.$num_of_data;
    //     $result = mysqli_query($this->conn,$sql);
    // }
}   



?>