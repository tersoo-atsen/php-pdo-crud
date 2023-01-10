<?php

class ProfileController
{
  public function index($page)
  {
    include('views/' . $page . '.php');
  }
}
