<?php
/**
 * Video
 * 
 * @author ShuangYa
 * @package SimpleVideo
 * @category Service
 * @link https://www.sylingd.com/
 * @copyright Copyright (c) 2019 ShuangYa
 */
namespace App\Service;

use App\Model\User;
use App\Model\Video as VideoModel;
use App\Model\VideoComment;

class Video {
	private $video;
	private $comment;
	public function __construct(VideoModel $video, VideoComment $comment) {
		$this->video = $video;
		$this->comment = $comment;
	}

	public function get($id) {
		return $this->video->get($id);
	}

	public function list($filter) {
		return $this->video->list($filter);
	}

	public function getComment($id) {
		return $this->comment->list(['video' => $id]);
	}

}