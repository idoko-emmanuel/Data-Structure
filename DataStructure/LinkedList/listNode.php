<?php 
namespace DataStructure\LinkedList;

class listNode
{
    public $data = null;
    public $next = null;

    public function __construct(String $data = null)
    {
        $this->data = $data;
    }
}

?>