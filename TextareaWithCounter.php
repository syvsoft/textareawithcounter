<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace syvsoft\widgets;

use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Description of InputWithLengthCounterWidget
 *
 * @author Evgeniy
 */
class TextareaWithCounter extends InputWidget
{
    public $maxLength = 160;
    public $template = '{input}{counter}';
    public $counterTemplate = '{length} / {max}';
    public $counterHtmlOptions = array();
    public $cutMessageOnMaxLength = false;
    public $counterTag = 'span';
    public $scriptUrl;
	
    public function run()
    {
        if (!isset($this->counterHtmlOptions['id'])) {
            $this->counterHtmlOptions['id'] = $this->id.'-counter';
        }
        $this->registerClientScript();
        $input = $this->getInput();
        $counter = $this->getCounter();
        $output = strtr($this->template,array(
            '{input}' => $input,
            '{counter}' => $counter,
        ));
        echo $output;
    }
    
    protected function registerClientScript()
    {
        $options = array(
            'counterId' => $this->counterHtmlOptions['id'],
            'counterTemplate' => $this->counterTemplate,
            'maxLength' => $this->maxLength,
            'cutMessage'=>$this->cutMessageOnMaxLength
        );
		$id = $this->id;
        $options = Json::htmlEncode($options);
        $view = $this->getView();
		InputAsset::register($view);
        $view->registerJs("jQuery('#$id').smsinput($options);");
    }
	
    
    protected function getInput()
    {
        if ($this->hasModel()) {
            $input = Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::textarea($this->name, $this->value, $this->options);
        }		
		return $input;
    }


    protected function getCounter()
    {
		return Html::tag($this->counterTag, '', $this->counterHtmlOptions);
	}
}
