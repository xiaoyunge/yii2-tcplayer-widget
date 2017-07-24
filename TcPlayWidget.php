<?php

namespace xutl\tcplayer;

use yii\web\View;
use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\Html;


/**
 * Class TcPlayWidget
 * @package xutl\tcplayer
 */
class TcPlayWidget extends Widget
{
    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [
        'style' => 'width:100%; height:auto;',
    ];

    /**
     * @var array
     */
    public $clientOptions = [];

    public $isInit = true;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $this->initOptions();
        $this->registerAssets();
    }

    /**
     * Initializes the widget options
     */
    protected function initOptions()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = 'video' . $this->getId();
        }
        $this->clientOptions = array_merge([
            'autoplay' => true,
            'volume' => 0.6,
            'x5_player' => true,
        ], $this->clientOptions);
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        TcPlayAsset::register($view);
        echo Html::tag('div', '', $this->options);
        if (!empty($this->clientOptions)) {
            $clientOptions = Json::encode($this->clientOptions);
            if ($this->isInit) {
                $view->registerJs("var {$this->options['id']} = new TcPlayer('{$this->options['id']}',{$clientOptions});");
            } else {
                $view->registerJs("window.tcPlayerOptions = {$clientOptions};", View::POS_END);
            }
        }
    }
}