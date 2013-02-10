<?php

class ProfileController extends CController
{
	public $layout='small_window';

        public function actionIndex(){
            
            $this->redirect ('/profile/login');
            
        }

        public function actionRegister()
	{   
            $M_user = new User;
            
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
                echo CActiveForm::validate($M_user);
                Yii::app()->end();
            }
            
            if (isset($_POST['User'])){
                $M_user->attributes=$_POST['User'];
                if ($M_user->save()){
                    $this->pageTitle='Successfully registered';
                    $this->render('register_succ', array('model'=>$M_user));
                    Yii::app()->end();
                }
                
            }
            
            $this->pageTitle='Please Register';
            $this->render('register_form', array('model'=>$M_user));
	}
        
        public function actionLogin(){
            
            $model=new LoginForm;

            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }

            if(isset($_POST['LoginForm']))
            {
                    $model->attributes=$_POST['LoginForm'];
                    // validate user input and redirect to the previous page if valid
                    if($model->validate() && $model->login())
                            $this->redirect('/products');
            }
            
            if (Yii::app()->user->getId()!=NULL){
                $this->render('login_already',array('username'=>Yii::app()->user->getName()));
            }else{
                $this->pageTitle='Please Login';
                $this->render('login_form',array('model'=>$model));
            }
            
        }
        
        public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('/');
	}
}