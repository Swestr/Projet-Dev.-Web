<?php
  class Pierre
  {
    private $color;
    private $coord_x;
    private $coord_y;
    private $svg;

    function __construct($c, $x, $y)
    {
      $this->color = $c;
      $this->coord_x = $x;
      $this->coord_y = $y;
    }
    function draw()
    {
      echo '<circle cx="' .$this->coord_x. '" cy="' .$this->coord_y. '" r="5" stroke="black" stroke-width="0.5" fill="' .$this->color. '" />';
    }
  }
?>
