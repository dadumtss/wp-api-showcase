<?php
namespace MYTHEME;


class Greeting {

	private function getGreetings(){
		return json_decode(CallAPI('GET', API_URL.'/greeting'));
	}

	private function addGreeting($title){
		return json_decode(CallAPI('POST', API_URL.'/greeting',
			array(
				'title'=>$title,
				'status'=>'publish'
			)
		));
	}

	public function displayGreetings(){
		$allGreetings = $this->getGreetings();

		if ($allGreetings) {
			echo '<ul>';
			foreach ( $allGreetings as $index => $greeting ) {
				echo '<li>'.$greeting->title->rendered.'</li>';
			}
			echo '</ul>';
		} else {
			echo 'Nix zu sehen :(';
		}

	}

	public function displayForm(){
		if (isset($_POST['addgreeting']) && $_POST['addgreeting'] !== '') {
			$greeting = htmlspecialchars($_POST['addgreeting']);
			$this->addGreeting($greeting);
			header("location: {$_SERVER['PHP_SELF']}");
			exit;
		}
		echo '
			<form method="post" action="#">
				<input type="text" name="addgreeting" placeholder="Say something nice">
				<input type="submit" value="Ok :)">
			</form>
		';
	}

}