<?php
namespace app\controllers;

use app\models\Merch;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
use app\controllers\FunctionController;
use Yii;

class MerchController extends FunctionController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only'=>['add', 'access_token']
        ];
        return $behaviors;
    }

    public $modelClass = 'app\models\Merch';

    public function actionAdd(){

        $name_merch=Yii::$app->request->post('name_merch');
        $pic_merch=Yii::$app->request->post('pic_merch');
        $price_merch=Yii::$app->request->post('price_merch');
        $info_merch=Yii::$app->request->post('info_merch');
        $user_id=Yii::$app->user->identity->id;
        $merch=new Merch();
        $merch->name_merch=$name_merch;
        $merch->pic_merch=$pic_merch;
        $merch->price_merch=$price_merch;
        $merch->info_merch=$info_merch;
        if(!$merch->validate()) return $this->validation($merch);
        $merch->save(false);
        return $this->send(200, ['content'=>['good'=>['code'=>200, 'message'=>'Товар успешно добавлен в каталог!']]]);

    }
    public function actionWatchmerch(){
    $merches=Merch::find()->all();
    $this->send(200, ['data'=>$merches]);

}

    public function actionDltmerch($id_merch){

        $model =Merch::find()->where(['id'=>$id_merch])->one();

        if (!$model) {
            return $this->send(404, "Товар не найден!");
        }
        $model->delete();
        return $this->send(200, "Товар успешно удалён из каталога!");

    }

    public function actionRedMerch(){

    }
}