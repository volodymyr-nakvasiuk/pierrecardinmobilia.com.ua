<?php
	chdir('../..');
	require_once('api/Admin.php');
	$admin = new Admin();
	$limit = 100;
	
	$keyword = $admin->request->get('query', 'string');
	
	$admin->db->query('SELECT u.id, u.name, u.email FROM __users u WHERE u.name LIKE "%'.mysql_real_escape_string($keyword).'%" OR u.email LIKE "%'.mysql_real_escape_string($keyword).'%"ORDER BY u.name LIMIT ?', $limit);
	$users = $admin->db->results();
	
	foreach($users as $user)
	{
		$names[] = $user->name." ($user->email)";			
		$data[] = $user;		
	}

	$res->query = $keyword;
	$res->suggestions = $names;
	$res->data = $data;
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		
	print json_encode($res);
