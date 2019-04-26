<?php
/**
 * Video comment
 * 
 * @author ShuangYa
 * @package SimpleVideo
 * @category Model
 * @link https://www.sylingd.com/
 * @copyright Copyright (c) 2019 ShuangYa
 */
namespace App\Model;

use Sy\ModelAbstract;

class VideoComment extends ModelAbstract {
	protected $_table_name = 'video_comment';
	protected $_primary_key = 'id';
}