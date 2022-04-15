<?php 

$date = date('j_F_Y');

if(!is_dir("./download"))
    mkdir("./download");
mkdir("./download/" .$date);


	$url = "https://www.shutterstock.com/fr/search/come+on";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	$newquery = curl_exec($ch);
	$array = [];
	$pattern = '#"([^"]+(gif|png|jpg|jpeg))#i';
	preg_match_all($pattern, $newquery, $array);
	var_dump($array);

	$j = 0;
	for ($i = 1; $i <= preg_match_all($pattern, $newquery, $array) ; $i++){
		$img = $array[1][$i];
		$name = "files" .$i;
		/*file_put_contents("./download/" .$date.'/'.$name, file_get_contents($img));*/
		file_put_contents("./download/".$date."/".$name.".".$array[2][$j], file_get_contents($img));
	}

	
 	


	