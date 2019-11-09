<?php
/**
 * 
 */



class Dashboard
{	

	function index(){

		$products= new Products();
		$customers =  new Customers();


		$data = [
			'products' => $products->lists()->num_rows,
			'invoice' => 0,
			'customers' => $customers->index()->num_rows,
			'sales_order' => 0
			 ];

		return $data;
	}


}
	
?>