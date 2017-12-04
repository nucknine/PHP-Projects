<?php
// Пример 1
$subject = '00:04:23:7c:5d:01';

$pattern = '/^([a-f0-9][a-f0-9]:){5}[a-f0-9][a-f0-9]$/';
preg_match($pattern, $subject, $matches);
echo $matches[0]; // 00:04:23:7с:5d:01

$pattern = '/([a-f0-9]{2}:){5}[a-f0-9]{2}/';
preg_match($pattern, $subject, $matches);
echo $matches[0]; // 00:04:23:7с:5d:01

// Пример 2
$subject = 'John Smith <jsmith@site.com>';
$pattern = '/([^<]+)<([a-zA-Z0-9_-]+@([a-zA-Z0-9_-]+\\.)+[a-zA-Z0-9_-]+)>/';
preg_match($pattern, $subject, $matches);
print_r($matches);
// [0]=>John Smith <jsmith@site.com>, [1]=>John Smith, [2]=>jsmith@site.com, [3]=>site.
