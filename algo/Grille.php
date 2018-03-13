<?php

class Grille
{
  private $d;
  private $dots;
  private $background;
  private $x_label;
  private $y_label;
  private $tab;

  function __construct($size, $x, $y)
  {

    $this->x_label = "";
    $this->y_label = "";
    $this->background = '<image xlink:href="wood.jpg" x="0" y="0" width="100" height="100"/>';
    $this->initEdges($size);
    $this->initLabels($size, $x, $y);
  }
  function initEdges($size)
  {
    $s1 = "M ";
    $s2 = " 0 v 200 ";
    $var = "";
    for ($i = 0; $i <= $size + 1; $i++)
      $var .= $s1 . ($i * 10) . $s2;
    $this->d = '<path id="traits" stroke-width="0.3" d="'.$var.'" fill="url(#bg)" stroke="black"/>';

    switch ($size)
    {
      case 'value':
        # code...
        break;
      case 19:
        $this->dots .= '<circle cx="30" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="100" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="170" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="30" cy="100" r="1" fill="black" />';
        $this->dots .= '<circle cx="100" cy="100" r="1" fill="black" />';
        $this->dots .= '<circle cx="170" cy="100" r="1" fill="black" />';
        $this->dots .= '<circle cx="30" cy="170" r="1" fill="black" />';
        $this->dots .= '<circle cx="100" cy="170" r="1" fill="black" />';
        $this->dots .= '<circle cx="170" cy="170" r="1" fill="black" />';
      default:
        # code...
        break;
    }
  }
  function initLabels($size)
  {
    $char = 'A';
    for ($i = 0; $i <= $size; $i++)
    {
      $var = ($i * 10);
      $this->x_label .= '<text x=" '.($var + 9.5).' " y="-2" font-size="3" > '.$char.' </text>';
      $this->y_label .= '<text x="-5" y=" '.($var + 11).' " font-size="3" > '.$i.' </text>';
      $char++;
    }
  }
  function getD()
  {
    echo $this->d;
  }
  function getXLabels()
  {
    echo $this->x_label;
  }
  function getYLabels()
  {
    echo $this->y_label;
  }
  function getBackground()
  {
    echo $this->background;
  }
  function getDots()
  {
    echo $this->dots;
  }
}

?>
