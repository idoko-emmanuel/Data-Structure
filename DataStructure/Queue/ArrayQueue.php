<?php 
namespace DataStructure\Queue;

use DataStructure\Interfaces\Queue;

class ArrayQueue implements Queue
{
    private $limit;
    private $queue;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    public function dequeue():string   
    {
        if($this->isEmpty()) {
            throw new UnderflowException('Queue is empty');
        }else {
            return array_shift($this->queue);
        }
    }

    public function enqueue(string $newitem)
    {
       if(count($this->queue) < $this->limit){
            array_push($this->queue, $newitem);
       }else {
            throw new OverflowException('Queue is full');
       }
    }

    public function peek():string
    {
        return current($this->queue);
    }

    public function isEmpty(): bool
    {
        return empty($this->queue);
    }
}