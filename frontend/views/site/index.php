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

    <div class="pull-left">
        <button type="button" class="btn btn-success btn-calc-expression"
            data-action-url="<?= Url::to('site/calc-expression') ?>"
            data-api-action-url="<?= Url::to('http://api.ajax-calc.local/site/calc-expression') ?>"
        >Отправить</button>
    </div>

    <div class="pull-left">
        &nbsp;&nbsp;
        Вариант задачи:

        <select id="task-variant">
            <option value="simple">Простой вариант</option>
            <option value="complicated">Усложненный вариант</option>
        </select>
    </div>
</div>
