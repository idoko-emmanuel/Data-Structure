<?php 

namespace Test\DataStructure;

class ConvertArray
{
    public function __construct()
    {
        //
    }

    protected function regtospl()
    {
        $array =[1 => 10, 2 => 100, 3 => 1000, 4 => 10000]; 
        $splArray = SplFixedArray::fromArray($array); 
        print_r($splArray);
    }

    protected function spltoreg()
    {
        $items = 5; 
        $array = new SplFixedArray($items); 
        for ($i = 0; $i < $items; $i++) { 
            $array[$i] = $i * 10; 
        } 

        $newArray = $array->toArray(); 
        print_r($newArray); 
    }

    public function printConversion()
    {
        echo "Regular to SPLFixedArray \n";
        $this->regtospl();

        echo "SPLFixedArray to Regular \n";
        $this->spltoreg();
    }
}

$convert = new ConvertArray();
$convert->printConversion();

?>