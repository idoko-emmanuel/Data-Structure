<?php 

namespace DataStructure;

class CreateDiArray
{
    public static function creatediarray()
    {
        $array = new SplFixedArray(10);
        for ($i = 0; $i < 10; $i++) 
            $array[$i] = new SplFixedArray(2);

        print_r($array);
    }
}

CreateDiArray::creatediarray();
?>