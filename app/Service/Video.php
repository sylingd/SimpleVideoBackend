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
	private $user;
	public function __construct(VideoModel $video, VideoComment $comment, User $user) {
		$this->video = $video;
		$this->comment = $comment;
		$this->user = $user;
	}

	public function save($data, $filter) {
		if (isset($data['id']) && $data['id'] != -1) {
			return $this->video->set($data, $filter, $data['id']);
		} else {
			return $this->video->add($data, $filter);
		}
	}

	public function get($id) {
		return $this->video->get($id);
	}

	public function del($id) {
		return $this->video->del($id);
	}

	public function list($filter) {
		return $this->video->list($filter);
	}

	public function getComment($id, $user = false) {
		$res = $this->comment->list(['video' => $id]);
		if ($user) {
			$users = [];
			foreach ($res as &$v) {
				if (!isset($users[$v['user']])) {
					$users[$v['user']] = $user->get($v['user']);
					unset($users[$v['user']]['password']);
				}
				$v['user'] = $users[$v['user']];
			}
		}
		return $res;
	}

	public function getModel() {
		return $this->video;
	}

}