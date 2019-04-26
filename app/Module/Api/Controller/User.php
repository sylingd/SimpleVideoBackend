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
namespace App\Module\Api\Controller;

use Sy\ControllerAbstract;
use Sy\Http\Request;
use App\Model\User as UserModel;

class User extends ControllerAbstract {
	private $user;
	public function __construct(UserModel $user) {
		$this->user = $user;
	}

	public function loginAction(Request $request) {
		echo 'ok';
	}
	public function registerAction(Request $request) {
		//
	}
}