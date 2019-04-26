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
namespace App\Module\Api\Controller;

use Sy\ControllerAbstract;
use Sy\Http\Request;
use App\Library\Utils;
use App\Model\Category as CategoryModel;

class Category extends ControllerAbstract {
	private $category;
	public function __construct(CategoryModel $category) {
		$this->category = $category;
	}

	public function listAction(Request $request) {
		return Utils::getResult($this->category->list());
	}
}