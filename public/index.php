<?php
use app\core\Application;
use  app\controllers\SiteController;
use app\controllers\AuthController;



require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config=[
    'userClass'=>\app\models\User::class,
    'db'=>[
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD'],
    ]
];
$app=new Application(dirname(__DIR__),$config);

$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->post('/contact',[SiteController::class,'contact']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);
$app->router->get('/logout',[AuthController::class,'logout']);
$app->router->get('/profile',[AuthController::class,'profile']);


$app->router->get('/income',[AuthController::class,'income']);
$app->router->get('/expense',[AuthController::class,'expense']);

$app->router->post('/addIncome',[AuthController::class,'addIncome']);
$app->router->get('/addIncome',[AuthController::class,'addIncome']);

$app->router->post('/addExpense',[AuthController::class,'addExpense']);
$app->router->get('/addExpense',[AuthController::class,'addExpense']);

$app->router->post('/expense',[AuthController::class,'deleteoneExpense']);
$app->router->post('/income',[AuthController::class,'deleteoneIncome']);

$app->router->get('/blog',[AuthController::class,'blog']);
$app->router->get('/plan',[AuthController::class,'plan']);
$app->router->post('/plan',[AuthController::class,'plan']);

$app->router->get('/distribute',[AuthController::class,'distribute']);
$app->router->post('/distribute',[AuthController::class,'distribute']);

$app->router->get('/admin',[AuthController::class,'admin']);

$app->run();