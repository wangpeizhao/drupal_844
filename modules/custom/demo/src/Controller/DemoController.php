<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @file
 * Contains \Drupal\demo\Controller\HelloController.
 */

namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DemoController extends ControllerBase {

    public function content() {
        return array(
            '#type' => 'markup',
            '#markup' => t("This is a demo.")
        );
    }

    public function about(Request $request) {
        
//        drupal_access_denied();
//        drupal_exit();
//        throw new AccessDeniedHttpException();
        
//        drupal_not_found();
//        drupal_exit();
//        throw new NotFoundHttpException();
        
//        $_GET['q']在drupal8里已经移除，换成current_path（）
        
//        在类里面定义常量用 const 关键字，而不是通常的 define() 函数。
//        const USERNAME_MAX_LENGTH = 60;
        
//        if (!\Drupal::currentUser()->hasPermission('access contextual links')) {
//            return;
//        }

        
        
        $build = [
            '#prefix' => '<div class="webform-about">',
            '#suffix' => '</div>',
        ];

        $build['issue']['title'] = [
            '#markup' => $this->t('How can you report bugs and issues?'),
            '#prefix' => '<h2>',
            '#suffix' => '</h2>',
        ];
        $build['issue']['content'][] = [
            '#markup' => $this->t("The first step is to review the Webform module’s issue queue for similar issues. You may be able to find a patch or other solution there. You can also contribute to an existing issue with your additional details."),
            '#prefix' => '<p>',
            '#suffix' => '</p>',
        ];
        $build['issue']['content'][] = [
            '#markup' => $this->t("If you need to create a new issue, please make and export an example of the broken form configuration. This will help guarantee that your issue is reproducible. To get the best response, it’s helpful to craft a good issue report. You can find advice and tips on the <a href=\"https://www.drupal.org/node/73179\">How to Create a Good Issue</a> page. Please use the issue summary template when creating new issues."),
            '#prefix' => '<p>',
            '#suffix' => '</p>',
        ];

        $build['#attached']['library'][] = 'webform/webform.about';

        return $build;
    }

}
