
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";
session_start();



//use User;

//$paths = array("src/Entity","toto");
$isDevMode = true;
$proxyDir=null;
$cache=null;


$class = "Controllers\\" . (isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'IndexController');
$target = isset($_GET['t']) ? $_GET['t'] : "index";
$getParams = isset($_GET['c']) ? $_GET['c'] : null;
$postParams = isset($_POST) ? $_POST : null;

$params = array(array(
    "url"=>"http://195.154.118.169/pter/backend/bootstrap.php",
    "message"=>(isset($_GET["message"])?$_GET['message']:""),
    "get"=>$getParams,
    "post"=>$postParams
    //"em"=>$entityManager
));
//$class=new $classStr;
if ($class == "Controllers\IndexController" && in_array($target, get_class_methods($class))) // si c = index et qu'on a un t = methode existante de c
{ 
    $class = new Controllers\IndexController; // c = index
    call_user_func_array([$class, $target], $params); // c = index et t = la methode existante
} else 
{ // dans tout les autres cas ou c != index et t n'existe pas alors
    $class = new $class; // c = index 
    call_user_func_array([$class, $target],$params); 
} 
