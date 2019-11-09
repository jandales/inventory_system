<?php include '../inc/db.php' ?>
<?php



//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
   $sql = "SELECT item_name FROM products WHERE item_name LIKE '%{$query}%' ";
    $req = mysqli_query($connect,$sql);
	$array = array();
    while ($row = mysqli_fetch_array($req)) {
        $array[] = array (
            'label' => $row['item_name'],
            'value' => $row['item_name'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>