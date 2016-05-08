<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 7.05.2016
 * Time: PM 3:27
 */
require_once '../google-api-php-client/src/Google/Client.php';
require_once '../google-api-php-client/src/Google/Service.php';

$event = new Google_Event();
$event->setSummary('Appointment');
$event->setLocation('Somewhere');
$start = new EventDateTime();
$start->setDateTime('2011-06-03T10:00:00.000-07:00');
$event->setStart($start);
$end = new EventDateTime();
$end->setDateTime('2011-06-03T10:25:00.000-07:00');
$event->setEnd($end);
$attendee1 = new EventAttendee();
$attendee1->setEmail('attendeeEmail');
// ...
$attendees = array($attendee1,
    // ...
);
$event->attendees = $attendees;
$createdEvent = $service->events->insert('primary', $event);

echo $createdEvent->getId();
