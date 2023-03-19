<?php 

function printstring() {
    $arr = ["B\$u\$i\$ld", "\$t\$\$h\$e", "N\$e\$x\$t", "E\$\$ra", "\$\$o\$f\$", "S\$\$of\$t\$wa\$r\$e", "De\$\$ve\$l\$op\$me\$n\$t"];

    $str = strtoupper(implode(" ", str_replace('$','',$arr)));

    print_r($str);
}

printstring();