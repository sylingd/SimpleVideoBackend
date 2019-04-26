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

	/**
	 * 获取某一分类下的视频列表
	 * 
	 * @api {get} /video/list/:id 获取某一分类下的视频列表
	 * @apiName GetVideoList
	 * @apiGroup Video
	 * 
	 * @apiParam {Int} id 分类ID
	 * 
	 * @apiSuccess {Object[]} data 视频列表
	 * @apiSuccess {Int} data.id 视频ID
	 * @apiSuccess {Int} data.category 分类ID
	 * @apiSuccess {String} data.name 应用名称
	 * @apiSuccess {String} data.appid 应用AppID
	 * @apiSuccess {String} data.appsecret 应用Secret
	 */
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