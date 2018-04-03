<?php
class Grille
{
  private $d;
  private $dots;
  private $background;
  private $x_label;
  private $y_label;
  private $tab;
  private $size;
  function __construct($size, $x, $y)
  {
    $this->size = $size;
    $this->x_label = "";
    $this->y_label = "";
    $this->background = '<image xlink:href="wood.jpg" x="0" y="0" width="100" height="100"/>';
    $this->initEdges($size);
    $this->initLabels($size, $x, $y);
  }
  function initEdges($size)
  {
    $s1 = "M ";
    $s2 = " 0 v ".($size*10-10);
    $var = "";
    for ($i = 0; $i <= $size-1; $i++)
      $var .= $s1 . ($i * 10) . $s2;
    $this->d = '<path id="traits" stroke-width="0.3" d="'.$var.'" fill="url(#bg)" stroke="black"/>';
    switch ($size)
    {
      case 'value':
        # code...
        break;
      case 9:
        $this->dots .= '<circle cx="40" cy="40" r="1" fill="black" />';
        break;
      case 13:
        $this->dots .= '<circle cx="30" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="60" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="90" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="30" cy="60" r="1" fill="black" />';
        $this->dots .= '<circle cx="60" cy="60" r="1" fill="black" />';
        $this->dots .= '<circle cx="90" cy="60" r="1" fill="black" />';
        $this->dots .= '<circle cx="30" cy="90" r="1" fill="black" />';
        $this->dots .= '<circle cx="60" cy="90" r="1" fill="black" />';
        $this->dots .= '<circle cx="90" cy="90" r="1" fill="black" />';
        break;
      case 19:
        $this->dots .= '<circle cx="30" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="90" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="150" cy="30" r="1" fill="black" />';
        $this->dots .= '<circle cx="30" cy="90" r="1" fill="black" />';
        $this->dots .= '<circle cx="90" cy="90" r="1" fill="black" />';
        $this->dots .= '<circle cx="150" cy="90" r="1" fill="black" />';
        $this->dots .= '<circle cx="30" cy="150" r="1" fill="black" />';
        $this->dots .= '<circle cx="90" cy="150" r="1" fill="black" />';
        $this->dots .= '<circle cx="150" cy="150" r="1" fill="black" />';
      default:
        # code...
        break;
    }
  }
  function initLabels($size)
  {
    $char = 'A';
    for ($i = -1; $i <= $size-2; $i++)
    {
      $var = ($i * 10);
      $this->x_label .= '<text x="'.($var + 9.5).'" y="-5" font-size="3" > '.$char.' </text>';
      $this->y_label .= '<text x="-7" y="'.($var + 11).'" font-size="3" > '.($i + 2).' </text>';
      $char++;
    }
  }
  function getSize()
  {
    return $this->size;
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
