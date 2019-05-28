<?php
/**
 * Video
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
use App\Service\Video as VideoService;
use App\Service\Token;
use Respect\Validation\Validator;
use Latitude\QueryBuilder\Expression;

class Video extends ControllerAbstract {
	private $video;
	public function __construct(VideoService $video) {
		$this->video = $video;
	}

	public function saveAction(Request $request) {
		$this->video->save($request->post, ['category', 'user', 'name', 'image', 'aid', 'create_time']);
		return Utils::getResult();
	}

	public function delAction(Request $request) {
		$res = $this->video->del(intval($request->get['id']));
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