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
use Latitude\QueryBuilder\Expression;

class User extends ControllerAbstract {
	private $user;
	private $token;
	public function __construct(UserModel $user) {
		$this->user = $user;
	}

	public function listAction(Request $request) {
		$page = intval($request->get['page']) - 1;
		$page < 0 && $page = 0;
		$total = $this->user->get(null, [Expression::make('COUNT(*) AS n')]);
		return Utils::getResult([
			'total' => intval($total['n']),
			'size' => 30,
			'list' => $this->user->list([], 30, $page * 30)
		]);
	}

	public function saveAction(Request $request) {
		$res = $this->user->set($request->post, ['avatar', 'name', 'nickname', 'email'], intval($request->post['id']));
		if ($res > 0) {
			return Utils::getResult([
				'row' => $res
			]);
		} else {
			return Utils::getResult([
				'errno' => '100',
				'error' => '未知错误'
			]);
		}
	}

	public function delAction(Request $request) {
		$res = $this->user->del(intval($request->get['id']));
		// if ($res > 0) {
			return Utils::getResult([
				'id' => $request->get['id'],
				'row' => $res
			]);
		// } else {
		// 	return Utils::getResult([
		// 		'errno' => '100',
		// 		'error' => '未知错误'
		// 	]);
		// }
	}
}