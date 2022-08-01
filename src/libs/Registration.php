<?php
require_once "vendor/autoload.php";
require __DIR__.'/Verification.php';
use chandachewe\php_email_verification\SendEmailVerification;

class Registration
{
    private $db;
    private $tb;
    

    public function __construct()
    {
        $this->db = new Verification();
        $this->tb = TABLE_NAME;
    }




    public function userReg($data)
    {
        
               
        
        $email = $data['email'];
        
        
        $pass = (password_hash($data['pass'], PASSWORD_DEFAULT));
        
        
                
        //check empty value
        if (empty($email) or empty($pass)) {
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <div>
                    <div class="font-medium text-600">
                        <i class="fa-regular fa-bell"></i>
                    <strong>Hello there!</strong> You have some feedbacks
                    </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        <div>
                        <span class="text-danger">Fields must not be empty !</span>
                </div>
                    </ul>
                      </div>
                </div> 
            
            ';
            return $msg;
        }
         
        
        // Check if email is unique
        $ckemail = "SELECT * FROM $this->tb WHERE email='$email'";
        $result = $this->db->select($ckemail);
        if ($result != false) {
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <div>
                    <div class="font-medium text-600">
                        <i class="fa-regular fa-bell"></i>
                    <strong>Hello there!</strong> You have some feedbacks
                    </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        <div>
                        <span class="text-danger">This email has already been taken!</span>
                </div>
                    </ul>
                      </div>
                </div> 
            
            ';
            return $msg;
        } else {
            $verification_key = random_int(100, 100000).md5($email);
           
            $sql = "INSERT INTO $this->tb (`email`,`pass`,`verification_key`) VALUES ('$email','$pass','$verification_key')";
            $inserted = $this->db->insert($sql);
            if ($inserted) {
                SendEmailVerification::send_verification_email($email, "USER", $verification_key);
            } else {
                $msg = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <div>
                    <div class="font-medium text-600">
                        <i class="fa-regular fa-bell"></i>
                    <strong>Hello there!</strong> You have some feedbacks
                    </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        <div>
                        <span class="text-danger">Registration failed!</span>
                </div>
                    </ul>
                      </div>
                </div> 
            
            ';
                return $msg;
            }
        }
    }
}
