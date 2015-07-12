<?php
//Author: Zakaria Hmaidouch
//Website: zhma.info
//Import simplehtmldom lib, from http://simplehtmldom.sourceforge.net
require 'libs/simple_html_dom.php';

$file = 'data.html';
$html = new simple_html_dom();
// Taget URL
$url = 'http://www.zhma.info';
$counter = 1;

$html->load_file($url);
// Data to target
$titles = $html->find('div[class=portfolio-item] h5');
// Open the file to get existing content
$current = @file_get_contents($file);
$current = '<html>
				<head>
					<title>Data Scraping</title>
				</head>
				<body>';

foreach ($titles as $title){
// Append a new data to the file
$current .= "<b>Project $counter:</b> $title->innertext<br>";
// Write the contents back to the file
file_put_contents($file, $current);
$counter++;
}
$current .= 	'</body>
			</html>';
?>
