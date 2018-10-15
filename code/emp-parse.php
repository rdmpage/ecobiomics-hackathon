<?php

ini_set("auto_detect_line_endings", true); // in case some files have Windows ending

$row_count = 0;

$header = array();
$header_lookup = array();

$done = false;

$filename = '../EMP/emp_qiime_mapping_subset_2k.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");		
$file_handle = fopen($filename, "r");
while (!feof($file_handle) && !$done) 
{
	$row = fgetcsv(
		$file_handle, 
		0, 
		"\t",
		"\""
		);
		
	//print_r($row);		

	$go = is_array($row);
			
	if ($go && ($row_count == 0))
	{
		$header = $row;
		
		$n = count($header);
		for ($i = 0; $i < $n; $i++)
		{
			$header_lookup[$header[$i]] = $i;
		}
		
		$go = false;
	}
	if ($go)
	{
		$obj = new stdclass;
		
		foreach ($row as $k => $v)
		{
			if ($v != '')
			{
				$obj->{$header[$k]} = $v;
			}
		}
		
		print_r($obj);
	
	}

	$row_count++;
	
	if ($row_count > 1000) 
	{
		$done = true;
		exit();
	}
}



?>
