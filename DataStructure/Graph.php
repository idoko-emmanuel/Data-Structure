<?php 
namespace DataStructure;

class Graph
{
    public $graph = [];

    public function __construct()
    {
        //
    }

    // node names 
    private $nodes = ['A', 'B', 'C', 'D', 'E'];

    // first, create an array for graph an initialize each node of the two dimensional array as zero 
    protected function initializeDiArray() {
        
        foreach($this->nodes as $Xnode) {
            foreach($this->nodes as $Ynode) {
                $this->graph[$Xnode][$Ynode] = 0;
            }
        }
    }

    //we will define connectivity of nodes such that a connection between the two nodes will be expressed as a value of 1

    protected function connectivityofNodes() {
        $this->graph['A']['B'] = 1;
        $this->graph['B']['A'] = 1;
        $this->graph['A']['C'] = 1;
        $this->graph['C']['A'] = 1;
        $this->graph['A']['E'] = 1;
        $this->graph['E']['A'] = 1;
        $this->graph['B']['D'] = 1;
        $this->graph['D']['B'] = 1;
        $this->graph['B']['E'] = 1;
        $this->graph['E']['B'] = 1;
    }

    // we will print the array to see how it looks before defining the conectivity between nodes
    public function printMultiDiArray($connect = false) {
        $this->initializeDiArray();

        if($connect)
            $this->connectivityofNodes();

        foreach($this->nodes as $Xnode) {
            foreach($this->nodes as $Ynode) {
                printf("%s\t", $this->graph[$Xnode][$Ynode]);
            }
        
            printf("\n");
        }
    }

}

$graph = new Graph();

//$graph->printMultiDiArray();



$graph->printMultiDiArray(true);


?>