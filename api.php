<?php

/* This is a bare, extremely simplified API. Ideally, this data set would be coming from a database.  For this assignment hard
coding the values is fine. There are two methods in this file: get_puppy_by_id and get_puppy_list. You need both of them for
the assignment. Study how the API decides which method to call at the bottom of the page. As a reminder, this page does 
not need to be modified for the assignment to work.

HINT: Notice the last line of the file. How should you deal with a json_encode? 
*/


function puppies() 
{
return array(
array("id" => 0, "name" => "Max", "breed" => "Bulldog", "age" => "4 weeks", "color" => "Black", "sex" => "Male"), 
array("id" => 1, "name" => "Buddy", "breed" => "Beagle", "age" => "2 months", "color" => "White", "sex" => "Male"), 
array("id" => 2, "name" => "Jake", "breed" => "German Shepherd", "age" => "8 months", "color" => "Brown", "sex" => "Male"), 
array("id" => 3, "name" => "Molly", "breed" => "Chihuahua", "age" => "2 years", "color" => "Auburn", "sex" => "Female"), 
array("id" => 4, "name" => "Bella", "breed" => "Labrador Retriever", "age" => "4 months", "color" => "Black", "sex" => "Female"), 
array("id" => 5, "name" => "Lucy", "breed" => "Pug", "age" => "2.5 months", "color" => "Black and White", "sex" => "Female"), 
array("id" => 6, "name" => "Bailey", "breed" => "Yorkshire Terrier", "age" =>"4 weeks", "color" => "Gray", "sex" => "Male"), 
array("id" => 7, "name" => "Rocky", "breed" => "Dachshund", "age" => "10 months", "color" => "Dark Gray", "sex" => "Male"), 
array("id" => 8, "name" => "Charlie", "breed" => "Pit Bull", "age" => "5 years", "color" => "Black", "sex" => "Male"), 
array("id" => 9, "name" => "Maggie", "breed" => "Shih Tzu", "age" => "1 year", "color" => "Black", "sex" => "Female"), 
array("id" => 10, "name" => "Daisy", "breed" => "Great Dane", "age" => "1.3 years", "color" => "Brown", "sex" => "Female"), 
array("id" => 11, "name" => "Sadie", "breed" => "Chow Chow", "age" => "2.2 years", "color" => "Light Brown", "sex" => "Female"), 
array("id" => 12, "name" => "Jack", "breed" => "St. Bernard", "age" => "11 months", "color" => "Black", "sex" => "Male"), 
array("id" => 13, "name" => "Chloe", "breed" => "Dalmation", "age" => "3 years", "color" => "Black and White", "sex" => "Female"), 
array("id" => 14, "name" => "Zoe", "breed" => "Labradoodle", "age" => "3.6 years", "color" => "Brown", "sex" => "Female") 
);
}

function get_puppy_by_id($id)
{
$puppy_info = puppies();

foreach ($puppy_info as $puppy) {
if ($puppy["id"] == $id) {
return $puppy;
}
}

return "Not a proper id";
}

function get_puppy_list()
{
$puppy_info = puppies();

return $puppy_info;
}

$possible_url = array("get_puppy_list", "get_puppy");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
switch ($_GET["action"])
{
case "get_puppy_list":
$value = get_puppy_list();
break;
case "get_puppy":
if (isset($_GET["id"]))
$value = get_puppy_by_id($_GET["id"]);
else
$value = "Missing argument";
break;
}
}

exit(json_encode($value));
?>
