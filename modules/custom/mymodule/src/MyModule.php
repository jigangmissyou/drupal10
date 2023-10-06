<?php
namespace Drupal\mymodule;

use Drupal\Core\StringTranslation\StringTranslationTrait;

class MyModule {
  use StringTranslationTrait;

  public function getTime() {
    return $this->t('Hello world');
  }

  public function getSalutation() {
    $hour = date('H');
    if ($hour < 12) {
      return $this->t('Good morning');
    }
    elseif ($hour < 18) {
      return $this->t('Good afternoon');
    }
    else {
      return $this->t('Good evening');
    }
  }
}
