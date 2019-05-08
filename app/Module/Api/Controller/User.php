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
use Sy\Http\Cookie;
use Sy\Http\Request;
use App\Library\Utils;
use App\Model\User as UserModel;
use App\Service\Token;
use Respect\Validation\Validator;

class User extends ControllerAbstract {
	private $user;
	private $token;
	public function __construct(UserModel $user, Token $token) {
		$this->user = $user;
		$this->token = $token;
	}

	public function meAction(Request $request) {
		$token = Cookie::get('token');
		$user = $this->token->validate($token);
		if ($user === null) {
			return Utils::getResult([
				'errno' => '101',
				'error' => '未登录'
			]);
		}
		unset($user['password']);
		return Utils::getResult([
			'user' => $user
		]);
	}

	public function loginAction(Request $request) {
		$user = $this->user->get(['name' => $request->post['name']]);
		if ($user === null) {
			return Utils::getResult([
				'errno' => '101',
				'error' => '用户不存在'
			]);
		}
		if (!password_verify($request->post['password'], $user['password'])) {
			return Utils::getResult([
				'errno' => '102',
				'error' => '用户名或密码错误'
			]);
		}
		$token = $this->token->create($user['id']);
		Cookie::set([
			'name' => 'token',
			'value' => $token,
			'path' => '/',
			'expire' => 7 * 24 * 3600
		]);
		unset($user['password']);
		return Utils::getResult([
			'token' => $token,
			'user' => $user
		]);
	}
	/**
	 * 注册新用户
	 * 
	 * @api {post} /user/register 注册新用户
	 * @apiName UserRegister
	 * @apiGroup User
	 * 
	 * @apiParam {String} name 用户名
	 * @apiParam {String} avatar 头像
	 * @apiParam {String} email EMail
	 * @apiParam {String} password 密码
	 * @apiParam {String} nickname 昵称
	 * 
	 * @apiSuccess {Object} data 信息
	 * @apiSuccess {Int} data.id 用户ID
	 */
	public function registerAction(Request $request) {
		if (!preg_match('/^(\w{1,20})$/', $request->post['name'])) {
			return Utils::getResult([
				'errno' => '101',
				'error' => '用户名不合法'
			]);
		}
		if (!Validator::email()->validate($request->post['email'])) {
			return Utils::getResult([
				'errno' => '102',
				'error' => '邮箱不合法'
			]);
		}
		$request->post['password'] = password_hash($request->post['password'], PASSWORD_DEFAULT);
		// ok
		try {
			$result = $this->user->add($request->post, ['name', 'password', 'email', 'nickname', 'avatar']);
		} catch (\Throwable $e) {
			return Utils::getResult([
				'errno' => '103',
				'error' => '注册失败'
			]);
		}
		return Utils::getResult([
			'id' => $result
		]);
	}
}