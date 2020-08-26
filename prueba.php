<?php
$productos = [];
$array = array(
    0=> array(
        'id_producto'=> '0',
        'nombre_producto'=> 'BOTAS DE LLUVIA MARRONES',
        'precio_producto'=> 3500
    ),
    1=> array(
        'id_producto'=> '1',
        'nombre_producto'=> 'BOTAS DE LLUVIA NEGRAS',
        'precio_producto'=> 3000
    ),
    2=> array(
        'id_producto'=> '2',
        'nombre_producto'=> 'PANTUBOTAS MARRONES',
        'precio_producto'=> 2500

    ),
    3=> array(
        'id_producto'=> '3',
        'nombre_producto'=> 'PANTUBOTAS NEGRAS',
        'precio_producto'=> 3200
    ),
    4=> array(
        'id_producto'=> '4',
        'nombre_producto'=> 'ZAPATILLAS URBANAS',
        'precio_producto'=> 3700
    )
);
echo 'Array principal desordenado: <br><br>';
for($i=0;$i<count($array);$i++){
    echo $array[$i]['nombre_producto'];
    echo '<br>';
}

echo '-----------------<br>';
echo '-----------------<br>';
echo '-----------------<br>';
echo '<br>';
echo 'Array principal ordenado de A - Z(ascendentemente): <br><br>';

function array_sort_by(&$arrIni, $col, $order = SORT_ASC)
{
    $arrAux = array();
    foreach ($arrIni as $key=> $row)
    {
        $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
        $arrAux[$key] = strtolower($arrAux[$key]);
    }
    array_multisort($arrAux, $order, $arrIni);
}
array_sort_by($array,'nombre_producto',$order = SORT_ASC);
for($i=0;$i<count($array);$i++){
    echo $array[$i]['nombre_producto'];
    echo '<br>';
}

echo '-----------------<br>';
echo '-----------------<br>';
echo '-----------------<br>';
echo '<br>';
echo 'Array principal ordenado de Z - A(descendentemente): <br><br>';
function array_sort_bye(&$arrIni, $col, $order = SORT_DESC)
{
    $arrAux = array();
    foreach ($arrIni as $key=> $row)
    {
        $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
        $arrAux[$key] = strtolower($arrAux[$key]);
    }
    array_multisort($arrAux, $order, $arrIni);
}
array_sort_bye($array,'nombre_producto',$order = SORT_DESC);
for($i=0;$i<count($array);$i++){
    echo $array[$i]['nombre_producto'];
    echo '<br>';
}

echo '-----------------<br>';
echo '-----------------<br>';
echo '-----------------<br>';
echo '<br>';
echo 'Array principal ordenado por su precio(mas barato a mas caro): <br><br>';

function array_sort_price(&$arrIni, $col, $order = SORT_NUMERIC)
{
    $arrAux = array();
    foreach ($arrIni as $key=> $row)
    {
        $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
        $arrAux[$key] = strtolower($arrAux[$key]);
    }
    array_multisort($arrAux, $order, $arrIni);
}
array_sort_price($array,'precio_producto',$order = SORT_NUMERIC);
for($i=0;$i<count($array);$i++){
    echo $array[$i]['precio_producto'];
    echo '<br>';
}

echo '-----------------<br>';
echo '-----------------<br>';
echo '-----------------<br>';
echo '<br>';
echo 'Array principal ordenado por su precio(mas caro a mas barato): <br><br>';

function storey_sort($building_a, $building_b) {
    return $building_b["precio_producto"] - $building_a["precio_producto"];
}
 
usort($array, "storey_sort");
for($i=0;$i<count($array);$i++){
    echo $array[$i]['precio_producto'];
    echo '<br>';
}

//SORT_NUMERIC

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
</head>

<body>

</body>

</html>