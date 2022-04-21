<?php
require 'ReadRegister.php';
require 'ReadCoil.php';

$register = new ReadRegister();
$register->setIp('tcp://172.25.0.3:532');

?>
<html>

</html>
