<?php
  require_once('Data.php');
  header("Content-type: image/svg+xml");
  print('<?xml version="1.0" standalone="no"?>');
  print('<?xml-stylesheet type="text/css" href="goban.css"?>')
?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<?php echo '<svg width="800" height="800" viewBox="-10 -10 '.($size*10+10).' '.($size*10+10).'" onmousemove="trackingStone(event, '.$size.');" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">' ?>
  <desc>Construction de la grille</desc>
    <defs>
      <pattern id="bg" patternUnits="userSpaceOnUse" width="100" height="100">
      <?php $grille->getBackground(); ?>
      </pattern>
      <?php $grille->getD();?>
    </defs>

    <g id="goban">
      <use  xlink:href="#traits"/>
      <g id="label">
        <?php $grille->getXLabels();?>
        <?php $grille->getYLabels();?>
      </g>
      <g id="grid" >
        <?php $grille->getDots();?>
        <?php echo '<use transform="translate('.($grille->getSize()*10-10).',0) rotate(90)" xlink:href="#traits" />' ?>
      </g>
    </g>
    <script xlink:href="Pierre.js"></script>
</svg>
