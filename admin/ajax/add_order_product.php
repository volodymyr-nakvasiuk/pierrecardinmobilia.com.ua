<?php
	chdir('../..');
	require_once('api/Admin.php');
	$admin = new Admin();
	$limit = 100;
	
	$keyword = $admin->request->get('query', 'string');
	
	$admin->db->query('SELECT p.id, p.name, i.filename as image FROM __products p
	                    LEFT JOIN __images i ON i.product_id=p.id AND i.position=(SELECT MIN(position) FROM __images WHERE product_id=p.id LIMIT 1)
	                    LEFT JOIN __variants pv ON pv.product_id=p.id AND (pv.stock IS NULL OR pv.stock>0) AND pv.price>0
	                    WHERE p.name LIKE "%'.mysql_real_escape_string($keyword).'%"
	                    ORDER BY p.name LIMIT ?', $limit);
	$products = array();
	foreach($admin->db->results() as $product)
		$products[$product->id] = $product;
	
	$admin->db->query('SELECT v.id, v.name, v.price, IFNULL(v.stock, ?) as stock, (v.stock IS NULL) as infinity, v.product_id FROM __variants v WHERE v.product_id in(?@) AND (v.stock IS NULL OR v.stock>0) AND v.price>0 ORDER BY v.position', $admin->settings->max_order_amount, array_keys($products));
	$variants = $admin->db->results();
	
	foreach($variants as $variant)
		if(isset($products[$variant->product_id]))
			$products[$variant->product_id]->variants[] = $variant;
	
	
	foreach($products as $product)
	{
		if(!empty($product->variants))
		{
			if(!empty($product->image))
			{
				$product->image = $admin->design->resize_modifier($product->image, 35, 35);
				$products_names[] = $product->name;
			}
			else
				$products_names[] = $product->name;	
				
			$products_data[] = $product;		
		}
	}

	$res->query = $keyword;
	$res->suggestions = $products_names;
	$res->data = $products_data;
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		
	print json_encode($res);
