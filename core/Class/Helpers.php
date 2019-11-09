<?php
	



	
class Helpers {

 	private static  $conn;

    public static $totalpage;

    public static $page;



 	function __construct(){

 		 $db = new Database();

        Helpers::$conn = $db->Connect();  

        return Helpers::$conn;


 	}

 	public static function limit($table) {

	    $pagecount = Helpers::CountTable($table);    

	   	$perpage = 50;   

	    $totalpage = ceil($pagecount / $perpage);

	     if(isset($_GET['page'])) {

	      $page =  $_GET['page'];

	     }else {

	        $page ="";

	     }

	     if($page < 1){

	        $page = 1;

	     } else if ($page > $totalpage) {

	        $page = $totalpage;

	     }else {

	     }

	     return $limit = 'LIMIT '  .($page - 1) * $perpage .','.$perpage;

 	}

 	public static function CountTable($table){
 	
        
        $query = "SELECT * FROM $table";

        $result = mysqli_query(Helpers::$conn,$query); 

        return  $count = $result->num_rows;




 	}




 	public static function escape_string($string){
   
    	return mysqli_real_escape_string(Helpers::$conn, $string);
 	}

 }


?>

