<?php 

$string = 'This is a php string preparation file, all my string function codes and test will be here';

//str_contains function php 8
if(str_contains($string, 'codes')) echo 'The string is contained in the haystack'."\n\n";

if(str_contains($string, '')) echo 'Checking the existence of an empty string will always return true'."\n\n";

$message = (str_contains($string, 'True')) ? 'str_contain function is not case sensitive'."\n\n" : 'str_contain function is case sensitive'."\n\n";

echo $message;

//addcslashes — Quote string with slashes in a C style (PHP 4, PHP 5, PHP 7, PHP 8)
echo addcslashes($message, 'A..z'); // All upper and lower-case letters will be escaped
echo addcslashes("zoo['.']", 'A..z')."\n\n";

//addslaashes - Quote string with slashes (PHP 4, PHP 5, PHP 7, PHP 8)
echo addslashes("Is your name O'Reilly?")."\n\n"; //A use case of addslashes() is escaping the aforementioned characters in a string that is to be evaluated by PHP:

//bin2hex — Convert binary data into hexadecimal representation (PHP 4, PHP 5, PHP 7, PHP 8)
echo bin2hex($string)."\n\n";

// chr — Generate a single-byte string from a number (PHP 4, PHP 5, PHP 7, PHP 8)
echo 'Character function: '.chr(240) . chr(159) . chr(144) . chr(152)."\n\n";

//chunk_split — Split a string into smaller chunks (PHP 4, PHP 5, PHP 7, PHP 8)
echo 'Chunck Split function: '.chunk_split($string, 2, ",")."\n\n";

// convert_uudecode — Decode a uuencoded string (PHP 5, PHP 7, PHP 8)
echo 'Convert UUdecode function: '.convert_uudecode("+22!L;W9E(%!(4\"$`\n`")."\n\n";

// convert_uuencode — Encode a uuencoded string (PHP 5, PHP 7, PHP 8)
echo 'Convert UUencode function: '.convert_uuencode("I love PHP!")."\n\n";

// count_chars — Return information about characters used in a string (PHP 4, PHP 5, PHP 7, PHP 8)
// 0 - an array with the byte-value as key and the frequency of every byte as value.
// 1 - same as 0 but only byte-values with a frequency greater than zero are listed.
// 2 - same as 0 but only byte-values with a frequency equal to zero are listed.
// 3 - a string containing all unique characters is returned.
// 4 - a string containing all not used characters is returned.

foreach(count_chars($string, 1) as $index => $value){
    echo "There were $value instance(s) of \"" , chr($index) , "\" in the string.\n";
}

echo 'Count characters function: '.count_chars($string, 3)."\n\n";

// crc32 — Calculates the crc32 polynomial of a string (PHP 4 >= 4.0.1, PHP 5, PHP 7, PHP 8)
echo 'Crc32 function: '.crc32($string)."\n\n";

//crypt — One-way string hashing (PHP 4, PHP 5, PHP 7, PHP 8)
echo 'Crypt function: '.crypt($string, 'abc')."\n\n";

// explode — Split a string by a string (PHP 4, PHP 5, PHP 7, PHP 8)

// separator
// The boundary string.

// string
// The input string.

// limit
// If limit is set and positive, the returned array will contain a maximum of limit elements with the last element containing the rest of string.

// If the limit parameter is negative, all components except the last -limit are returned.

// If the limit parameter is zero, then this is treated as 1.
$explode = explode(" ", $string, -10);
print_r($explode);

// get_html_translation_table — Returns the translation table used by htmlspecialchars() and htmlentities() (PHP 4, PHP 5, PHP 7, PHP 8)
var_dump(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES | ENT_HTML5));

//hebrev — Convert logical Hebrew text to visual text (PHP 4, PHP 5, PHP 7, PHP 8)
echo hebrev($string, 10)."\n\n";

// hex2bin — Decodes a hexadecimally encoded binary string (PHP 5 >= 5.4.0, PHP 7, PHP 8)
echo 'Hex to Bin function: '.hex2bin("6578616d706c65206865782064617461")."\n\n";

// html_entity_decode — Convert HTML entities to their corresponding characters (PHP 4 >= 4.3.0, PHP 5, PHP 7, PHP 8)
// htmlentities — Convert all applicable characters to HTML entities (PHP 4, PHP 5, PHP 7, PHP 8)
$orig = "I'll \"walk\" the <b>dog</b> now";

$a = htmlentities($orig);

$b = html_entity_decode($a);

echo $a."\n\n";
echo $b."\n\n";

// htmlspecialchars_decode — Convert special HTML entities back to characters
echo htmlspecialchars_decode($a)."\n\n";

// note that here the quotes aren't converted
echo htmlspecialchars_decode($a, ENT_NOQUOTES)."\n\n";

// htmlspecialchars — Convert special characters to HTML entities
echo htmlspecialchars($orig)."\n\n";

//implode — Join array elements with a string (PHP 4, PHP 5, PHP 7, PHP 8)

// join — Alias of implode() (PHP 4, PHP 5, PHP 7, PHP 8)
echo implode(" ", $explode)."\n\n";

// lcfirst — Make a string's first character lowercase (PHP 5 >= 5.3.0, PHP 7, PHP 8)
// Returns a string with the first character of string lowercased if that character is an ASCII character in the range "A" (0x41) to "Z" (0x5a).

echo lcfirst($string)."\n\n";

// levenshtein — Calculate Levenshtein distance between two strings (PHP 4 >= 4.0.1, PHP 5, PHP 7, PHP 8)
// The Levenshtein distance is defined as the minimal number of characters you have to replace, insert or delete to transform string1 into string2. The complexity of the algorithm is O(m*n), where n and m are the length of string1 and string2 (rather good when compared to similar_text(), which is O(max(n,m)**3), but still expensive).

// If insertion_cost, replacement_cost and/or deletion_cost are unequal to 1, the algorithm adapts to choose the cheapest transforms. E.g. if $insertion_cost + $deletion_cost < $replacement_cost, no replacements will be done, but rather inserts and deletions instead.

// input misspelled word
$input = 'appinapple';

// array of words to check against
$words  = array('apple','pineapple','banana','orange',
                'radish','carrot','pea','bean','potato');

// no shortest distance found, yet
$shortest = -1;

// loop through words to find the closest
foreach ($words as $word) {

    // calculate the distance between the input word,
    // and the current word
    $lev = levenshtein($input, $word);

    // check for an exact match
    if ($lev == 0) {

        // closest word is this one (exact match)
        $closest = $word;
        $shortest = 0;

        // break out of the loop; we've found an exact match
        break;
    }

    // if this distance is less than the next found shortest
    // distance, OR if a next shortest word has not yet been found
    if ($lev <= $shortest || $shortest < 0) {
        // set the closest match, and shortest distance
        $closest  = $word;
        $shortest = $lev;
    }
}

echo "Input word: $input\n";
if ($shortest == 0) {
    echo "Exact match found: $closest\n";
} else {
    echo "Did you mean: $closest?\n";
}

// localeconv — Get numeric formatting information (PHP 4 >= 4.0.5, PHP 5, PHP 7, PHP 8)
if (false !== setlocale(LC_ALL, 'nl_NL.UTF-8@euro')) {
    $locale_info = localeconv();
    print_r($locale_info);
}

// ltrim — Strip whitespace (or other characters) from the beginning of a string (PHP 4, PHP 5, PHP 7, PHP 8)
echo(ltrim($string))."\n\n";

// md5_file — Calculates the md5 hash of a given file (PHP 4 >= 4.2.0, PHP 5, PHP 7, PHP 8)
echo md5_file('./listNode.php')."\n\n";

// md5 — Calculate the md5 hash of a string (PHP 4, PHP 5, PHP 7, PHP 8)
$str = 'apple';

if (md5($str) === '1f3870be274f6c49b3e31a0c6728957f') {
    echo "Would you like a green or red apple?\n";
}

// metaphone — Calculate the metaphone key of a string (PHP 4, PHP 5, PHP 7, PHP 8)
var_dump(metaphone('programming'));

// nl_langinfo — Query language and locale information (PHP 4 >= 4.1.0, PHP 5, PHP 7, PHP 8)
var_dump(nl_langinfo(CODESET));

// nl2br — Inserts HTML line breaks before all newlines in a string (PHP 4, PHP 5, PHP 7, PHP 8)
echo nl2br("foo isn't\n bar")."\n\n";

// number_format — Format a number with grouped thousands
echo number_format(103234321343214, 2, ".", ",")."\n\n";

// ord — Convert the first byte of a string to a value between 0 and 255 (PHP 4, PHP 5, PHP 7, PHP 8)

$str = "🐘";
for ( $pos=0; $pos < strlen($str); $pos ++ ) {
 $byte = substr($str, $pos);
 echo 'Byte ' . $pos . ' of $str has value ' . ord($byte) . "\n\n";
}

// parse_str — Parses the string into variables (PHP 4, PHP 5, PHP 7, PHP 8)
$str = "first=value&arr[]=foo+bar&arr[]=baz";

// Recommended
parse_str($str, $output);
echo $output['first']."\n\n";  // value
echo $output['arr'][0]."\n\n"; // foo bar
echo $output['arr'][1]."\n\n"; // baz

// quoted_printable_decode — Convert a quoted-printable string to an 8 bit string (PHP 4, PHP 5, PHP 7, PHP 8)
// quoted_printable_encode — Convert a 8 bit string to a quoted-printable string(PHP 5 >= 5.3.0, PHP 7, PHP 8)
$encoded = quoted_printable_encode('Möchten Sie ein paar Äpfel?');

var_dump($encoded);
var_dump(quoted_printable_decode($encoded));

// quotemeta — Quote meta characters (PHP 4, PHP 5, PHP 7, PHP 8)
var_dump(quotemeta('PHP is a popular scripting language. Fast, flexible, and pragmatic.'));

// rtrim — Strip whitespace (or other characters) from the end of a string (PHP 4, PHP 5, PHP 7, PHP 8)
echo rtrim($string)."\n\n";

// setlocale — Set locale information (PHP 4, PHP 5, PHP 7, PHP 8)


/* Set locale to Dutch */
setlocale(LC_ALL, 'nl_NL');


/* try different possible locale names for german */
$loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
echo "Preferred locale for german on this system is '$loc_de' \n";

echo setlocale(LC_ALL, 'en_US')."\n";

// sha1_file — Calculate the sha1 hash of a file (PHP 4 >= 4.3.0, PHP 5, PHP 7, PHP 8)
echo sha1_file('./listNode.php')."\n\n";

// sha1 — Calculate the sha1 hash of a string (PHP 4 >= 4.3.0, PHP 5, PHP 7, PHP 8)
echo sha1($string)."\n\n";

// similar_text — Calculate the similarity between two strings (PHP 4, PHP 5, PHP 7, PHP 8)

$sim = similar_text('bafoobar', 'barfoo', $perc);
echo "similarity: $sim ($perc %)\n";
$sim = similar_text('barfoo', 'bafoobar', $perc);
echo "similarity: $sim ($perc %)\n";

// soundex — Calculate the soundex key of a string (PHP 4, PHP 5, PHP 7, PHP 8)
// Calculates the soundex key of string.

// Soundex keys have the property that words pronounced similarly produce the same soundex key, and can thus be used to simplify searches in databases where you know the pronunciation but not the spelling.

// This particular soundex function is one described by Donald Knuth in "The Art Of Computer Programming, vol. 3: Sorting And Searching", Addison-Wesley (1973), pp. 391-392.

echo soundex($string)."\n\n";

// sprintf — Return a formatted string (PHP 4, PHP 5, PHP 7, PHP 8)
$num = 5;
$location = 'tree';

$format = 'There are %d monkeys in the %s';
echo sprintf($format, $num, $location);

// sscanf — Parses input from a string according to a format (PHP 4 >= 4.0.1, PHP 5, PHP 7, PHP 8)
// getting the serial number
list($serial) = sscanf("SN/2350001", "SN/%d");
// and the date of manufacturing
$mandate = "January 01 2000";
list($month, $day, $year) = sscanf($mandate, "%s %d %d");
echo "Item $serial was manufactured on: $year-" . substr($month, 0, 3) . "-$day\n";

// str_contains — Determine if a string contains a given substring (PHP 8) 
echo str_contains($string, 'pcc')."\n\n"; //returns true/false, needle is case sensitive

// str_ends_with — Checks if a string ends with a given substring (PHP 8)
echo str_ends_with($string, 'Here'); // returns true/false, needle is case sensitve

// str_getcsv — Parse a CSV string into an array (PHP 5 >= 5.3.0, PHP 7, PHP 8)
$yes = 'PHP,Java,Python,Kotlin,Swift';
$data = str_getcsv($yes);

var_dump($data);

// str_ireplace — Case-insensitive version of str_replace() (PHP 5, PHP 7, PHP 8)
echo str_ireplace('This', 'Yes', $string)."\n\n";

// str_pad — Pad a string to a certain length with another string (PHP 4 >= 4.0.1, PHP 5, PHP 7, PHP 8)
echo str_pad($string, 200, $yes, STR_PAD_BOTH )."\n\n";

// str_repeat — Repeat a string (PHP 4, PHP 5, PHP 7, PHP 8)
echo str_repeat($string, 2)."\n\n";

// str_replace — Replace all occurrences of the search string with the replacement string (PHP 4, PHP 5, PHP 7, PHP 8)
// Provides: <body text='black'>
$bodytag = str_replace("%body%", "black", "<body text='%body%'>");

// Provides: Hll Wrld f PHP
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
echo $onlyconsonants = str_replace($vowels, "", "Hello World of PHP")."\n\n";

// Provides: You should eat pizza, beer, and ice cream every day
$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");

echo $newphrase = str_replace($healthy, $yummy, $phrase)."\n\n";

// Provides: 2
$str = str_replace("ll", "", "good golly miss molly!", $count)."\n\n";
echo $count."\n\n";

// str_rot13 — Perform the rot13 transform on a string (PHP 4 >= 4.2.0, PHP 5, PHP 7, PHP 8)
//The ROT13 encoding simply shifts every letter by 13 places in the alphabet while leaving non-alpha characters untouched. Encoding and decoding are done by the same function, passing an encoded string as argument will return the original version.

echo str_rot13($string)."\n\n";

// str_shuffle — Randomly shuffles a string (PHP 4 >= 4.3.0, PHP 5, PHP 7, PHP 8)
echo str_shuffle($string)."\n\n";

// str_split — Convert a string to an array (PHP 5, PHP 7, PHP 8)
print_r(str_split($string));

// str_starts_with — Checks if a string starts with a given substring (PHP 8)
echo str_starts_with($string, 'This')."\n\n"; //return true or false

// str_word_count — Return information about words used in a string (PHP 4 >= 4.3.0, PHP 5, PHP 7, PHP 8)
echo str_word_count($string, 0)."\n\n";
print_r(str_word_count($string, 1))."\n\n";
print_r(str_word_count($string, 2))."\n\n";

// strcasecmp — Binary safe case-insensitive string comparison (PHP 4, PHP 5, PHP 7, PHP 8)
$var1 = "Hello";
$var2 = "hello";

if (strcasecmp($var1, $var2) == 0) {
    echo $var1.' is equal to '.$var2.' in a case-insensitive string comparison'."\n\n";
}

// strchr — Alias of strstr() (PHP 4, PHP 5, PHP 7, PHP 8)

// strcmp — Binary safe string comparison (PHP 4, PHP 5, PHP 7, PHP 8)

$var1 = "Hello";
$var2 = "hello";
if (strcmp($var1, $var2) !== 0) {
    echo '$var1 is not equal to $var2 in a case sensitive string comparison'."\n\n";
}

// strcoll — Locale based string comparison (PHP 4 >= 4.0.5, PHP 5, PHP 7, PHP 8)
// Note that this comparison is case sensitive, and unlike strcmp() this function is not binary safe.

// strcspn — Find length of initial segment not matching mask (PHP 4, PHP 5, PHP 7, PHP 8)

// string
// The string to examine.

// characters
// The string containing every disallowed character.

// offset
// The position in string to start searching.

// If offset is given and is non-negative, then strcspn() will begin examining string at the offset'th position. For instance, in the string 'abcdef', the character at position 0 is 'a', the character at position 2 is 'c', and so forth.

// If offset is given and is negative, then strcspn() will begin examining string at the offset'th position from the end of string.

// length
// The length of the segment from string to examine.

// If length is given and is non-negative, then string will be examined for length characters after the starting position.

// If length is given and is negative, then string will be examined from the starting position up to length characters from the end of string.

echo $f = strcspn('abcdhelloabcdabc', 'abcd', -9, -5)."\n\n";
echo substr('abcdhelloabcdabc', -9, -5)."\n\n";

// strip_tags — Strip HTML and PHP tags from a string (PHP 4, PHP 5, PHP 7, PHP 8)

// stripcslashes — Un-quote string quoted with addcslashes() (PHP 4, PHP 5, PHP 7, PHP 8)
echo stripcslashes('I\'d have a coffee.\nNot a problem.')."\n\n";

// stripos — Find the position of the first occurrence of a case-insensitive substring in a string (PHP 5, PHP 7, PHP 8)
echo stripos('abcdhelloabcd', 'h')."\n\n";

// stripslashes — Un-quotes a quoted string (PHP 4, PHP 5, PHP 7, PHP 8)
$str = "Is your name O\'reilly?";

// Outputs: Is your name O'reilly?
echo stripslashes($str)."\n\n";

// stristr — Case-insensitive strstr() (PHP 4, PHP 5, PHP 7, PHP 8)
$email = 'USER@EXAMPLE.com';
echo stristr($email, 'e')."\n\n"; // outputs ER@EXAMPLE.com
echo stristr($email, 'e', true)."\n\n"; // outputs US

// strlen — Get string length (PHP 4, PHP 5, PHP 7, PHP 8)
echo strlen($string)."\n\n";

// strnatcasecmp — Case insensitive string comparisons using a "natural order" algorithm (PHP 4, PHP 5, PHP 7, PHP 8)
var_dump(strnatcasecmp('Apple', 'Banana'));
var_dump(strnatcasecmp('Banana', 'Apple'));
var_dump(strnatcasecmp('apple', 'Apple'));

// strnatcmp — String comparisons using a "natural order" algorithm
$arr1 = $arr2 = array("img12.png", "img10.png", "img2.png", "img1.png");
echo "Standard string comparison\n";
usort($arr1, "strcmp");
print_r($arr1);
echo "\nNatural order string comparison\n";
usort($arr2, "strnatcmp");
print_r($arr2);

// strncasecmp — Binary safe case-insensitive string comparison of the first n characters (PHP 4 >= 4.0.2, PHP 5, PHP 7, PHP 8)

$var1 = 'Hello John';
$var2 = 'hello Doe';
if (strncasecmp($var1, $var2, 5) === 0) {
    echo 'First 5 characters of $var1 and $var2 are equals in a case-insensitive string comparison'."\n\n";
}

// strncmp — Binary safe string comparison of the first n characters (PHP 4, PHP 5, PHP 7, PHP 8)
//Returns -1 if string1 is less than string2; 1 if string1 is greater than string2, and 0 if they are equal.
$var1 = 'Hello John';
$var2 = 'Hello Doe';
if (strncmp($var1, $var2, 5) === 0) {
    echo 'First 5 characters of $var1 and $var2 are equals in a case-sensitive string comparison'."\n\n";
}

// strpbrk — Search a string for any of a set of characters (PHP 5, PHP 7, PHP 8)


$text = 'This is a Simple text.'."\n\n";

// this echoes "is is a Simple text." because 'i' is matched first
echo strpbrk($text, 'mi');

// this echoes "Simple text." because chars are case sensitive
echo strpbrk($text, 'S');

// strpos — Find the position of the first occurrence of a substring in a string (PHP 4, PHP 5, PHP 7, PHP 8)

$mystring = 'abc abc';
$findme   = 'a';
echo $pos = strpos($mystring, $findme)."\n\n";

// strrchr — Find the last occurrence of a character in a string (PHP 4, PHP 5, PHP 7, PHP 8)
$text = "Line 1\nLine 2\nLine 3";
echo strrchr($text, 10)."\n\n";

// strrev — Reverse a string (PHP 4, PHP 5, PHP 7, PHP 8)
echo strrev($string)."\n\n";

// strrpos — Find the position of the last occurrence of a substring in a string (PHP 4, PHP 5, PHP 7, PHP 8)
$foo = "0123456789a123456789b123456789c";

// Looking for '0' from the 0th byte (from the beginning)
var_dump(strrpos($foo, '0', 0));

// Looking for '0' from the 1st byte (after byte "0")
var_dump(strrpos($foo, '0', 1));

// Looking for '7' from the 21th byte (after byte 20)
var_dump(strrpos($foo, '7', 20));

// Looking for '7' from the 29th byte (after byte 28)
var_dump(strrpos($foo, '7', 28));

// Looking for '7' right to left from the 5th byte from the end
var_dump(strrpos($foo, '7', -5));

// Looking for 'c' right to left from the 2nd byte from the end
var_dump(strrpos($foo, 'c', -2));

// Looking for '9c' right to left from the 2nd byte from the end
var_dump(strrpos($foo, '9c', -2));


// strspn — Finds the length of the initial segment of a string consisting entirely of characters contained within a given mask (PHP 4, PHP 5, PHP 7, PHP 8)

// subject does not start with any characters from mask
var_dump(strspn("foo", "o"));

// examine two characters from subject starting at offset 1
var_dump(strspn("foo", "o", 1, 2));

// examine one character from subject starting at offset 1
var_dump(strspn("foo", "o", 1, 1));

// strstr — Find the first occurrence of a string (PHP 4, PHP 5, PHP 7, PHP 8)
$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain."\n\n"; // prints @example.com

$user = strstr($email, '@', true);
echo $user."\n\n"; // prints name

// strtok — Tokenize string (PHP 4, PHP 5, PHP 7, PHP 8)
$str = "This is\tan example\nstring";
/* Use tab and newline as tokenizing characters as well  */
$tok = strtok($str, " \n\t");
echo $tok."\n\n";

// strtolower — Make a string lowercase (PHP 4, PHP 5, PHP 7, PHP 8)
echo strtolower($string)."\n\n";

// strtoupper — Make a string uppercase (PHP 4, PHP 5, PHP 7, PHP 8)
echo strtoupper($string)."\n\n";

// strtr — Translate characters or replace substrings (PHP 4, PHP 5, PHP 7, PHP 8)
$trans = array("h" => "-", "hello" => "hi", "hi" => "hello");
echo strtr("hi all, I said hello", $trans)."\n\n";

// substr_compare — Binary safe comparison of two strings from an offset, up to length characters (PHP 5, PHP 7, PHP 8)
echo substr_compare("abcde", "bc", 1, 2)."\n\n"; // 0
echo substr_compare("abcde", "de", -2, 2)."\n\n"; // 0
echo substr_compare("abcde", "bcg", 1, 2)."\n\n"; // 0
echo substr_compare("abcde", "BC", 1, 2, true)."\n\n"; // 0
echo substr_compare("abcde", "bc", 1, 3)."\n\n"; // 1
echo substr_compare("abcde", "cd", 1, 2)."\n\n"; // -1


// substr_count — Count the number of substring occurrences (PHP 4, PHP 5, PHP 7, PHP 8)

$text = 'This is a test';
echo strlen($text)."\n\n"; // 14

echo substr_count($text, 'is')."\n\n"; // 2

// the string is reduced to 's is a test', so it prints 1
echo substr_count($text, 'is', 3)."\n\n";

// the text is reduced to 's i', so it prints 0
echo substr_count($text, 'is', 3, 3)."\n\n";

// generates a warning because 5+10 > 14
// echo substr_count($text, 'is', 5, 10)."\n\n";


// prints only 1, because it doesn't count overlapped substrings
$text2 = 'gcdgcdgcd';
echo substr_count($text2, 'gcdgcd')."\n\n";

// substr_replace — Replace text within a portion of a string (PHP 4, PHP 5, PHP 7, PHP 8)
$var = 'ABCDEFGH:/MNRPQR/';
echo "Original: $var<hr />\n";

/* These two examples replace all of $var with 'bob'. */
echo substr_replace($var, 'bob', 0) . "<br />\n";
echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n";

/* Insert 'bob' right at the beginning of $var. */
echo substr_replace($var, 'bob', 0, 0) . "<br />\n";

/* These next two replace 'MNRPQR' in $var with 'bob'. */
echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
echo substr_replace($var, 'bob', -7, -1) . "<br />\n";

/* Delete 'MNRPQR' from $var. */
echo substr_replace($var, '', 10, -1) . "<br />\n";

$input = array('A: XXX', 'B: XXX', 'C: XXX');

// A simple case: replace XXX in each string with YYY.
echo implode('; ', substr_replace($input, 'YYY', 3, 3))."\n";

// A more complicated case where each replacement is different.
$replace = array('AAA', 'BBB', 'CCC');
echo implode('; ', substr_replace($input, $replace, 3, 3))."\n";

// Replace a different number of characters each time.
$length = array(1, 2, 3);
echo implode('; ', substr_replace($input, $replace, 3, $length))."\n";

// substr — Return part of a string (PHP 4, PHP 5, PHP 7, PHP 8)
echo $rest = substr("abcdef", -1)."\n\n";    // returns "f"
echo $rest = substr("abcdef", -2)."\n\n";    // returns "ef"
echo $rest = substr("abcdef", -3, 1)."\n\n"; // returns "d"

// trim — Strip whitespace (or other characters) from the beginning and end of a string (PHP 4, PHP 5, PHP 7, PHP 8)
$text   = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";

$trimmed = trim($text);
var_dump($trimmed);

$trimmed = trim($text, " \t.");
var_dump($trimmed);

$trimmed = trim($hello, "Hdle");
var_dump($trimmed);

$trimmed = trim($hello, 'HdWr');
var_dump($trimmed);

// ucfirst — Make a string's first character uppercase (PHP 4, PHP 5, PHP 7, PHP 8)
echo ucfirst($string)."\n\n";

// ucwords — Uppercase the first character of each word in a string (PHP 4, PHP 5, PHP 7, PHP 8)
echo ucwords($string)."\n\n";

// utf8_decode — Converts a string from UTF-8 to ISO-8859-1, replacing invalid or unrepresentable characters (PHP 4, PHP 5, PHP 7, PHP 8)

// utf8_encode — Converts a string from ISO-8859-1 to UTF-8 (PHP 4, PHP 5, PHP 7, PHP 8)

// wordwrap — Wraps a string to a given number of characters (PHP 4 >= 4.0.2, PHP 5, PHP 7, PHP 8)
$text = "The quick brown fox jumped over the lazy dog.";
$newtext = wordwrap($text, 20, "<br />\n");

echo $newtext;