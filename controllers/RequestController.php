<?php
namespace app\controllers;
use app\models\Request;
use app\models\Service;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
use app\controllers\FunctionController;
use Yii;

class RequestController extends FunctionController

{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only'=>['get', 'access_token']
        ];
        return $behaviors;
    }

    public $modelClass = 'app\models\Request';

    public function actionConnect(){

        $email=Yii::$app->request->post('email');
        $user_id=Yii::$app->user->identity->id;
        $request=new Request();
        $request->user_id=$user_id;
        $request->email=$email;
        if(!$request->validate()) return $this->validation($request);
        $request->save(false);
        return $this->send(200, ['content'=>['good'=>['code'=>200, 'message'=>'Обращение принято в обработку!', 'ans_date'=>date('l jS \of F Y h:i:s A')]]]);

    }

    public function actionGet($id_services){
        $name=Service::findOne($id_services)->name_service;
       $email=Yii::$app->request->post('email');
       $user_id=Yii::$app->user->identity->id;
       $request=new Request();
       $request->user_id=$user_id;
       $request->email=$email;
       $request->servise_id=$id_services;
       if(!$request->validate()) return $this->validation($request);
       $request->save(false);
       return $this->send(200, ['content'=>['good'=>['code'=>200, 'message'=>'Ваша заявка отправлена', 'name'=>$name, 'ans_date'=>date('l jS \of F Y h:i:s A')]]]);

    }
}