<?php

namespace MYTHEME;

class Login {

	private $user;
	private $pw;

	public function checkLogin(){
		if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
			return true;
		} else {
			return false;
		}
	}

	public function login($user, $pw) {
		$this->setUser($user);
		$this->setPw($pw);
		$_SESSION['username'] = $this->getUser();
		$_SESSION['pw'] = $this->getPw();

		$response = json_decode(CallAPI('GET', API_URL.'/posts/'));

		if(isset($response->code)) {
			$_SESSION['loggedIn'] = false;
		} else {
			$_SESSION['loggedIn'] = true;
		}
	}

	public function logout() {
		unset($_SESSION);
		session_destroy();
		header("location: {$_SERVER['PHP_SELF']}");
		exit;
	}

	public function displayLoginForm(){
		if (
			isset($_POST['username']) && $_POST['username'] !== '' &&
			isset($_POST['pw']) && $_POST['pw'] !== ''
		) {
			$username = htmlspecialchars($_POST['username']);
			$pw = htmlspecialchars($_POST['pw']);
			$this->login($username, $pw);
			header("location: {$_SERVER['PHP_SELF']}");
			exit;
		}
		echo '
			<p>Login</p>
			<form method="post" action="#">
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="pw" placeholder="Password" />
				<input type="submit" value="Log me in">
			</form>
		';
	}

	/**
	 * @return mixed
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @param mixed $user
	 */
	public function setUser( $user ) {
		$this->user = $user;
	}

	/**
	 * @param mixed $pw
	 */
	public function setPw( $pw ) {
		$this->pw = $pw;
	}

	/**
	 * @return mixed
	 */
	private function getPw() {
		return $this->pw;
	}

}