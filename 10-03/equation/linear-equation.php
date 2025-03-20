<?php
class LinearEquation
{
   public $a;
   public $b;

   public function __construct($a, $b)
   {
      $this->a = $a;
      $this->b = $b;
   }

   public function solve()
   {
      if ($this->a == 0) {
         return null;
      }

      return -$this->b / $this->a;
   }
}
