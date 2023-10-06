<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\mymodule\MyModule;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MyModuleController extends ControllerBase {

  protected $myModuleService;

  /**
   * Constructs a MyModuleController object.
   *
   */
  public function __construct(MyModule $myModuleService) {
    $this->myModuleService = $myModuleService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('mymodule.service')
    );
  }
  

  public function content($param) {
    // $time = $this->timeService->getTime();
    // $salutation = $this->timeService->getSalutation();
    return [
      '#markup' => $this->t('Received parameter: @param, greetings: @salutation', ['@param' => $param, '@salutation' => $salutation]),
    ];
  }
}
