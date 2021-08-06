<?php 
$binaryArray = array(
	50 => array(
		10=>array(
			4=>array(
				1=>array(),
				3=>array()
			),
			6=>array(
				2=>array(),
				4=>array()
			)
		),
		40=>array(
			10=>array(
				2=>array(),
				8=>array()
			),
			30=>array(
				10=>array(),
				20=>array()
			)
		)
	)
);
echo '<pre>';
echo '<p style="font-weight:bold;">Total Nodes are: '.count($binaryArray, COUNT_RECURSIVE).'</p>';
print_r($binaryArray);