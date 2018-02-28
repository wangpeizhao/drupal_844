<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloController.
 */

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {

    public function content() {
        return array(
            '#type' => 'markup',
            '#markup' => t("Hello,World.")
        );
    }

    public function helloWorldPage($variable) {
        $build = array(
            '#type' => 'markup',
            '#markup' => t($variable),
        );

        return $build;
    }

}
