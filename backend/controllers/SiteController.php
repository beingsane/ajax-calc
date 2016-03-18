<?php
namespace backend\controllers;

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
     * Calculates arithmetical expression and sends result in JSON
     */
    public function actionCalcExpression()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSONP;

        $expression = Yii::$app->request->get('expression');
        $jsonpCallback = Yii::$app->request->get('callback');

        $calculator = new Calculator();
        try {
            $value = $calculator->calculate($expression);
            $result = [
                'data' => ['status' => 'success', 'value' => $value],
                'callback' => $jsonpCallback,
            ];
        } catch (CalculatorException $ex) {
            $result = [
                'data' => ['status' => 'error', 'message' => $ex->getMessage()],
                'callback' => $jsonpCallback,
            ];
        }

        return $result;
    }
}
