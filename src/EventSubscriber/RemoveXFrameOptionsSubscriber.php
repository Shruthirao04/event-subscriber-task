<?php

namespace Drupal\event_subscriber\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RemoveXFrameOptionsSubscriber implements EventSubscriberInterface {

  public function onKernelResponse(ResponseEvent $event) {
    $response = $event->getResponse();
    $response->headers->remove('X-Generator');
  }

  public static function getSubscribedEvents() {
    // $events[KernelEvents::RESPONSE][] = array('onKernelResponse', -10);
    // return $events;
    return [
      KernelEvents::RESPONSE => ['onKernelResponse'],

    ];
  }

}
