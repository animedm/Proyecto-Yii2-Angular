<?php

namespace backend\controllers;

use app\models\Address;
use app\models\Client;
use app\models\Profile;
use Yii;


class MntController extends \yii\rest\Controller
{

    public $lastInsert = null;

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class'   => \yii\filters\ContentNegotiator::className(),
                'formats' => [
                    'application/json' => yii\web\Response::FORMAT_JSON,
                ],
                
            ],
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => null,
                    'Access-Control-Max-Age' => 86400,
                ],
            ],
        ];
    }



    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function actionClient($id = null)
    {

        $clientModel = new Client();
        $request = Yii::$app->request;
        $body = $request->getBodyParams();
        $clientModel->setAttributes($body);
        $clientId = $request->getBodyParam('id');

        //GET

        if ($request->isGet) {
            if ($id == null) {
                $client = Yii::$app->db->createCommand('SELECT * FROM client')
                    ->queryAll();
                return $client;
            } else {
                $client = Yii::$app->db->createCommand('SELECT * FROM `client` WHERE id=' . $id)
                    ->queryOne();
                return $client;
            }
        }

        //DELETE
        if ($request->isDelete) {
            if ($id != null) {
                Yii::$app->db->createCommand()->delete('client', 'id=' . $id)->execute();
                return true;
            } else {
                return '406 Not Acceptable: Please be sure id is given.';
            }
        }



        //PUT
        if ($request->isPut) {

            if ($clientId != null) {

                Yii::$app->db->createCommand()->update('client', ['name' => $clientModel->name, 'age' => $clientModel->age], 'id =' . $clientId)->execute();
                return true;
            } else {

                return '406 Not Acceptable: Please be sure request body id is not null.';
            }
        }
        //POST

        if ($request->isPost) {

            if ($clientId == null) {
                $clientModel->save();
                return ['id' => $clientModel->id];
            } else {
                return '406 Not Acceptable: Please be sure request body id is null to add new register.';
            }
        }
    }

    public function actionProfile($id = null)
    {
        $profileModel = new Profile();
        $request = Yii::$app->request;
        $body = $request->getBodyParams();
        $profileModel->setAttributes($body);
        $profileId = $request->getBodyParam('id');


        //GET
        if ($request->isGet) {
            if ($id == null) {
                $profile = Yii::$app->db->createCommand('SELECT * FROM `profile`')
                    ->queryAll();
                return $profile;
            } else {
                $profile = Yii::$app->db->createCommand('SELECT * FROM `profile` WHERE id=' . $id)
                    ->queryOne();
                return $profile;
            }
        }

        //DELETE
        if ($request->isDelete) {
            if ($id != null) {
                Yii::$app->db->createCommand()->delete('profile', 'id=' . $id)->execute();
                return true;
            } else {
                return '406 Not Acceptable: Please be sure id is given.';
            }
        }
        //PUT

        if ($request->isPut) {
            
            if ($profileId != null) {
                Yii::$app->db->createCommand()->update('profile', ['career' => $profileModel->career, 'language' => $profileModel->language, 'nationality' => $profileModel->nationality], 'id =' . $profileId)->execute();
                return true;
            } else {

                return '406 Not Acceptable: Please be sure request body id is not null.';
            }
        }
        //POST

        if ($request->isPost) {

            if ($profileId == null) {
                $profileModel->save();
                return ['id' => $profileModel->id];
            } else {
                return '406 Not Acceptable: Please be sure request body id is null to add new register.';
            }
        }
    }

    public function actionAddress($id = null)
    {

        $addressModel = new Address();
        $request = Yii::$app->request;
        $body = $request->getBodyParams();
        $addressModel->setAttributes($body);
        $addressId = $request->getBodyParam('id');

        //GET

        if ($request->isGet) {
            if ($id == null) {
                $address = Yii::$app->db->createCommand('SELECT * FROM `address`')
                    ->queryAll();
                return $address;
            } else {
                $address = Yii::$app->db->createCommand('SELECT * FROM `address` WHERE id=' . $id)
                    ->queryOne();
                return $address;
            }
        }

        //DELETE

        if ($request->isDelete) {
            if ($id != null) {
                Yii::$app->db->createCommand()->delete('address', 'id=' . $id)->execute();
                return true;
            } else {
                return '406 Not Acceptable: Please be sure id is given.';
            }
        }



        //PUT

        if ($request->isPut) {

            if ($addressId != null) {
                Yii::$app->db->createCommand()->update('address', ['street' => $addressModel->street, 'no_apartment' => $addressModel->no_apartment, 'city' => $addressModel->city], 'id =' . $addressId)->execute();
                return true;
            } else {

                return '406 Not Acceptable: Please be sure request body id is not null.';
            }
        }

        //POST

        if ($request->isPost) {

            if ($addressId == null) {
                $addressModel->save();
                return ['id' => $addressModel->id];
            } else {
                return '406 Not Acceptable: Please be sure request body id is null to add new register.';
            }
        }
    }
}
