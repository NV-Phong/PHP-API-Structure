<?php

class UserService
{
   public function getUsers()
   {
      return [
         ['id' => 1, 'name' => 'Nguyen Van A', 'email' => 'a@example.com'],
         ['id' => 2, 'name' => 'Tran Thi B', 'email' => 'b@example.com'],
      ];
   }

   public function getWorkSpaces()
   {
      return [
         ['id' => 1, 'name' => 'UI-Engineer', 'description' => 'company'],
         ['id' => 2, 'name' => 'WorkSpace', 'description' => 'project'],
      ];
   }
}
