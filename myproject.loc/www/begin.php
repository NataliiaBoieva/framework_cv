<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Пример встраивания РНР в HTML</title>
</head>
<body>
<h1>Пример встраивания РНР в HTML</h1>
2 + 2 = <?php echo 2 + 2;


// this is a comment
# this is a comment
/*
this is a comment
block
*/
echo "<br>";
$x = 2 + 3;
$y = ($x*2) / ($x+1);
echo $y;

$a = 3;
$b = 5;
$c = $a;

echo"<br>";

echo $a = $b;
echo"<br>";
echo $b = $c;
echo"<br>";


echo '№2 Решение без переменной', '<br>';
$a = 3;
$b = 5;

$a = $a * $b;
$b = $a / $b;
$a = $a / $b;

echo $a, '<br>';
echo $b;



$x = 2;
echo '<br>';
echo "x = $x"; //выведет x = 2
echo '<br>';
echo 'x = $x'; //выведет x = $x
echo '<br>';
$var = 123;
echo 'The meaning of variable $var', '<br>';
echo "The meaning is $var", '<br>';
echo 'The meaning of a variable:  . $var . ';



$result = 2 < 4;
var_dump ($result);

echo '<br>'; // bool(false)
$negation = !1;
var_dump ($negation);

echo '<br>'; //bool(true)
$negation = !0;
var_dump ($negation);

echo '<br>'; //bool(false)
$negation = !true;
var_dump ($negation);

echo '<br>'; //bool(true)
$s = 2;
$f = 3;
$and = $s && $f;
var_dump ($and);

echo '<br>'; //bool(false)
$s = 5;
$f = 0;
$and = $s && $f;
var_dump ($and);

echo '<br>'; //bool(true)
$s = 3;
$f = 0;
$or = $s || $f;
var_dump ($or);

echo '<br>'; //int(5)
$s = 5;
$f = 1;
$division = $s / $f;
var_dump ($division);

echo '<br>'; //float(0.2)
$s = 5;
$f = 1;
$division = $f / $s;
var_dump ($division);

echo '<br>'; //int(10)
$s = 5;
$f = '5string';
$addition = $s + $f;
var_dump ($addition);

echo '<br>'; //int(10)
$s = 5;
$f = 'string';
$addition = $s + $f;
var_dump ($addition);

echo '<br>'; //bool(true)
$s = 5;
$f = '5string';
$equality = $s == $f;
var_dump ($equality);

echo '<br>'; //bool(false)
$s = 5;
$f = 'string';
$equality = $s == $f;
var_dump ($equality);

echo '<br>'; //bool(false)
$s = 5;
$f = '5string';
$identicalequality = $s === $f;
var_dump ($identicalequality);

echo '<br>'; //bool(true)
$s = '5';
$f = 5;
$equality = $s == $f;
var_dump ($equality);

echo '<br>'; //bool(true)
$s = '05';
$f = 5;
$equality = $s == $f;
var_dump ($equality);

echo '<br>'; //bool(true)
$s = '05';
$f = '5';
$equality = $s == $f;
var_dump ($equality);

echo '<br>';
$x = 15;
if ($x > 10) {
    echo 'the number greater than 10';
}

echo '<br>';
$x = 8;
if ($x > 10) {
    echo 'the number greater than 10';
    } else {
    echo 'the number less than or equal to';
}

echo '<br>';
$x = 9;
if ($x > 10) {
    echo 'the number greater than 10';
} elseif ($x == 10) {
    echo 'the number is equal to';
} else {
    echo 'the number is less than';
}

echo '<br><br>';
//Statements
// chetnoe nechetnoe

$x = 3;
if ($x % 2 == 0) {
    echo 'the number is even';
    } else {
    echo 'the number is not even';
}

echo '<br><br>';
$x = 7;
$even = $x % 2 == 0 ? 'the number is even' : 'the number is odd';
echo $even;

echo '<br><br>';
$x = 1;
switch ($x % 2) {
	case 0:
	echo 'the number is even';
	break;
	default:
	echo 'the number is odd';
}

echo '<br><br>';
$x = - 2;
if ($x >= 0) {
    echo 'the modul of number: '. $x;
} else {
    echo 'the modul of number: '. - $x;
}

echo '<br>';
$x = -2;
$mod = $x >= 0 ? $x: -$x;
echo 'the modul: ' .$mod;

echo '<br>';
$x= 105;
if ($x > 0) {
    if ($x >= 100) {
        echo 'the number greater than or equal to 100';
            } else {
        echo 'the number greater than 0 but less than 100';
    }
} else {
    echo 'the number less than or equal to 0';
}

echo '<br>';
if ('string') {
    echo 'the statement is executed';
} else {
    echo  'the statement not executed';
}

echo '<br>';
if (0) {
    echo 'the statement is executed';
} else {
    echo 'the statement is not executed';
}

echo '<br>';
if (null) {
    echo 'the statement is executed';
} else {
    echo 'the statement is not executed';
}

echo '<br>';
if (0) {
    echo 'the statement is executed';
} else {
    echo 'the statement is not executed';
}

echo '<br>';
$x = 7;
$even = $x % 2 === 0 ? 'the number is even' : 'the number is not even';
echo $even;

echo '<br>';
$x = 9;
$even = $x % 2 == 0 ? 'the number is even' : 'the number is not even';
echo $even;

echo '<br><br>';
$x = 2;
switch ($x) {
	case 3:
	case 4:
	 echo 'the number is equal to 1 or 2';
	 break;
	case 5:
	 echo 'the number is equal to 5';
	 break;
	default:
	 echo 'the number is neither equal to 1, 2 nor 5'; 
}

echo '<br><br>';
$x = 1;
while($x <= 5) {
	echo "the number is: $x <br>";
	$x++;
}

echo '<br>';
$x = 1;
do {
	echo "The number is: $x <br>";
	$x++;
} while ($x <= 5);

echo '<br><br>';
for ($x = 0; $x <= 10; $x++) {
	echo "the number is: $x <br>";
}

echo '<br><br>';

function getMinNumber(float $a, float $b, float $c) {
	return min ($a, $b, $c);
}

echo getMinNumber(2, 1.22, 3.2);

echo '<br><br>';
function getMinNumber2(float $a, float $b, float $c) {
	if ($a < $b && $a < $c)	{
		return $a;
	} elseif ($b < $a && $b < $c) {
		return $b;
	} else {
		return $c;
		}
}
echo getMinNumber2(2.3, 3.4, 5);

echo '<br><br>';
function getByLink(&$z, &$q) {
	$z = $z * 2;
	$q = $q * 2;	
} 
$a = 3;
$b = 5;
getByLink($a,$b);
echo $a.'<br>'.$b;

echo '<br><br>';
function factorialOfNumber($n) {
	if($n == 1){
		return  $n;
	} else {
		return $n *  factorialOfNumber($n - 1);		
	}
}
echo factorialOfNumber (5);

echo '<br><br>';
function getNumbersFromZero(int $n) {
	if ($n == 0) {
		echo $n;
		return;
	} 
	getNumbersFromZero($n - 1);
	echo ', ' .$n;
}
getNumbersFromZero (5);

echo __DIR__;


?>


</body>
</html>