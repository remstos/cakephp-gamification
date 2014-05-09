<?php

class GamificableBehavior extends ModelBehavior {

	public function setup(Model $Model, $settings = array()) {
	    if (!isset($this->settings[$Model->alias])) {
	    
	    	$rulesSettings = $settings['rules'];

	        $this->settings[$Model->alias] = array(
	            'rules' => $rulesSettings,
	        );
			
			$this->Rule = ClassRegistry::init('Rule');
	        $rules = array();
	        for($i = 0; $i < count($rulesSettings); $i++)
	        {
		        $rule = array(
						'Rule' => array(
							'model' => $Model->alias,
							'action' => $rulesSettings[$i]['action'],
							'points' => $rulesSettings[$i]['points'],
							'occurence' => $rulesSettings[$i]['occurence'],
							'badge_id' => 1
						)
					);	
				if (!$this->Rule->hasAny($rule["Rule"])){
					array_push($rules,$rule);		
				}
			}
			$this->Rule->saveAll($rules);
	    }
	    
	    $this->settings[$Model->alias] = array_merge(
	    	$this->settings[$Model->alias], (array)$settings
	    );
	}


	public function afterSave(Model $Model, $created, $options = Array()) {
			$action = 'Edit';
			if($created)
			{
				$action = 'Add';
			}
			
			savePoints($Model,$action);
	}
	
	public function afterDelete(Model $Model) {
			$action = 'Delete';
			
			savePoints($Model,$action);
	}
	
	function savePoints(Model $Model,$action)
	{
		$this->Rule = ClassRegistry::init('Rule');
			$this->Point = ClassRegistry::init('Point');
			
			$optionRules = array('conditions' => array(
				'Rule.model = \''.$Model->alias.'\'',
				'Rule.action = \''.$action.'\''
			));
			$rules = $this->Rule->find('first', $optionRules);
				
			if($rules) {	
				$points = array(
					'Point' => array(
						'user_id' => CakeSession::read("Auth.User.id"),
						'rule_id' => $rules['Rule']['id'],
						'foreign_key' => $Model->data[$Model->alias]['id'],
						'points' => $rules['Rule']['points'],
						'badge_id' => $rules['Rule']['badge_id']
					)
				);
				$this->Point->save($points);
			}
	}
}


?>