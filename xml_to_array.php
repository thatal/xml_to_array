<?php
$file = '99acres.xml';
$file = file_get_contents($file);
$xmlArry = new SimpleXMLElement($file);
// var_dump($xmlArry->children());
// foreach ($xmlArry->children() as $key => $item) {
//     // var_dump((Array)$item);
//     var_dump($key);
//     if ($key >=100) {
//         break;
//     }
// }
$finalArray = ConvertToArray($xmlArry->children());
echo "<pre>";
print_r($finalArray);
echo "</pre>";
function ConvertToArray($items){
    $array = array();
    // var_dump($items);
    if (sizeof($items) >1) {
        foreach ($items as $index => $item) {
            $items = (Array)$items;
            if (sizeof($items) > 0) {
                $array[$index][] = ConvertToArray($item->children());
            }else{
                $array[$index] = $item;
                // var_dump($array);
            }
        }
    }else{
        if (sizeof($items) == 0) {
            foreach ($items as $key => $value) {
                $array[$key]= $value;
            }
        }else{
            $array[0] = (Array)$items;
        }
    }
    
    return (Array)$array;
    
}