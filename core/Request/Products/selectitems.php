<?php


require_once('../../class/Products.php');

/////////// get item to recive
if(isset($_POST['barcode'])){


	 $input = $_POST['barcode'];

	$products =  new Products();

	$lists = $products->searchitem($input);

	foreach ($lists as $key => $db) {
		
    echo '<th  class="center"><select  class="form-control itemname txtselect" name="item[]"><option value="'.$db['item_id'] .'">'.$db['item_name'] .'</option></select></th>';
    echo '<th width="15%;" class="center"><input class="form-control field_txt qty" name="qty[]"value="1"></th>';
    echo '<th width="15%;" class="center"><input class="form-control field_txt disc" name="disc[]" value="0"></th>';
    echo '<th width="18%;" class="center"><input class="form-control field_txt prices" name="price[]" value="'.$db['price'].'" readonly></th>';
    echo '<th width="18%;" class="center"><input class="form-control field_txt subtotal" name="subtotal[]" value="'.$db['price'].'" readonly></th>';
    echo '<th><a  class="remove"><i class="fa fa-gavel" aria-hidden="true"></i></a></th>';

	}
}

 
?>