<?php
	$sum=0;

	$file_out = file("cart.txt");
	$c = count($file_out);
	
	for ($i = 0; $i < $c; $i++) 
	{
		$tableArray1 = preg_split('/;|,/', $file_out[$i], -1, PREG_SPLIT_DELIM_CAPTURE);
		$num1 = $tableArray1[2];

		$q=(int) $tableArray1[2];
		if ($q <= -1) 
		{
			unset($file_out[$i]);
			file_put_contents("cart.txt", implode("", $file_out));
		}
		
		$num = $tableArray1[3];
		$int = (int)$num;
		$p = (float)$num;
		$cur = $tableArray1[4];

		if ($q >= 1) 			
		{
			$placeholders = array('EUR', 'USD', 'GBP');
			$vals = array(1, 1.14, 0.88);
			$rep_cur = str_replace($placeholders, $vals, $cur);
			$sum = $sum + $q * $p / $rep_cur;
		}
	
	}
	echo($sum);
?>