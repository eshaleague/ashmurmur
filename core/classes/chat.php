<?php

class chat extends core{
	public function fetchMessages($lobby){
		$this->query("
			SELECT `$lobby`.`message`,
					`users`.`user_username`,
					`users`.`user_id`
			FROM `$lobby`
			JOIN `users`
			ON 	`$lobby`.`user_id` = `users`.`user_id`
			ORDER BY `$lobby`.`message_id`

			");
		return $this->rows();
	}

	public function throwMessage($user_id, $message, $lobby){
		$this->query("
			INSERT INTO `$lobby` (`user_id`, `message`, `timestamp`)
			VALUES (".(int)$user_id.", '".$this->db->real_escape_string(htmlentities($message))."', UNIX_TIMESTAMP())
			");
	}

	public function getplayers($team_letter, $club, $gamename){
		$this->query("
			SELECT * FROM currentseason WHERE team_letter = '$team_letter' AND club_name = '$club' AND game = '$gamename'
			");
		return $this->rows();
	}

	public function updatetime($username){
		$this->query("
			UPDATE currentseason SET timestamp= UNIX_TIMESTAMP() WHERE player_name ='$username'
			");
	}
}