<?php
Config::set('site_name','My site!');

Config::set('languages',array('en','ru'));

//Routes. Route name => method prefix

Config::set('routes',array('default' =>'','admin'=>'admin_'));

Config::set('default_route','default');
Config::set('default_language','en');
Config::set('default_controller','logins');
Config::set('default_action','index');

Config::set('db.host','localhost');
Config::set('db.user','newuser');
Config::set('db.password','111');
Config::set('db.db_name','mvc');
Config::set('db.charset','utf-8');


Config::set('salt','ashew234ru2h023042klrp34okdf043');
