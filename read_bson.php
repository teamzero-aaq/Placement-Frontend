<?php 
$data = file_get_contents('aptitude_area.json');
$json = json_decode($data,true);

$inner_arr=(array)($json['test_questions']);

$inner=(array)($inner_arr[0]);

print_r($inner[0]['question']);
echo '<br>';
print_r($inner[0]['opta']);
echo '<br>';
print_r($inner[0]['optc']);
echo '<br>';
print_r($inner[0]['ans']);
echo '<br>';
print_r($inner[0]['explanation']);
echo '<br>';

?>