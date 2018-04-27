<?php

namespace Drupal\drupal_rollbar\Subscriber;

use Rollbar\Payload\Level;
use Rollbar\Rollbar;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;

/**
 * Subscribes to kernel event to init Rollbar.
 */
class EventSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events['kernel.request'][] = ['onKernelRequest'];
    return $events;
  }

  /**
   * @param Symfony\Component\HttpKernel\Event\KernelEvent $event
   */
  public function onKernelRequest(KernelEvent $event) {
    // Set up rollbar PHP.
    if ($access_token = getenv('ROLLBAR_ACCESS_TOKEN')) {
      $environment = getenv('ROLLBAR_ENVIRONMENT') ?: 'production';

      Rollbar::init(
        [
          'access_token' => $access_token,
          'environment' => $environment,
        ]
      );
    }
  }

}
