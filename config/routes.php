<?php

use cvendor\Router;

Router::addRoute('^admin/?$', [CONTROLLER => 'Main', ACTION => 'index', ADMIN_PREFIX => 'admin']);
Router::addRoute('^admin/(?P<controller>[a-z-_]+)/?(?P<action>[a-z-_]+)?$', [ADMIN_PREFIX => 'admin']);

Router::addRoute('^$', [CONTROLLER => 'Main', ACTION => 'index']);

Router::addRoute('^(?P<controller>[a-z-_]+)/(?P<action>[a-z-_]+)$');
