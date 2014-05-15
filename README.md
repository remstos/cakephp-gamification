# Gamification

CakePHP plugin to easily add gamification

## Requirements

- PHP5
- CakePHP >= 2.2.5
- Minimum PHP skills

## Installation

this repository should be installed in the same way as any other plugin.

	cd somefolder/app/Plugin
	git clone git://github.com/kemcake/cakephp-gamification.git Gamification

You need to enable the plugin in your `app/Config/bootstrap.php` file:

`CakePlugin::load('Gamification');`

If you are already using `CakePlugin::loadAll();`, then this is not necessary.

You can also find the plugin on Packagist : https://packagist.org/packages/kemcake-wanted33/cakephp-gamification

# Database
We're working on it but for now, you need to create the plugins table on your own. 

Follow this model



You can files in `Gamification/Migrations` if you use Migrations plugin
	
## Use it

Simply add this to each model you want to be `gamificable`.

Currently support `Add` / `Edit` / `Delete` action

    // app/Model/SampleModel.php
      class SampleModel extends AppModel {
      
    	public $actsAs = array(
    	    'Gamification.Gamificable' => array(
                'rules' => array(
                	array(
                		'action' => 'Add',
                		'points' => 20,
                		'occurence' => 1
                	),
                	array(
                		'action' => 'Edit',
                		'points' => 10,
                		'occurence' => 1
                	),
                	array(
                		'action' => 'Delete',
                		'points' => 5,
                		'occurence' => 1
                	)
                )
    	    )
        );
        
        // Whatever your class do
      }
  

## Author
Rémi Santos ([KemCake](http://twitter.com/KemCake))

Quentin Rubini ([Wanted33](http://twitter.com/Wanted33))



