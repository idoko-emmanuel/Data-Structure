<?php 

class Memory
{

    private $startMemory, $endMemory;

    protected function printMemoryUsage()
    {
        echo ($this->endMemory - $this->startMemory)." bytes \n";
        $memoryConsumed = ($this->endMemory - $this->startMemory) / (1024*1024); 
        $memoryConsumed = ceil($memoryConsumed); 
        echo "memory = {$memoryConsumed} MB\n";
    }

    protected function regularArray()
    {
        $this->startMemory = memory_get_usage();
        $array = range(1,100000);
        $this->endMemory = memory_get_usage();

        $this->printMemoryUsage();
        
    }

    protected function splfixedArray()
    {
        $items = 100000; 
        $this->startMemory = memory_get_usage(); 
        $array = new SplFixedArray($items); 
        for ($i = 0; $i < $items; $i++) { 
            $array[$i] = $i; 
        } 
        $this->endMemory = memory_get_usage(); 

        $this->printMemoryUsage();

    }

    public function compareBothArray(){
        echo "Memory of regular array \n";
        $this->regularArray();

        echo "VS Memoery of SPLFixedArray \n";
        $this->splfixedArray();
    }
    
}

$memory = new Memory();

$memory->compareBothArray();

?>