<?php
class QuadraticEquation extends LinearEquation
{
   private $c;

   public function __construct($a, $b, $c)
   {
      parent::__construct($a, $b);
      $this->c = $c;
   }

   public function solve()
   {
      if ($this->a == 0) {
         return parent::solve();
      }

      $d = $this->b * $this->b - 4 * $this->a * $this->c;

      if ($d < 0) {
         return null;
      }

      $d = sqrt($d);
      $x1 = (-$this->b + $d) / (2 * $this->a);
      $x2 = (-$this->b - $d) / (2 * $this->a);

      return [$x1, $x2];
   }
}

?>
