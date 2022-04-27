<?php
$var = 1;
class Test{
    public function add()
    {global $var;
        $a = $var + 1;
        echo $a;

    }
}
