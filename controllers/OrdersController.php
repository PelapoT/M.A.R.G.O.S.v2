<?php
namespace app\controllers;

use app\models\Merch;
use app\models\Orders;
use yii\filters\auth\HttpBearerAuth;
use app\controllers\FunctionController;
use yii\web\Controller;
use Yii;

class OrdersController extends FunctionController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only'=>['getm', 'access_token']
        ];
        return $behaviors;
    }

    public $modelClass = 'app\models\Orders';

    /*public function actionBuyMerch(){

        $request=Yii::$app->request->post();
        $configclient=[
            'nickname'=>$request['client_nickname'],
            'first_name'=>$request['client_first_name'],
            'last_name'=>$request['client_last_name'],
            'phone'=>$request['client_phone'],
            'email'=>$request['client_email'],
            'address'=>$request['client_address']
        ];
    }*/
    public function actionGetd($id_merch){
        $name=Merch::findOne($id_merch)->name_merch;
        $address=Yii::$app->request->post('address');
        $user_id=Yii::$app->user->identity->id;
        $orders=new Orders();
        $orders->user_id=$user_id;
        $orders->address=$address;
        $orders->merch_id=$id_merch;
        if(!$orders->validate()) return $this->validation($orders);
        $orders->save(false);
        return $this->send(200, ['content'=>['good'=>['code'=>200, 'message'=>'Ваша заявка отправлена', 'name'=>$name]]]);

    }
}