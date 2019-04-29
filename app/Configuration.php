<?php
/**
 * 配置
 * 
 * @author ShuangYa
 * @package SimpleVideo
 * @category Configutation
 * @link https://www.sylingd.com/
 * @copyright Copyright (c) 2019 ShuangYa
 */
namespace App;

use Sy\Http\Router;
use Psr\SimpleCache\CacheInterface;

class Configutation {
	const ROUTE_VER = 3;
	public function setRouter(CacheInterface $cache) {
		if ($cache->has('routes') && $cache->get('routes_ver') == ROUTE_VER) {
			Router::from($cache->get('routes'));
			return;
		}
		Router::get('/api/category', 'api.category.list');
		Router::get('/api/video/list/{id}', 'api.video.list', [
			'id' => '(\d+)'
		]);
		Router::get('/api/video/user/{id}', 'api.video.user', [
			'id' => '(\d+)'
		]);
		Router::get('/api/video/get/{id}', 'api.video.get', [
			'id' => '(\d+)'
		]);
		Router::get('/api/user/me', 'api.user.me');
		Router::post('/api/user/login', 'api.user.login');
		Router::post('/api/user/register', 'api.user.register');
		Router::post('/api/upload/image', 'api.upload.image');
		$cache->set('routes', Router::dump());
		$cache->set('routes_ver', ROUTE_VER);
	}
}