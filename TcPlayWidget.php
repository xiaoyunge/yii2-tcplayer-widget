<?php

namespace xutl\tcplay;

use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

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

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        if (!isset ($this->clientOptions['source'])) {
            throw new InvalidConfigException ('The "clientOptions[source]" property must be set.');
        }
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
        TcPlayWidget::register($view);
        echo Html::tag('div', '', $this->options);
        if (!empty($this->clientOptions)) {
            $clientOptions = Json::encode($this->clientOptions);
            $view->registerJs("var {$this->options['id']} = new TcPlayer('{$this->options['id']}',{$clientOptions});");
        }
    }
}