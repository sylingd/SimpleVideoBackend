<?php
/**
 * 视频
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
use App\Library\Utils;
use App\Model\Video as VideoModel;

class Video extends ControllerAbstract {
	private $video;
	public function __construct(VideoModel $video) {
		$this->video = $video;
	}

	public function listAction(Request $request) {
		return Utils::getResult($this->video->list([
			'category' => $request->param['id']
		]));
	}
	public function userAction(Request $request) {
		return Utils::getResult($this->video->list([
			'user' => $request->param['id']
		]));
	}
	public function getAction(Request $request) {
		return Utils::getResult([
			'video' => $this->video->get($request->param['id'])
		]);
	}
}