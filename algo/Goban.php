<?php
  require_once('Data.php');
  header("Content-type: image/svg+xml");
  print('<?xml version="1.0" standalone="no"?>');
  print('<?xml-stylesheet type="text/css" href="goban.css"?>')
?>
  <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
  <svg width="800" height="800" viewBox="-10 -10 230 230" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
   <desc>Construction de la grille</desc>
  <defs>
    <pattern id="bg" patternUnits="userSpaceOnUse" width="100" height="100">
    <?php $grille->getBackground(); ?>
    </pattern>
    <?php $grille->getD();?>
  </defs>

   <g id="grille">
      <use  xlink:href="#traits" />
        <?php $grille->getXLabels();?>
        <?php $grille->getYLabels();?>
        <?php $grille->getDots();?>
        <use transform="translate(200,0) rotate(90)" xlink:href="#traits" />
        <?php $p->draw(1); ?>
        <?php $p1->draw(0.5); ?>
    </g>
 </svg>
