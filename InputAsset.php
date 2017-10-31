<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace syvsoft\widgets;

use yii\web\AssetBundle;

/**
 * Description of InputAsset
 *
 * @author Evgeniy
 */
class InputAsset extends AssetBundle
{
    public $sourcePath = '@app/components/assets';
    public $js = [
        'input.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
	
}
