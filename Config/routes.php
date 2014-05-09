<?php

/**
* Gamification Routing
*/
Router::connect('/gamification',	array('plugin' => 'Gamification', 'controller' => 'badges', 'action' => 'index'));
 