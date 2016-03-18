<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\components\calculator\Calculator;
use common\components\calculator\CalculatorException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'calc-expression' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Calculates arithmetical expression and sends result in JSON
     */
    public function actionCalcExpression()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $expression = Yii::$app->request->get('expression');
        $calculator = new Calculator();
        try {
            $value = $calculator->calculate($expression);
            $result = ['status' => 'success', 'value' => $value];
        } catch (CalculatorException $ex) {
            $result = ['status' => 'error', 'message' => $ex->getMessage()];
        }

        return $result;
    }
}
