<?php
  class Pierre
  {
    private $color;
    function __construct($c)
    {
      $this->color = $c;
    }

    function draw($id, $x, $y, $trans)
    {
      echo '<circle id="'.$id.'" cx="'.$x.'" cy="'.$y.'" r="3" stroke="'.$this->color.'" stroke-width="0.5" fill="'.$this->color.'" fill-opacity="'.$trans.'"/>';
    }
  }
?>
