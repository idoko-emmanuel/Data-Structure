<?php 
namespace DataStructure\Examples;

class ExpressionChecker 
{
    private $valid;
    private $stack;

    public function __construct()
    {
        $this->valid = true;
        $this->stack = new \SplStack();
    }

    public function expressionChecker(string $expression): bool 
    { 
    
        for ($i = 0; $i < strlen($expression); $i++) 
        { 
            $char = substr($expression, $i, 1); 
        
            switch ($char) 
            { 
                case '(': 
                case '{': 
                case '[': 
                    $this->stack->push($char); 
                    break; 
            
                case ')': 
                case '}': 
                case ']': 
                    if ($this->stack->isEmpty()) 
                    { 
                        $this->valid = FALSE; 
                    } else 
                    { 
                        $last = $this->stack->pop(); 

                        if (($char == ")" && $last != "(")  
                        || ($char == "}" && $last != "{")  
                        || ($char == "]" && $last != "["))
                        { 
                
                            $this->valid = FALSE; 
                        } 
                    } 
                    break; 
        } 
    
       if (!$this->valid) 
          break; 
       } 
    
       if (!$this->stack->isEmpty()) { 
            $this->valid = FALSE; 
       } 
    
       return $this->valid; 
    }
    
}

$expressions = []; 
$expressions[] = "8 * (9 -2) + { (4 * 5) / ( 2 * 2) }"; 
$expressions[] = "5 * 8 * 9 / ( 3 * 2 ) )"; 
$expressions[] = "[{ (2 * 7) + ( 15 - 3) ]"; 

foreach ($expressions as $expression) { 
    $valid = new ExpressionChecker();
    $valid = $valid->expressionChecker($expression); 

    if ($valid) { 
    echo "Expression is valid \n"; 
    } else { 
    echo "Expression is not valid \n"; 
    } 
} 
