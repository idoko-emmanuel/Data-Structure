<?php 

// array_change_key_case — Changes the case of all keys in an array (PHP 4 >= 4.2.0, PHP 5, PHP 7, PHP 8)
// Returns an array with all keys from array lowercased or uppercased. Numbered indices are left as is.


$input_array = array("FirSt" => 1, "SecOnd" => 4);
print_r(array_change_key_case($input_array, CASE_UPPER));

// array_chunk — Split an array into chunks (PHP 4 >= 4.2.0, PHP 5, PHP 7, PHP 8)
// Chunks an array into arrays with length elements. The last chunk may contain less than length elements.
//Returns a multidimensional numerically indexed array, starting with zero, with each dimension containing length elements.
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));
print_r(array_chunk($input_array, 2, true));

// array_column — Return the values from a single column in the input array (PHP 5 >= 5.5.0, PHP 7, PHP 8)

// Array representing a possible record set returned from a database
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
 
$first_names = array_column($records, 'first_name');
print_r($first_names);
$last_names = array_column($records, 'last_name');
print_r($last_names);

// array_combine — Creates an array by using one array for keys and another for its values (PHP 5, PHP 7, PHP 8)
$c = array_combine($first_names, $last_names);
print_r($c);

// array_count_values — Counts all the values of an array (PHP 4, PHP 5, PHP 7, PHP 8)
$array = array(1, "hello", 1, "world", "hello");
print_r(array_count_values($array));

// array_diff_assoc — Computes the difference of arrays with additional index check (PHP 4 >= 4.3.0, PHP 5, PHP 7, PHP 8)

$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red", "d" => "purple");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_assoc($array1, $array2);
print_r($result);

$array1 = array(0, 1, 2);
$array2 = array("00", "01", "2");
$result = array_diff_assoc($array1, $array2);
print_r($result);

// array_diff_key — Computes the difference of arrays using keys for comparison (PHP 5 >= 5.1.0, PHP 7, PHP 8)
$array1 = array('blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4);
$array2 = array('green' => 5, 'yellow' => 7, 'cyan' => 8);

var_dump(array_diff_key($array1, $array2));

$array1 = array('blue' => 1, 'red'  => 2, 'green' => 3, 'purple' => 4);
$array2 = array('green' => 5, 'yellow' => 7, 'cyan' => 8);
$array3 = array('blue' => 6, 'yellow' => 7, 'mauve' => 8);

var_dump(array_diff_key($array1, $array2, $array3));

// array_diff_uassoc — Computes the difference of arrays with additional index check which is performed by a user supplied callback function (PHP 5, PHP 7, PHP 8)

function key_compare_func($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b)? 1:-1;
}

$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_uassoc($array1, $array2, "key_compare_func");
print_r($result);

// array_diff_ukey — Computes the difference of arrays using a callback function on the keys for comparison (PHP 5 >= 5.1.0, PHP 7, PHP 8)
function u_key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 > $key2)
        return 1;
    else
        return -1;
}

$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

var_dump(array_diff_ukey($array1, $array2, 'u_key_compare_func'));

// array_diff — Computes the difference of arrays (PHP 4 >= 4.0.1, PHP 5, PHP 7, PHP 8)
// Compares array against one or more other arrays and returns the values in array that are not present in any of the other arrays.
$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);
print_r($result);

// array_fill_keys — Fill an array with values, specifying keys (PHP 5 >= 5.2.0, PHP 7, PHP 8)
$keys = array('foo', 5, 10, 'bar');
$a = array_fill_keys($keys, 'banana');
print_r($a);

// array_fill — Fill an array with values (PHP 4 >= 4.2.0, PHP 5, PHP 7, PHP 8)
$a = array_fill(-2, 4, 'pear');
print_r($a);

// array_filter — Filters elements of an array using a callback function (PHP 4 >= 4.0.6, PHP 5, PHP 7, PHP 8)
function odd($var)
{
    // returns whether the input integer is odd
    return $var & 1;
}

function even($var)
{
    // returns whether the input integer is even
    return !($var & 1);
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Odd :\n";
print_r(array_filter($array1, "odd"));
echo "Even:\n";
print_r(array_filter($array2, "even"));

$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];

var_dump(array_filter($arr, function($k) {
    return $k == 'b';
}, ARRAY_FILTER_USE_KEY));

var_dump(array_filter($arr, function($v, $k) {
    return $k == 'b' || $v == 4;
}, ARRAY_FILTER_USE_BOTH));

// array_flip — Exchanges all keys with their associated values in an array (PHP 4, PHP 5, PHP 7, PHP 8)
$input = array("oranges", "apples", "pears");
$flipped = array_flip($input);

print_r($flipped);

// array_intersect_assoc — Computes the intersection of arrays with additional index check (PHP 4 >= 4.3.0, PHP 5, PHP 7, PHP 8)
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "b" => "yellow", "blue", "red");
$result_array = array_intersect_assoc($array1, $array2);
print_r($result_array);

// array_intersect_key — Computes the intersection of arrays using keys for comparison (PHP 5 >= 5.1.0, PHP 7, PHP 8)
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

var_dump(array_intersect_key($array1, $array2));

// array_intersect_uassoc — Computes the intersection of arrays with additional index check, compares indexes by a callback function (PHP 5, PHP 7, PHP 8)
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "GREEN", "B" => "brown", "yellow", "red");

print_r(array_intersect_uassoc($array1, $array2, "strcasecmp"));

// array_intersect_ukey — Computes the intersection of arrays using a callback function on the keys for comparison (PHP 5 >= 5.1.0, PHP 7, PHP 8)
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

var_dump(array_intersect_ukey($array1, $array2, 'u_key_compare_func'));

// array_intersect — Computes the intersection of arrays
$array1 = array("a" => "green", "red", "blue");
$array2 = array("b" => "green", "yellow", "red");
$result = array_intersect($array1, $array2);
print_r($result);

// array_is_list — Checks whether a given array is a list (PHP 8 >= 8.1.0)
// Determines if the given array is a list. An array is considered a list if its keys consist of consecutive numbers from 0 to count($array)-1.
array_is_list([]); // true
array_is_list(['apple', 2, 3]); // true
array_is_list([0 => 'apple', 'orange']); // true

// The array does not start at 0
array_is_list([1 => 'apple', 'orange']); // false

// The keys are not in the correct order
array_is_list([1 => 'apple', 0 => 'orange']); // false

// Non-integer keys
array_is_list([0 => 'apple', 'foo' => 'bar']); // false

// Non-consecutive keys
array_is_list([0 => 'apple', 2 => 'bar']); // false

// array_key_exists — Checks if the given key or index exists in the array (PHP 4 >= 4.0.7, PHP 5, PHP 7, PHP 8)
$search_array = array('first' => 1, 'second' => 4);
if (array_key_exists('first', $search_array)) {
    echo "The 'first' element is in the array\n";
}

// array_key_first — Gets the first key of an array (PHP 7 >= 7.3.0, PHP 8)
$array = ['a' => 1, 'b' => 2, 'c' => 3];

$firstKey = array_key_first($array);

var_dump($firstKey);

// array_key_last — Gets the last key of an array (PHP 7 >= 7.3.0, PHP 8
var_dump(array_key_last($array));

// array_keys — Return all the keys or a subset of the keys of an array

// array
// An array containing keys to return.

// filter_value
// If specified, then only keys containing this value are returned.

// strict
// Determines if strict comparison (===) should be used during the search.

$array = array(0 => 100, "color" => "red");
print_r(array_keys($array));

$array = array("blue", "red", "green", "blue", "blue");
print_r(array_keys($array, "blue"));

$array = array("color" => array("blue", "red", "green"),
               "size"  => array("small", "medium", "large"));
print_r(array_keys($array));

// array_map — Applies the callback to the elements of the given arrays (PHP 4 >= 4.0.6, PHP 5, PHP 7, PHP 8)
function cube($n)
{
    return ($n * $n * $n);
}

$a = [1, 2, 3, 4, 5];
$b = array_map('cube', $a);
print_r($b);

function show_Spanish(int $n, string $m): string
{
    return "The number {$n} is called {$m} in Spanish";
}

function map_Spanish(int $n, string $m): array
{
    return [$n => $m];
}

$a = [1, 2, 3, 4, 5];
$b = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

$c = array_map('show_Spanish', $a, $b);
print_r($c);

$d = array_map('map_Spanish', $a , $b);
print_r($d);

// array_merge_recursive — Merge one or more arrays recursively (PHP 4 >= 4.0.1, PHP 5, PHP 7, PHP 8)
$ar1 = array("color" => array("favorite" => "red"), 5);
$ar2 = array(10, "color" => array("favorite" => "green", "blue"));
$result = array_merge_recursive($ar1, $ar2);
print_r($result);

// array_merge — Merge one or more arrays (PHP 4, PHP 5, PHP 7, PHP 8)

$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);

// array_multisort — Sort multiple or multi-dimensional arrays (PHP 4, PHP 5, PHP 7, PHP 8)
$ar1 = array(10, 100, 100, 0);
$ar2 = array(1, 3, 2, 4);
array_multisort($ar1, $ar2);

var_dump($ar1);
var_dump($ar2);

// array_pad — Pad array to the specified length with a value (PHP 4, PHP 5, PHP 7, PHP 8)
$input = array(12, 10, 9);

$result = array_pad($input, 5, 0);
// result is array(12, 10, 9, 0, 0)

$result = array_pad($input, -7, -1);
// result is array(-1, -1, -1, -1, 12, 10, 9)

$result = array_pad($input, 2, "noop");
// not padded

// array_pop — Pop the element off the end of array (PHP 4, PHP 5, PHP 7, PHP 8)
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);

// array_product — Calculate the product of values in an array (PHP 5 >= 5.1.0, PHP 7, PHP 8)
$a = array(2, 4, 6, 8);
echo "product(a) = " . array_product($a) . "\n";
echo "product(array()) = " . array_product(array()) . "\n";

// array_push — Push one or more elements onto the end of array (PHP 4, PHP 5, PHP 7, PHP 8)
$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");
print_r($stack);

// array_rand — Pick one or more random keys out of an array (PHP 4, PHP 5, PHP 7, PHP 8)
$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";

// array_reduce — Iteratively reduce the array to a single value using a callback function (PHP 4 >= 4.0.5, PHP 5, PHP 7, PHP 8)
function sum($carry, $item)
{
    $carry += $item;
    return $carry;
}

function product($carry, $item)
{
    $carry *= $item;
    return $carry;
}

$a = array(1, 2, 3, 4, 5);
$x = array();

var_dump(array_reduce($a, "sum")); // int(15)
var_dump(array_reduce($a, "product", 10)); // int(1200), because: 10*1*2*3*4*5
var_dump(array_reduce($x, "sum", "No data to reduce"));

// array_replace_recursive — Replaces elements from passed arrays into the first array recursively (PHP 5 >= 5.3.0, PHP 7, PHP 8)

$base = array('citrus' => array( "orange") , 'berries' => array("blackberry", "raspberry"), );
$replacements = array('citrus' => array('pineapple'), 'berries' => array('blueberry'));

$basket = array_replace_recursive($base, $replacements);
print_r($basket);

$basket = array_replace($base, $replacements);
print_r($basket);

// array_replace — Replaces elements from passed arrays into the first array (PHP 5 >= 5.3.0, PHP 7, PHP 8)
$base = array("orange", "banana", "apple", "raspberry");
$replacements = array(0 => "pineapple", 4 => "cherry");
$replacements2 = array(0 => "grape");

$basket = array_replace($base, $replacements, $replacements2);
print_r($basket);

// array_reverse — Return an array with elements in reverse order (PHP 4, PHP 5, PHP 7, PHP 8)
$input  = array("php", 4.0, array("green", "red"));
$reversed = array_reverse($input);
$preserved = array_reverse($input, true);

print_r($input);
print_r($reversed);
print_r($preserved);

// array_search — Searches the array for a given value and returns the first corresponding key if successful (PHP 4 >= 4.0.5, PHP 5, PHP 7, PHP 8)

$array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');

$key = array_search('green', $array); // $key = 2;
echo $key."\n";
$key = array_search('red', $array);   // $key = 1;
echo $key."\n";

// array_shift — Shift an element off the beginning of array (PHP 4, PHP 5, PHP 7, PHP 8)

$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_shift($stack);
print_r($stack);

// array_slice — Extract a slice of the array (PHP 4, PHP 5, PHP 7, PHP 8)
$input = array("a", "b", "c", "d", "e");

$output = array_slice($input, 2);      // returns "c", "d", and "e"
$output = array_slice($input, -2, 1);  // returns "d"
$output = array_slice($input, 0, 3);   // returns "a", "b", and "c"

// note the differences in the array keys
print_r(array_slice($input, 2, -1));
print_r(array_slice($input, 2, -1, true));
$ar = array('a'=>'apple', 'b'=>'banana', '42'=>'pear', 'd'=>'orange');
print_r(array_slice($ar, 0, 3));
print_r(array_slice($ar, 0, 3, true));

// array_splice — Remove a portion of the array and replace it with something else (PHP 4, PHP 5, PHP 7, PHP 8)
$input = array("red", "green", "blue", "yellow");
array_splice($input, 2);
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, -1);
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, count($input), "orange");
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, -1, 1, array("black", "maroon"));
var_dump($input);

// array_sum — Calculate the sum of values in an array (PHP 4 >= 4.0.4, PHP 5, PHP 7, PHP 8)
$a = array(2, 4, 6, 8);
echo "sum(a) = " . array_sum($a) . "\n";

$b = array("a" => 1.2, "b" => 2.3, "c" => 3.4);
echo "sum(b) = " . array_sum($b) . "\n";
class cr {
    private $priv_member;
    function __construct($val)
    {
        $this->priv_member = $val;
    }

    static function comp_func_cr($a, $b)
    {
        if ($a->priv_member === $b->priv_member) return 0;
        return ($a->priv_member > $b->priv_member)? 1:-1;
    }
}

$a = array("0.1" => new cr(9), "0.5" => new cr(12), 0 => new cr(23), 1=> new cr(4), 2 => new cr(-15),);
$b = array("0.2" => new cr(9), "0.5" => new cr(22), 0 => new cr(3), 1=> new cr(4), 2 => new cr(-15),);

$result = array_udiff_assoc($a, $b, array("cr", "comp_func_cr"));
print_r($result);

// array_udiff_uassoc — Computes the difference of arrays with additional index check, compares data and indexes by a callback function (PHP 5, PHP 7, PHP 8)
class cru {
    private $priv_member;
    function __construct($val)
    {
        $this->priv_member = $val;
    }

    static function comp_func_cr($a, $b)
    {
        if ($a->priv_member === $b->priv_member) return 0;
        return ($a->priv_member > $b->priv_member)? 1:-1;
    }

    static function comp_func_key($a, $b)
    {
        if ($a === $b) return 0;
        return ($a > $b)? 1:-1;
    }
}
$a = array("0.1" => new cru(9), "0.5" => new cru(12), 0 => new cru(23), 1=> new cru(4), 2 => new cru(-15),);
$b = array("0.2" => new cru(9), "0.5" => new cru(22), 0 => new cru(3), 1=> new cru(4), 2 => new cru(-15),);

$result = array_udiff_uassoc($a, $b, array("cru", "comp_func_cr"), array("cru", "comp_func_key"));
print_r($result);

// array_udiff — Computes the difference of arrays by using a callback function for data comparison (PHP 5, PHP 7, PHP 8)