<?php

namespace Drupal\my_simple_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\my_simple_module\Service\MySimpleService;
use Drupal\my_simple_module\Service\AnotherService;

class MySimpleController extends ControllerBase {

  protected $mySimpleService1;
  protected $mySimpleService2;

  public function __construct(MySimpleService $mySimpleService1, AnotherService $mySimpleService2) {
    $this->mySimpleService1 = $mySimpleService1;
    $this->mySimpleService2 = $mySimpleService2;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('my_simple_module.service1'),
      $container->get('my_simple_module.service2')
    );
  }

  public function content() {
    return [
      '#markup' => $this->mySimpleService1->getMessage(),
    ];
  }

  public function myCustomMethod() {
    return [
      '#markup' => $this->mySimpleService2->getMessage(),
    ];
  }
  

}
