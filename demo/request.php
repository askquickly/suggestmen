<?php
// Only a very simple demo not for production always treat user input as not clean
if($_GET['input'] == 'badwords') {
exit();
}
else
{
$q = filter_var($_GET['input'], FILTER_SANITIZE_STRING);
}
$url1 = "http://localhost:1234/example/suggest/?n=9&q=$q";
$url2 = "http://localhost:1235/example/suggest/?n=9&q=$q";
// just add to list of arrays if needed
$words = array($url1, $url2);
$url = $words[rand(0, count($words)-1)];
$data = str_replace(
    array("\r\n", "\n", "\r"), 
    '',
    file_get_contents($url)
);
header('Content-type: application/json; charset=UTF-8');
$ss = '{"results":';
$st = '}';
// results layout here
echo $ss.$data.$st;
?>
