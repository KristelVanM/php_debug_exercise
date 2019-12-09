<?php
declare(strict_types=1);


// === Exercise 1 ===
function new_exercise($x) {
    $block = "<br/><hr/><br/><br/>Exercise ". $x ." starts here:<br/>";
    echo $block;
}
new_exercise("<strong> 1 </strong>"); 

//tweede manier om exercise 1 op te lossen: 
function neww_exercise() {
    $x = "<strong> 1 2 3 </strong>";
    $block = "<br/><hr/><br/><br/>Exercise ". $x ." starts here:<br/>";
    echo $block;
}
neww_exercise(); 



new_exercise(2); 
// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];

echo "It is not this day: </br>". $monday;



new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed
$str = "Debugged ! Also very fun";
echo substr ($str, 0, 10);
echo "</br>";
echo "\"".substr ($str, 0, 10)."\"";
echo "</br>";
print_r ($str); 



new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!==> &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& "passing (arguments) by reference"

foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
}

print_r($week);


new_exercise(5);
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

//oplossing 1
/*
$arr = [];
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    array_push($arr, $letter);
    if ($letter=== "z"){
    break;
    }
}
print_r($arr); 
*/

//oplossing 2:
$arr = [];
for ($letter = 'a'; $letter !== 'aa'; $letter++) {
    array_push($arr, $letter);
}
print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array*/



new_exercise(6);
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!
$arr = [];

function combineNames($str1 = "", $str2 = "") {
    $params = [$str1, $str2];
    // toevoeging 'order' om  voornaam en achternaam op juiste plaats te krijgen
    $order = 0;
    //& toegevoegd
    foreach($params as &$param) {
        if ($param == "") {
            $param = randomHeroName($order);
        }
        $order ++;
    }
    //ik heb de twee parameters omgedraaid
    //return ipv echo gedaan
    //info: implode (glue, array)
    return implode(" - ", $params);
}


function randomGenerate($arr, $amount) {
    for ($i = $amount; $i > 0; $i--) {
        array_push($arr, randomHeroName());
    }

    return $amount;
}

function randomHeroName($order)
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    $randname = $heroes[$order][rand(0, 10)];
    //$randname = $heroes[0] [1]; //[rand(0,count($heroes))][rand(0, 10)];
    //rand generates random integer, array_rand generates random string

    return $randname;
}

echo  "Here is the name: " .combineNames();


new_exercise(7);
// removed int frm argument $year, added echo in print line
//&copy creates as output a copyright sign
function copyright($year) {
    return "&copy; $year BeCode";
}
//print the copyright
echo copyright(date('Y'));



new_exercise(8);
function login(string $email, string $password) {


    if($email == 'john@example.be' || $password == 'pocahontas') {
        return 'Welcome John Smith';
        // add Smith to first return, disable second return, has no purpose
        //return 'Smith ';
    }
    return 'No access';
}
//should great the user with his full name (John Smith) - great? greet? 
$login = login('john@example', 'pocahontas');
echo $login ."</br>";
//no access
$login = login('john@example', 'dfgidfgdfg');
echo $login;
//no access
$login = login('wrong@example', 'wrong');
echo $login;


new_exercise(9);
//problem one: no echo's, problem two: second link is (falsely) considered acceptable
function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as &$unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            //replaced ==true with !==false
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
//created $link and wrote it before each function call, added echo $link
$link = isLinkValid('http://www.google.com/hack.pdf');
echo $link;
//invalid link
$link = isLinkValid('https://google.com');
echo $link;
//VALID link
$link = isLinkValid('http://google.com');
echo $link;
//VALID link
$link = isLinkValid('http://google.com/test.txt');
echo $link;

//why are there no line breaks needed here? 



new_exercise(10);

//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code
//taken $areTheseFruits out of the for loop parameters and set first as seperate variable, then change <= into <
$array_lenght = count($areTheseFruits);
for($i=0; $i <$array_lenght ; $i++) {
    if(!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }
}
var_dump($areTheseFruits);//do not change this

//manual: If you want to run through large arrays don't use count() function in the loops , its a over head in performance,  copy the count() value into a variable and use that value in loops for a better performance.

?>