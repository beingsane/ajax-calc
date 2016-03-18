<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <label>Выражение</label>
    <input type="text" id="expression" class="form-control"/>
    <div id="expression-result"></div>

    <br>

    <button type="button" class="btn btn-success btn-calc-expression" data-action-url="<?= Url::to('http://api.ajax-calc.local/site/calc-expression') ?>">Отправить</button>
</div>
