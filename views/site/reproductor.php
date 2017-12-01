<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\assets\ReproductorAsset;

$this->title = 'Reproductor de música';

ReproductorAsset::register($this);
?>
  <div class="example">

      <div class="playlist">
          <div data-cover="/js/player/data/Alan-Walker-Faded.jpg" data-artist="Alan Walker"><a href="/js/player/data/Alan Walker - Faded.mp3">Faded</a></div>
          <div data-cover="/js/player/data/tilthesun.jpeg" data-artist="Bob Sinclair feat. Akon">
              <a href="/js/player/data/Bob Sinclar feat. Akon - Til The Sun Rise Up.mp3">Til the sun rise up</a>
          </div>
          <div data-cover="/js/player/data/mzrin.jpg" data-artist="MZRIN"><a href="/js/player/data/MZRIN - Going Under.mp3">Going Under</a></div>
      </div>

  </div>
