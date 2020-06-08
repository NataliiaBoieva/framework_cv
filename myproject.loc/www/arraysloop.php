<!DOCTYPE html>
<?php
$article = [ 
'title' => 'Month edition',
'author' => 'Ivanov Ivan',
'text' => 'something iconic',
'name_of_Newspaper' => [
	'ful_name' => 'The New York Garden',
	'short_name' => 'TNYG',
	'period' => [
	'date' => '15',
	'month' => 'April'
	]
]
];
$article['name_of_Newspaper']['abr'] = 'TNYG';
$article['name_of_Newspaper']['period']['month']='May';


$carsSpeeds = [
95,
140,
78
];
$sumOfSpeeds = 0;
foreach ($carsSpeeds as $speed){
	$sumOfSpeeds += $speed;
}
$countOfCars = count ($carsSpeeds);
$avarageSpeed = $sumOfSpeeds / $countOfCars;
echo round($avarageSpeed);

$carsSpeeds1 = [
95,
140,
78
];
$avarageSpeed1 = array_sum ($carsSpeeds1) / count ($carsSpeeds1);
echo '<br>';
echo round($avarageSpeed1);

$carsSpeeds2 = [
95,
140,
78
];
$index = 0;
$sumOfSpeeds = 0;

foreach ($carsSpeeds2 as $speed2){
	$index ++;
	$sumOfSpeeds2 += $speed2;
}
$avarageSpeed2 = $sumOfSpeeds2 / $index;
echo '<br>';
echo round($avarageSpeed2);

echo '<br><br>';
$w = 345;
while ($w<= 357) {
	if ($w % 2 == 0) {
	$arr[] = $w;
	}
	$w++;
}
foreach ($arr as $value) {
	echo $value . ',';
}
echo '<br><br>';


$randomValues = [];

for ($i = 1;$i <= 50;$i++) {
    $randomValues[] = mt_rand();
}
var_dump($randomValues);

echo '<br><br>';
for ($i=1000; $i<=10000; $i++){
	if ($i%17==0){
		echo $i;
		echo ' ';
	}
}

echo '<br><br>';
$fibo = [];
$prevNumber = 0;
$number = 1;

array_push($fibo, $prevNumber, $number);

for ($i = 1; $i <= 100000; $i = $number + $prevNumber){
        $fibo[] = $i;
        $prevNumber = $number;
        $number = $i;
}

var_dump($fibo);

echo '<br><br>';
$a = 0;
$b = 1;


for(;$a<=100000;)
{
    echo $a.'<br>';
    $b = $b + $a;
    $a = $b - $a;   
}

echo '<br><br>';

$i=1;
while ($i < 8) {
    echo 'Итерация $i номер '. $i . '<br>';
    $i++;
   
    $k=1;
    while ($k < 8) {
        echo 'Итерация $k номер '. $k . '<br>';
        if ($k === 5) break 2;
        $k++;
    }
}

echo '<br><br>';
$rows = 20; // количество строк, tr
$cols = 20; // количество столбцов, td

$table = '<table border="1">';

for ($tr=1; $tr<=$rows; $tr++){
    $table .= '<tr>';
    for ($td=1; $td<=$cols; $td++){
        if ($tr===1 or $td===1){
            $table .= '<th style="color:white;background-color:green;">'. $tr*$td .'</th>'; // вычислили первую строку или столбец
        }else{
            $table .= '<td>'. $tr*$td .'</td>'; // все ячейки, кроме ячеек из первого столбца и первой строки
        }
    }
    $table .= '</tr>';
}

$table .= '</table>';
echo $table; // сделали эхо всего 1 раз

echo '<br><br>';
$array = [1,2,3,4,5,6,7,8, 9, 10];
$number = 7;
$match = false;
foreach ($array as $value) {
	if ($value === $number) {
		$match = true;
		break;
	}
}
echo $match ? 'Matching is found' : 'Matching not found';

echo '<br><br>';

$arr = [1,2,3,4,5,6,7,8, 9, 10];
$number = 17;
function searchForMatch($arr, $number){
	foreach ($arr as $value){
		if ($value === $number){
			return true;
		}
	}
	return false;
}
var_dump(searchForMatch($arr, $number));
echo '<br><br>';

$array = [1, 2, 0, 4, 0];

function findItem($array, $item) {
    $isNumberFound = false;

    foreach ($array as $value) {
        if ($item == $value) {
            $isNumberFound = true;
            break;
        } else {
            $isNumberFound = false;
        }
    }

    return $isNumberFound;
};

$result = findItem($array, 3);

var_dump($result);

echo '<br><br>';
$array = [
    'login' => 'admin'
];

if (array_key_exists('password', $array)) {
    echo $array['password'];
} else {
    echo 'Ключ "password" в массиве не найден';
}
echo '<br><br>';
$articlesFromIvan = [
    'Статья 1',
    'Статья 2'
];

$articlesFromMaria = [
    'Статья 3',
    'Статья 4'
];

$allArticles = array_merge($articlesFromIvan, $articlesFromMaria);
foreach ($allArticles as $value) {
	echo $value;
	echo '<br>';
}

echo '<br><br>';
$array = [1,3,2];
sort ($array);
$string = implode (':', $array);
echo $string;

echo '<br><br>';
$array = [1,2,3,4,5];
$arraysliced = array_slice ($array, 1, -2);
var_dump ($arraysliced);

echo '<br><br>';
$array = [1,2,5,2,3,1,6];
$arrayFiltered = array_unique($array);
var_dump ($arrayFiltered);

echo '<br><br>';
$array = [1,2,5,2,3,1,6];
$arrayFilteredByKey = array();
foreach ($array as $key=>$value) {
	$arrayFilteredByKey[$value] = true;
	var_dump ($arrayFilteredByKey);
}
$arrayFilteredByKey = array_keys($arrayFilteredByKey);
var_dump ($arrayFilteredByKey );




?>
<html>
<head>
	<title><?= $article['title']?></title>
</head>
<body>
<h1><?= $article['title']. ' ' . $article['author']. ' ' . $article ['name_of_Newspaper']['ful_name']  ?></h1>
<p><?= $article['text'] . ' ' . $article['name_of_Newspaper' ]['abr' ] . ' ' . $article['name_of_Newspaper' ]['period']['date'] . ' ' . $article['name_of_Newspaper' ]['period']['month']?></p>





</body>
</html>