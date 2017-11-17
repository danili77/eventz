<?php

use app\assets\IndexAsset;

/* @var $this yii\web\View */

IndexAsset::register($this);

$this->title = 'Eventz';
?>
<div class="site-index">
    <div class="body-content">
            <br>
            <div class="jR3DCarouselGallery"></div>
    </div>
    <div id="contenido">
        <section>
          <div>
              <article>
                <h2>Eventz</h2>
                  <p>Eventz es un proyecto desarrollado por Daniel Lorenzo Ibáñez,con el objetivo de ofrecer una herramienta que facilite la gestión de eventos a los usuarios.La idea de Eventz comienza a desarrollarse en Sanlúcar de Barrameda(Cádiz),como proyecto integrado del Ciclo Formativo de Grado Superior de Desarrollo de Aplicaciones Web.</p>
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
                      </video>
                  </article>
            </div>
        </section>
      </div>
</div>
