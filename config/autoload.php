<?php
//include all controllers
foreach ( scandir( CNT_PATH ) as $file ) {

  if ( substr( $file, 0, 2 ) !== '._' && preg_match( "/.php$/i" , $file ) ) {

      include CNT_PATH . $file;
  }
}

?>