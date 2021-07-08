<?php

/*
  -------------------------------------------------------------------
  Nombre: hashPassword
  -------------------------------------------------------------------
  Descripción:
  retorna el hash del password; utilizando la nueva función: "password_hash"
  la cual viene desde PHP 5.5 en adelante.
  También tiene: "password_verify" y "password_needs_rehash"
  -------------------------------------------------------------------
  Entradas: $password
  -------------------------------------------------------------------
  Salida: hash del password
  -------------------------------------------------------------------
 */

function hashPassword($password) {
   return password_hash($password, PASSWORD_BCRYPT, Config('AppConfig')->pass_cost);
}


/*
  -------------------------------------------------------------------
  Nombre: get_print_r
  -------------------------------------------------------------------
  Descripción:
  hace un print_r de la variable recibida, encerrandolas en
  la etiqueta: <pre></pre>, para ver el contenido del arreglo
  de forma clara; solo es para testear los contenidos.
  -------------------------------------------------------------------
  Entradas:
  $array: arreglo
  -------------------------------------------------------------------
  Salida: arreglo tabulado por las etiquetas "pre"
  -------------------------------------------------------------------
 */
function get_print_r($array = []) // utilidad para el proceso de desarrollo
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

