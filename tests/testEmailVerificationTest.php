<?php 
use PHPUnit\Framework\TestCase;
use chandachewe\php_email_verification\SendEmailVerification;

class testEmailVerificationTest extends TestCase{

    public function testNow(){
        

        $calculator = 15;
        $this->assertEquals(12, SendEmailVerification::$smtphost);
    }
   


}








?>