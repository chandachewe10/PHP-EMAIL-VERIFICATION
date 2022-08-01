<?php
require __DIR__.'/config.php';

/*

*/
class Verification
{
    public static $host   = DB_HOST;
    public static $user   = DB_USER;
    public static $pass   = DB_PASS;
    public static $dbname = DB_NAME;
     
    public $link;
    public $error;
    private $tb;
     
    public function __construct()
    {
        $this->connectDB();
        $this->tb = TABLE_NAME;
    }
     
    public function connectDB()
    {
        $this->link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->link) {
            $this->error ="Connection fail".$this->link->connect_error;
            return false;
        }
    }
     
    // Select or Read data
	public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
            if($result->num_rows > 0){
              return $result;
            }else {
              return false;
            }
       }


 
    // Insert data
    public function insert($query)
    {
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }
      
    

    
  
    public function verify_email($key)
    {
        $sql = "SELECT * FROM $this->tb WHERE verification_key='$key'";
        $res = mysqli_query($this->link, $sql);
        $count = mysqli_num_rows($res);
        $r = mysqli_fetch_assoc($res);
        $id = $r['id'];
        if ($count == 1) {
            $usql = "UPDATE `$this->tb` SET verified_at = now() WHERE id=$id";
            $ures = $this->link->query($usql);
            if ($ures) {
               echo "EMAIL VERIFIED SUCCESSFULLY";
            } else {
                echo "EMAIL VERIFICATION FAILED";
            }
        }
    }

    //End of Email verification
}
