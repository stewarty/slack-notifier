# Slack notifier

[![Build Status](https://travis-ci.org/uniplug/slack-notifier.svg)](https://travis-ci.org/uniplug/slack-notifier)

## Installation

`composer require uniplug/slack-notifier`

## Usage

### Simple

```php
require __DIR__ . '/vendor/autoload.php';

$client = new Slack\Client('your_team', 'your_token');
$slack = new Slack\Notifier($client);

$message = new Slack\Message\Message('Hello world');

$message->setChannel('#test')
    ->setMrkdwn(true)
    ->setIconEmoji(':ghost:')
    ->setUsername('slack-php');

$slack->notify($message);
```

### With attachments

```php
require __DIR__ . '/vendor/autoload.php';

$client = new Slack\Client('your_team', 'your_token');
$slack = new Slack\Notifier($client);

$message = new Slack\Message\Message('Hello world');
$attachment = new Slack\Message\MessageAttachment();
$attachment
    ->setMrkdwnIn(array('pretext', 'text', 'fields'))
    ->setFallback('fallback text')
    ->setPretext('Pretext text')
    ->setAuthorName('Author Name')
    ->setAuthorLink('Author Link')
    ->setAuthorIcon('Author Icon')
    ->setTitle('Title')
    ->setTitleLink('http://github.com')
    ->setImageUrl('http://github.com/image.jpg');
$field = new Slack\Message\MessageField();
$field
    ->setTitle('foo')
    ->setValue('bar');

$attachment->addField($field);
$message->addAttachment($attachment);

$message->setChannel('#test')
    ->setIconEmoji(':ghost:')
    ->setUsername('slack-php');

$slack->notify($message);
```

### Message

If your message contain @username and you want him to be notified, add `$message->enableLinkNames(true)`
