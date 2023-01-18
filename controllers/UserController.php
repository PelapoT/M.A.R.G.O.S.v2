<?php

namespace app\controllers;
use app\models\LoginForm;
use app\models\User;
use yii\filters\auth\HttpBearerAuth;
use app\controllers\FunctionController;
use yii\web\Controller;
use Yii;

class UserController extends FunctionController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only'=>['id', 'nickname', 'first_name', 'last_name', 'phone', 'document_number', 'password', 'is_admin', 'access_token']
        ];
        return $behaviors;
    }

    public $modelClass = 'app\models\User';

    public function actionAuto(){

        $password=Yii::$app->request->post('password');
        $nickname=Yii::$app->request->post('nickname');
        $login_data=new LoginForm();
        $login_data->load($password);
        $user=User::find()->where(['nickname'=>$login_data->nickname=$nickname])->one();
        if (!is_null($user)) {
            if ($user->password==$password) {
                $user->access_token=Yii::$app->getSecurity()->generateRandomString();
                return $this->send(200, ['content'=>['token'=>$user->access_token]]);
            }
}
        return $this->send(401, ['error'=>['code'=>401, 'message'=>'Unauthorized',
            'errors'=>['authorization'=>'Неверный логин или пароль']]]);
    }

    public function actionReg(){
        $nickname=Yii::$app->request->post('nickname');
        $first_name=Yii::$app->request->post('first_name');
        $last_name=Yii::$app->request->post('last_name');
        $phone=Yii::$app->request->post('phone');
        $document_number=Yii::$app->request->post('document_number');
        $password=Yii::$app->request->post('password');
        $is_admin=Yii::$app->request->post('is_admin');
        $access_token=Yii::$app->request->post('access_token');
        $user=new User();
        $user->nickname=$nickname;
        $user->first_name=$first_name;
        $user->last_name=$last_name;
        $user->phone=$phone;
        $user->document_number=$document_number;
        $user->password=$password;
        $user->is_admin=$is_admin;
        $user->access_token=$access_token;
        if(!$user->validate()) return $this->validation($user);
        $user->save(false);
        return $this->send(200, ['content'=>['good'=>['code'=>200, 'message'=>'Вы упешно зарегистрировались!']]]);

    }
}