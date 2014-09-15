<?php
require_once '../configs/config.php';

$row = array();
$return_arr = array();
$row_array = array();

if(isset($_GET['term']))
{
    $getVar = $_GET['term'];
    $whereClause =  "WHERE CATE.DESCRICAO_CATEGORIA LIKE '%" . $getVar ."%'";
}
elseif(isset($_GET['id']))
{
    $whereClause =  "WHERE CATE.ID_CATEGORIA IN (".$_GET['id'].") ";
}
/* limit with page_limit get */

if($_GET['page_limit']){
    $limit = intval($_GET['page_limit']);
} else {
    $limit = 50;
}

$sql = "SELECT CATE.ID_CATEGORIA id, CATE.DESCRICAO_CATEGORIA text
        FROM e_CATEGORIA CATE
        ".$whereClause."
        LIMIT ".$limit."";

/** @var $result MySQLi_result */
$result = $mysqli->ExecutarSQL($sql);

    if($result->num_rows > 0)
    {

        while($row = $result->fetch_array())
        {
            $row_array['id'] = $row['id'];
            $row_array['text'] = utf8_encode($row['text']);
            array_push($return_arr,$row_array);
        }

    }

$ret = array();
/* this is the return for a single result needed by select2 for initSelection */
if(isset($_GET['id']))
{
    $ret['results'] = $return_arr;
}
/* this is the return for a multiple results needed by select2
* Your results in select2 options needs to be data.result
*/
else
{
    $ret['results'] = $return_arr;
}

echo json_encode($ret);

$mysqli->FecharBanco();
?>