<?php

use app\assets\IndexAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */

IndexAsset::register($this);

$this->title = 'Inicio';
?>
<div class="site-index">
    <div class="body-content">
            <br>
            <div class="jR3DCarouselGallery"></div>
    </div>
    <div id="contenido">
        <section>
          <div>
              <div class="site-index" itemscope itemtype="https://schema.org/WebApplication">
                <article>
                  <h2>Eventz</h2>
                    <p><span itemprop="description"><span itemprop="name">Eventz</span> es una <span itemprop="applicationCategory">aplicación web</span> desarrollada por<span itemprop="creator">Daniel Lorenzo Ibáñez</span>,con el objetivo de ofrecer una herramienta que facilite la gestión de eventos a los usuarios.La idea de Eventz comienza a desarrollarse en Sanlúcar de Barrameda(Cádiz) en el año <span itemprop="dateCreated">2017</span>,como proyecto integrado final del Ciclo Formativo de Grado Superior de Desarrollo de Aplicaciones Web.Se puede abrir en cualquier navegador de <span itemprop="operatingSystem">cualquier sistema operativo.</span></p>
                    <p>Dispone de las siguientes caracteristicas: </p>
                    <ul>
                        <li>Gestión de Eventos.</li>
                        <li>Paso de listado de eventos a documento PDF.</li>
                        <li>Gestión de Comentarios sobre eventos.</li>
                        <li>Calendario interactivo.Donde es posible ver los eventos y crear nuevos.</li>
                        <li>Gestión de Usuarios(Solo el administrador de la página)</li>
                    </ul>

                  </article>
                    <article>
                      <h2>Promo</h2>
                        <video controls>
                            <source src="/videos/turismo.mp4" type="video/mp4">
                        </video><br><br>
                        <p>Si dispone de alguna consulta o sugerencia, no dude en
                        ponerse en contacto con nosotros a través de la sección de
                        <span itemprop="url"><?= Html::a('Contacto', ['contact']) ?></span>


                        </p>
                    </article>
                </div>
            </div>
        </section>
      </div>
</div>
