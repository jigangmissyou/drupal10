<?php

namespace Drupal\my_simple_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\my_simple_module\Service\MySimpleService;

class MySimpleController extends ControllerBase {

  protected $mySimpleService;

  public function __construct(MySimpleService $mySimpleService) {
    $this->mySimpleService = $mySimpleService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('my_simple_module.service')
    );
  }

  public function content() {
    return [
      '#markup' => $this->mySimpleService->getMessage(),
    ];
  }

}
