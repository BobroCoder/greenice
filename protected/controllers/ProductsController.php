<?php

class ProductsController extends CController
{
	public $layout='big_window';

        public function actionIndex(){
            
            if (Yii::app()->user->GetId()==NULL){
                $this->redirect('/profile/login');
            }
            
            $dataProvider = new CActiveDataProvider('Products', array(
                'criteria' => array(
                    'with' => array('owner'),
                ),
                'sort'=>array(
                    'defaultOrder'=>'name ASC',
                ),
                'pagination' => array(
                    'pageSize' => 12,
                ),
            ));
            
            $this->pageTitle='My products';
            $this->render('my_products',array('dataProvider'=>$dataProvider));
        }
        
        public function actionAll(){
            
            if (Yii::app()->user->GetId()==NULL){
                $this->redirect('/profile/login');
            }
            
            $dataProvider = new CActiveDataProvider('Products', array(
                'criteria' => array(
                    'with' => array('owner'),
                ),
                'pagination' => array(
                    'pageSize' => 12,
                ),
            ));
            
            $this->pageTitle='All products';
            $this->render('all_products',array('dataProvider'=>$dataProvider));
            
        }
   
}