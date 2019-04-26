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
use App\Service\Video as VideoService;

class Video extends ControllerAbstract {
	private $video;
	public function __construct(VideoService $video) {
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
	 * @apiSuccess {Int} data.user 上传用户
	 * @apiSuccess {String} data.name 视频名称
	 * @apiSuccess {String} data.image 视频Logo
	 * @apiSuccess {String} data.aid 视频aid
	 * @apiSuccess {String} data.cid 视频cid
	 * @apiSuccess {String} data.create_time 上传时间
	 */
	public function listAction(Request $request) {
		return Utils::getResult($this->video->list([
			'category' => $request->param['id']
		]));
	}
	/**
	 * 获取某一用户上传的视频列表
	 * 
	 * @api {get} /video/user/:id 获取某一用户上传的视频列表
	 * @apiName GetVideoUser
	 * @apiGroup Video
	 * 
	 * @apiParam {Int} id 用户ID
	 * 
	 * @apiSuccess {Object[]} data 视频列表
	 * @apiSuccess {Int} data.id 视频ID
	 * @apiSuccess {Int} data.category 分类ID
	 * @apiSuccess {Int} data.user 上传用户
	 * @apiSuccess {String} data.name 视频名称
	 * @apiSuccess {String} data.image 视频Logo
	 * @apiSuccess {String} data.aid 视频aid
	 * @apiSuccess {String} data.cid 视频cid
	 * @apiSuccess {String} data.create_time 上传时间
	 */
	public function userAction(Request $request) {
		return Utils::getResult($this->video->list([
			'user' => $request->param['id']
		]));
	}
	/**
	 * 获取视频详情
	 * 
	 * @api {get} /video/get/:id 获取视频详情
	 * @apiName GetVideo
	 * @apiGroup Video
	 * 
	 * @apiParam {Int} id 用户ID
	 * 
	 * @apiSuccess {Object} data 详情
	 * @apiSuccess {Object} data.video 视频详情
	 * @apiSuccess {Int} data.video.id 视频ID
	 * @apiSuccess {Int} data.video.category 分类ID
	 * @apiSuccess {Int} data.video.user 上传用户
	 * @apiSuccess {String} data.video.name 视频名称
	 * @apiSuccess {String} data.video.image 视频Logo
	 * @apiSuccess {String} data.video.aid 视频aid
	 * @apiSuccess {String} data.video.cid 视频cid
	 * @apiSuccess {String} data.video.create_time 上传时间
	 * @apiSuccess {Object[]} data.comment 评论列表
	 * @apiSuccess {Int} data.comment.id 评论ID
	 * @apiSuccess {Int} data.comment.video 视频ID
	 * @apiSuccess {Int} data.comment.user 用户ID
	 * @apiSuccess {Int} data.comment.zan 点赞数量
	 * @apiSuccess {String} data.comment.body 评论内容
	 * @apiSuccess {String} data.comment.create_time 评论时间
	 */
	public function getAction(Request $request) {
		$id = $request->param['id'];
		return Utils::getResult([
			'video' => $this->video->get($id),
			'comment' => $this->video->getComment($id)
		]);
	}
}