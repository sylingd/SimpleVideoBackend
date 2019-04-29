<?php
/**
 * 文件上传
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
use App\Model\User as UserModel;
use App\Service\Token;
use Respect\Validation\Validator;

class Upload extends ControllerAbstract {
	public function __construct() {
	}

	/**
	 * 上传图片
	 * 
	 * @api {post} /upload/image 上传图片
	 * @apiName UploadImage
	 * @apiGroup Upload
	 * 
	 * @apiParam {File} file 图片
	 * 
	 * @apiSuccess {String} data Path
	 */
	public function imageAction(Request $request) {
		$file = $request->files['file'];
		if ($file['error'] == UPLOAD_ERR_OK) {
			if ($file['size'] > 1024 * 1024) {
				return Utils::getResult([
					'errno' => '101',
					'error' => '文件大小超出限制'
				]);
			}
			$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
			if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)) {
				return Utils::getResult([
					'errno' => '102',
					'error' => '仅允许上传jpg,png,gif,webp格式的图片'
				]);
			}
			if (!is_uploaded_file($file['tmp_name'])) {
				return Utils::getResult([
					'errno' => '103',
					'error' => '上传失败'
				]);
			}
			$path = 'upload/' . date('Y/m/d');
			if (!is_dir(PUBLIC_PATH . $path)) {
				mkdir(PUBLIC_PATH . $path, 0777, true);
			}
			$filename = md5_file($file['tmp_name']) . '.' . $ext;
			move_uploaded_file($file['tmp_name'], PUBLIC_PATH . $path . '/' . $filename);
			return Utils::getResult('/' . $path . '/' . $filename);
		}
		return Utils::getResult([
			'errno' => '104',
			'error' => '上传失败'
		]);
	}
}