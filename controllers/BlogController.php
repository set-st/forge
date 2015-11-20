<?php

namespace app\controllers;

use app\models\BlogRecords;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class BlogController extends Controller
{
    public $layout = 'blog';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'userblog', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BlogRecords::find(['author_id' => 0]),
            'pagination' => array('pageSize' => 12),
        ]);
        return $this->render('index', ['records' => $dataProvider, 'pagination'=>$dataProvider->pagination]);
    }

    public function actionUserblog($userid = 0)
    {
        return $this->render('userblog', ['userid' => $userid]);
    }

    public function actionView($userid = 0, $id = 0, $viewid)
    {
        return $this->render('view', ['userid' => $userid, 'id' => $id, 'viewid' => $viewid]);
    }

}
