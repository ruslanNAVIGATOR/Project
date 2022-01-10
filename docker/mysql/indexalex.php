<?php
function df($string, $file = 'log.txt')
{
    $date = date('Y-m-d G:i:s');
    $fp = fopen ( $_SERVER['DOCUMENT_ROOT'] . $file, 'a+');
    $str =$date . '' . print_r($string, true). "\r\n";
    fwrite($fp, $str);
    fclose($fp);
}
if (isset($_POST)){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    df($_POST);
}


?>

<form action="indexalex.php" method="post">
    <input type="text" name="firstName">
    <input type="text" name="LastName">
    <input type="email" name="email">
    <button type="submit">Send</button>
</form>