


<?php
$connection=mysqli_connect( 'localhost' , 'bloguser' , '123456' , 'blogger');

if ($connection==false)
{
    echo "fail connection 404";
}
else
{
     echo"good connection";
}
 ?>