<?php

class ProductsController extends CController
{
	public $layout='big_window';
        
        public function filters()
        {
            return array(
                'accessControl',
            );
        }

        public function accessRules()
        {
            return array(
                array('deny',
                    'actions'=>array('index', 'all', 'create', 'delete', 'edit'),
                    'users'=>array('?'),
                ),
            );
        }
        
        public function actionIndex(){
            
            $dataProvider = new CActiveDataProvider('Products', array(
                'criteria' => array(
                    'condition'=> 'owner_id='.Yii::app()->user->getId(),
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
   
        public function actionCreate(){
            
            $model=new Products;
                
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            
            if (isset($_POST['Products'])){
                
                $model->attributes=$_POST['Products'];
                $model->created_at=date('Y-m-d',time());
                $model->owner_id=Yii::app()->user->getId();
                
                if ($model->save()){
                    $this->redirect('/products');
                    Yii::app()->end();
                }
            }
            
            $this->layout='small_window';
            $this->pageTitle='Create New Product';
            $this->render('form_product',array('model'=>$model));
        }
        
        public function actionEdit(){
            $model=new Products;
            $product_error=NULL;    
            
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            
            if (isset($_POST['Products'])){
                
                $product=Products::model()->findByPk((int)$_POST['Products']['id']);
                $product->attributes=$_POST['Products'];
                if ($product->update()){
                    $this->redirect('/products');
                    Yii::app()->end();
                }
            }else{
                $product= Products::model()->findByPk((int)$_GET['pid']);
                
                /*
                 * @todo Migrate to Yii Errors engine
                 */
                
                if ($product==NULL){
                    $product_error='Product with ID='.(int)$_GET['pid'].' does not exist!';
                }
                if ($product->owner_id!=Yii::app()->user->getId()){
                    $product_error='Product with ID='.(int)$_GET['pid'].' does not belong to you!';
                }            
                if ($product_error!=NULL){
                    $this->layout='small_window';
                    $this->pageTitle='Edit Product';
                    $this->render('product_error',array('product_error'=>$product_error));
                }else{

                    $this->layout='small_window';
                    $this->pageTitle='Edit Product';
                    
                    $model->name=$product->name;
                    $model->price=  substr($product->price,1);
                    $model->quantity=$product->quantity;
                    $model->id=$product->id;
                    $this->render('form_product',array('model'=>$model));
                }
            }
            
        }
        
        public function actionDelete(){
            
            if (isset($_GET['pid'])){
                $product_error=NULL;
                $product= Products::model()->findByPk((int)$_GET['pid']);
                
                /*
                 * @todo Migrate to Yii Errors engine
                 */
                
                if ($product==NULL){
                    $product_error='Product with ID='.(int)$_GET['pid'].' does not exist!';
                }
                if ($product->owner_id!=Yii::app()->user->getId()){
                    $product_error='Product with ID='.(int)$_GET['pid'].' does not belong to you!';
                }
                
                if ($product_error!=NULL){
                    $this->layout='small_window';
                    $this->pageTitle='Delete Product';
                    $this->render('product_error',array('product_error'=>$product_error));
                }else{
                    if($product->delete()) $this->redirect ('/products');
                }
            }else{
                $this->redirect('/products');
            }
        }
}