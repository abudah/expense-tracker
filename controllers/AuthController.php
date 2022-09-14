<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\addExpenseForm;
use app\models\Budget;
use app\models\DistributeBudget;
use app\models\LoginForm;
use app\models\User;
use app\models\addIncomeForm;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm= new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login',[
            'model'=>$loginForm
        ]);
    }
    public function register(Request $request)
    {
        $user=new User();
        if($request->isPost()){

            $user->loadData($request->getBody());
            if($user->validate() && $user->save()){
                Application::$app->session->setFlash('success', 'thanks for registering');
                Application::$app->response->redirect('/');
                exit();
            }

            return $this->render('register',[
                'model'=>$user
            ]);

        }
        $this->setLayout('auth');
        return $this->render('register',[
            'model'=>$user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }
    public function income()
    {
        return $this->render('income');
    }
    public function expense()
    {
        return $this->render('expense');
    }
    public function addIncome(Request $request)
    {
        $income =new addIncomeForm();
        if($request->isPost()){
            $income->loadData($request->getBody());
            if($income->validate() && $income->save()){
                Application::$app->session->setFlash('success', 'thanks for saving new income');
                Application::$app->response->redirect('/');
                exit();
            }

            return $this->render('addIncome',[
                'model'=>$income
            ]);

        }

        return $this->render('addIncome',[
            'model'=>$income
        ]);
    }
    public function addExpense(Request $request)
    {
        $expense =new addExpenseForm();
        if($request->isPost()){
            $expense->loadData($request->getBody());
            if($expense->validate() && $expense->save()){
                Application::$app->session->setFlash('success', 'thanks for saving new expense');
                Application::$app->response->redirect('/');
                exit();
            }

            return $this->render('addExpense',[
                'model'=>$expense
            ]);

        }

        return $this->render('addExpense',[
            'model'=>$expense
        ]);
    }
    public function deleteoneExpense(Request $request){
        $model=new addExpenseForm();
        $data=$request->getBody();
        $id=$data['id'];
        $model->deleteOne($id);
        return Application::$app->response->redirect('/expense');
    }
    public function deleteoneIncome(Request $request){
        $model=new addIncomeForm();
        $data=$request->getBody();
        $id=$data['id'];
        $model->deleteOne($id);
        return Application::$app->response->redirect('/income');
    }
    public function blog(){
        return $this->render('blog');
    }
    public function plan(Request $request){
        $budget=new Budget();
        if($request->isPost()){

            $budget->loadData($request->getBody());
            if($budget->validate() && $budget->save()){
                Application::$app->session->setFlash('success', 'thanks for Adjusting BUdget');
                Application::$app->response->redirect('/');
                exit();
            }
            return $this->render('plan',[
                'model'=>$budget
            ]);

        }
        return $this->render('plan',[
            'model'=>$budget
        ]);
    }
    public function distribute(Request $request){
        $distribute=new DistributeBudget();
        if($request->isPost()){
            $distribute->loadData($request->getBody());
            if($distribute->check($request->getBody())&& $distribute->validate() && $distribute->save()){
                Application::$app->session->setFlash('success', 'thanks for Adjusting BUdget');
                Application::$app->response->redirect('/');
                exit();
            }
            return $this->render('distribute',[
                'model'=>$distribute
            ]);

        }
        return $this->render('distribute',[
            'model'=>$distribute
        ]);
    }
    public function admin(){
        Application::$app->controller->setLayout('mainAdmin');
        return $this->render('adminHome');
    }

}