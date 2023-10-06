<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\hello_world\HelloWorldSalutation;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the salutation message.
 */
class HelloWorldController extends ControllerBase {

  /**
   * The salutation service.
   *
   * @var \Drupal\hello_world\HelloWorldSalutation
   */
  protected $salutation;

  /**
   * HelloWorldController constructor.
   *
   * @param \Drupal\hello_world\HelloWorldSalutation $salutation
   *   The salutation service.
   */
  public function __construct() {
    echo 111;
    die;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    var_dump($container->get('hello_world.salutation'));
    die;
    // return new static(
    //   $container->get('hello_world.salutation')
    // );
  }

  /**
   * Hello World.
   *
   * @return array
   *   Our message.
   */
  public function helloWorld() {
    return [
      '#markup' => $this->salutation->getSalutation(),
    ];
  }

}