<?php
/**
 * 用户
 * 
 * @author ShuangYa
 * @package SimpleVideo
 * @category Controller
 * @link https://www.sylingd.com/
 * @copyright Copyright (c) 2019 ShuangYa
 */
namespace App\Module\Admin\Controller;

use Sy\ControllerAbstract;
use Sy\Http\Cookie;
use Sy\Http\Request;
use App\Library\Utils;
use App\Model\User as UserModel;
use App\Service\Token;
use Respect\Validation\Validator;

class User extends ControllerAbstract {
	private $user;
	private $token;
	public function __construct(UserModel $user) {
		$this->user = $user;
	}

	public function listAction(Request $request) {
		$page = intval($request->get['page']) - 1;
		$page < 0 && $page = 0;
		return Utils::getResult([
			'list' => $this->user->list([], 30, $page * 30)
		]);
	}
}