<?php

namespace Drupal\demo\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the custom access control handler for the user accounts.
 */
class DemoAccess {

  /**
   * Check whether the user can view submissions.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public static function checkSubmissionAccess(AccountInterface $account) {
    return AccessResult::allowedIf($account->hasPermission('administer webform') || $account->hasPermission('administer webform submission') || $account->hasPermission('view any webform submission'));
  }

}
