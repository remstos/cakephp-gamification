<?php
class CreateRulesTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
		'create_table' => array(
				'rules' => array(
					'id' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
						'key'     => 'primary',
					),
					'model' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => 255,
					),
					'action' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => 255,
					),
					'points' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
					),
					'occurence' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
					),
					'badge_id' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
					),
					'indexes' => array(
						'PRIMARY' => array(
							'column' => 'id',
							'unique' => 1
						),
					),
					'tableParameters' => array(
						'charset' => 'utf8',
						'collate' => 'utf8_general_ci',
						'engine' => 'MyISAM'
					),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
					'rules'
				),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
