<?php

namespace app\controllers;

use app\models\BlogCategories;
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
            'query' => BlogRecords::find()->where(['author_id' => 0]),
            'pagination' => array('pageSize' => 12),
            'sort'=> ['defaultOrder' => ['date'=>SORT_DESC]]
        ]);
        return $this->render('index', ['records' => $dataProvider, 'pagination'=>$dataProvider->pagination]);
    }

    public function actionUserblog($catid = 0, $userid = 0)
    {
        $category = [];
        $dataProvider = new ActiveDataProvider([
            'query' => BlogRecords::find()->where(['author_id' => $userid, 'category_id' => $catid]),
            'pagination' => array('pageSize' => 12),
            'sort'=> ['defaultOrder' => ['date'=>SORT_DESC]]
        ]);
        if($catid != 0){
            $category = BlogCategories::findOne(['id' => $catid]);
        }
        return $this->render('userblog', ['records' => $dataProvider, 'pagination'=>$dataProvider->pagination, 'category' => $category]);
    }

    public function actionView($userid = 0, $catid = 0, $viewid)
    {
        $category = [];
        $read = BlogRecords::findOne(['id' => $viewid]);
        if($catid != 0){
            $category = BlogCategories::findOne(['id' => $catid]);
        }
        return $this->render('view', ['record' => $read, 'userid' => $userid, 'category' => $category]);
    }

}
