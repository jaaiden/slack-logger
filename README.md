# slack-logger
A Slack framework for logging user messages and statistics - [View demo](https://nyaa-nyaa.co)

[![Build Status](https://semaphoreci.com/api/v1/projects/59774d71-1545-41e3-9c80-7b567800eac9/511563/shields_badge.svg)](https://semaphoreci.com/zdevine/slack-logger)
[![Gratipay](https://img.shields.io/gratipay/zdevine.svg)](https://gratipay.com/~zdevine/)
[![License]](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://github.com/zackdevine/slack-logger/blob/master/LICENSE)

### What is slack-logger?
slack-logger is a web framework for [Slack](https://slack.com) that allows you to store user messages from specific channels and record user statistics such as how many messages a user posted, what channel a user is most active on, and more.

slack-logger uses [Laravel 4.2](https://laravel.com/docs/4.2) as the server-side framework, so you have a stable and secure system in place.

### Installation
Before you get started, please make sure your server meets the [Laravel Server Requirements](https://laravel.com/docs/4.2/#server-requirements).

To install slack-logger, download the repository as a zip file or clone it by entering the following in your terminal:
```
git clone https://github.com/zackdevine/slack-logger.git
```
Make sure you correctly setup your apache2/nginx server to point to the `public` folder inside the slack-logger directory.

### Configuration
To change some default settings, open up `app/config/app.php` in your favorite text editor.

Logger-specific settings are prefixed with `logger_` for the key name.

### Support
If you need help, please report an issue here on GitHub and I will try to get back to you on it as soon as possible. If you have a feature request, feel free to fork the repository and submit it to me.
