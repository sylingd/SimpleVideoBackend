<?php
/**
 * User Inject
 * 
 * @author ShuangYa
 * @package Plugin
 * @category Configutation
 * @link https://www.sylingd.com/
 * @copyright Copyright (c) 2019 ShuangYa
 */
namespace App\Plugin;

use Sy\Plugin;
use Sy\Http\Cookie;
use Sy\Http\Request;
use App\Service\Token;

class UserInject {
	private $token;
	public function __construct(Token $token) {
		$this->token = $token;
	}

	public function register() {
		Plugin::register('beforeDispatch', [$this, 'handle']);
	}

	public function handle(Request $request) {
		$request->user = null;
		$token = Cookie::get('token');
		if ($token) {
			$request->user = $this->token->validate($token);
		}
	}
}