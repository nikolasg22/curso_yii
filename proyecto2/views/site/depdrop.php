<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

use kartik\widgets\DepDrop;
 
// Parent 
echo $form->field($model, 'cat')->dropDownList($catList, ['id'=>'cat-id']);
 
// Child # 1
echo $form->field($model, 'subcat')->widget(DepDrop::classname(), [
    'options'=>['id'=>'subcat-id'],
    'pluginOptions'=>[
        'depends'=>['cat-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/site/subcat'])
    ]
]);
 
// Child # 2
echo $form->field($model, 'prod')->widget(DepDrop::classname(), [
    'pluginOptions'=>[
        'depends'=>['cat-id', 'subcat-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/site/prod'])
    ]
]);

?>