<?php 
namespace Test\DataStructure;

class ChangeSplSize
{
    public static function changesplsize()
    {
        $items = 5; 
        $array = new SplFixedArray($items); 
        for ($i = 0; $i < $items; $i++) { 
            $array[$i] = $i * 10; 
        } 

        echo "Initial size of array: ".count($array)."\n";
        print_r($array);

        $array->setSize(10); 
        echo "New size of array: ".count($array)."\n";
        $array[7] = 100;

        print_r($array);
    }
}

ChangeSplSize::changesplsize();

?>