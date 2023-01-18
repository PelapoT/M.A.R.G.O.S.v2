<?php
namespace app\controllers;

use app\models\Merch;
use app\models\Service;
use yii\filters\auth\HttpBearerAuth;
use app\controllers\FunctionController;
use yii\web\Controller;
use Yii;

class ServiceController extends FunctionController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only'=>['adds', 'access_token']
        ];
        return $behaviors;
    }

    public $modelClass = 'app\models\Service';

    public function actionAdds(){

        $name_service=Yii::$app->request->post('name_service');
        $pic_service=Yii::$app->request->post('pic_service');
        $price_service=Yii::$app->request->post('price_service');
        $info_service=Yii::$app->request->post('info_service');
        $user_id=Yii::$app->user->identity->id;
        $service=new Service();
        $service->name_service=$name_service;
        $service->pic_service=$pic_service;
        $service->price_service=$price_service;
        $service->info_service=$info_service;
        if(!$service->validate()) return $this->validation($service);
        $service->save(false);
        return $this->send(200, ['content'=>['good'=>['code'=>200, 'message'=>'Услуга успешно добавлена в каталог!']]]);

    }
    public function actionWatchservices(){
        $services=Service::find()->all();
        $this->send(200, ['data'=>$services]);

    }

    public function actionDltservice($id_services){
        $model = Service::find()->where(['id'=>$id_services])->one();

        if (!$model) {
            return $this->send(404, "Услуга не найдена!");
        }
        $model->delete();
        return $this->send(200, "Услуга успешно удалена из каталога!");
    }

    public function actionRedService(){

    }
}