<?php
/**
 * 分类
 * 
 * @author ShuangYa
 * @package SimpleVideo
 * @category Controller
 * @link https://www.sylingd.com/
 * @copyright Copyright (c) 2019 ShuangYa
 */
namespace App\Module\Admin\Controller;

use Sy\ControllerAbstract;
use Sy\Http\Request;
use App\Library\Utils;
use App\Model\Category as CategoryModel;

class Category extends ControllerAbstract {
	private $category;
	public function __construct(CategoryModel $category) {
		$this->category = $category;
	}

	public function saveAction(Request $request) {
		$id = intval($request->post['id']);
		if ($id === -1) {
			$this->category->add($request->post, ['name']);
		} else {
			$this->category->set($request->post, ['name'], $id);
		}
		if ($res > 0) {
			return Utils::getResult();
		}
	}
}