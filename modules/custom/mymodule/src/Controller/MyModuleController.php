<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use GuzzleHttp\Psr7\Request;

class MyModuleController extends ControllerBase {

  public function content($param) {
   
    return [
      '#markup' => $this->t('Received parameter: @param', ['@param' => $param]),
    ];
  }
}
