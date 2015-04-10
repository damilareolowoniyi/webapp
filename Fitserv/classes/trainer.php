<?php
class Trainer {
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;
	
	public function __construct($trainer = null) {
		$this->_db = DB::getInstance();
		
		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		if(!$trainer){
			if(Session::exists($this->_sessionName)){
				$trainer = Session::get($this->_sessionName);

				if($this->find($trainer)){
					$this->_isLoggedIn = true;
				} else {
					// process Logout
				}
			}
		} else {
			$this->find($trainer);
		}
	}

	public function update($fields = array(), $id = null){

		if(!$id && $this->isLoggedIn()){
			$id = $this->data()->uid;
		}

		if(!$this->_db->update('trainers', $id, $fields)){
			throw new Exception('There was a problem updating.');
		}
	}
	
	public function create($fields = array()) {
		if(!$this->_db->insert('trainers', $fields)) {		
		throw new Exception ('There was a problem creating an account.');
		}
	}
	
	public function find($trainer = null) {
		if($trainer) {
			$field = (is_numeric($trainer)) ? 'uid' : 'email';
			$data = $this->_db->get('trainers', array($field, '=', $trainer));
			
			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}
	
	public function login($email = null, $password = null, $remember = false) {
		
		
		if(!$email && !$password && $this->exists()){
			Session::put($this->_sessionName, $this->data()->uid);
		} else {

			$trainer = $this->find($email);

			if($trainer) {
				if($this->data()->password == Hash::make($password, $this->data()->salt)) {
					Session::put($this->_sessionName, $this->data()->uid);

					if($remember){
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->uid));

						if(!$hashCheck->count()) {
							$this->_db->insert('users_session', array(
								'user_id'=>$this->data()->uid,
								'hash'=>$hash
								));
						} else {
							$hash = $hashCheck->first()->hash;
						}

						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}
					return true;
				}
			}
		}
		
		return false;
	}

	public function hasPermission($key){
		$group = $this->_db->get('groups', array('id', '=', $this->data()->user_group));

		if($group->count()){
			$permissions = json_decode($group->first()->permissions, true);;
			
			if($permissions[$key] == true){
				return true;
			}
		}
		return false;
	}

	public function exists(){
		return (!empty($this->_data)) ? true : false;
	}
	
	public function logout(){

		$this->_db->delete('users_session', array('user_id', '=', $this->data()->uid));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}

	public function data() {
		return $this->_data;
	}

	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}
}