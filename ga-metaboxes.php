<?php

/*
Plugin Name: Gourmet Artist MetaBoxes
Plugin URI:
Description: Agrega MetaBoxes al sitio Gourmet Artist
Version: 1.0
Author: Edison Perdomo
Author URI:
License: GLP2
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function ga_agregar_metaboxes() {
  //string id, string Titulo, callback, pantalla, context (normal, side o advanced), prioridad, data callback
  add_meta_box("ga-metaboxes", "Nuestro Metabox", "ga_diseno_metaboxes", "recetas", "normal", "high", null);
}

add_action("add_meta_boxes", "ga_agregar_metaboxes");


function ga_diseno_metaboxes($post) {
  //accion, nombre
  wp_nonce_field(basename(__FILE__), "meta-box-nonce");
  ?>
 <div>
       <label for="input-metabox">Calorias:</label>
       <input name="input-metabox" type="text" value=<?php echo get_post_meta($post->ID, "input-metabox", true); ?>">
       <br/>

         <label for="textarea-metabox">Subtitulo del Post:</label>
         <textarea name="textarea-metabox" <?php echo get_post_meta($post->ID, "textarea-metabox", true); ?> 
        </textarea>
         <br>

         <label for="dropdown-metabox">Calificación:</label>
         <select name="dropdown-metabox">
             <?php
                 $opciones = array(1, 2, 3, 4, 5);
                 foreach($opciones as $llave => $valor) {
                     if($valor == get_post_meta($post->ID, "dropdown-metabox", true)) { ?>
                             <option selected><?php echo $valor; ?></option>
                    <?php } else { ?>
                             <option><?php echo $valor; ?></option>
                    <?php  }
                 } //fin foreach
             ?>
         </select>
         <br>
     </div>
  <?php
}