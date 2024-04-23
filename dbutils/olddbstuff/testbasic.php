<?php

print_r($_SERVER['DOCUMENT_ROOT']);

$finalfilepath = 'C:\xampp\htdocs\storage\testuser400\Ocelot.png';

$storedFilePath = str_replace('\\', '/', $finalfilepath);

echo $storedFilePath;



$ocelot = str_replace('\\', '/', '\storage\testuser400\Ocelot.png');

?>

<div>
    <img src=<?php echo $ocelot; ?> alt="Researcher Image" />
</div>

<div>
    <img src=<?php echo $_SERVER['DOCUMENT_ROOT'] . '/real_group_project/images/cloud.jpg'; ?> alt="cloud Image" />
</div>

