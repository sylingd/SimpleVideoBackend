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
use App\Plugin\UserInject;

class Configuration {
	const ROUTE_VER = 2;
	public function setPlugin(UserInject $user) {
		$user->register();
	}
	public function setRouter(CacheInterface $cache) {
		// if ($cache->has('routes') && $cache->get('routes_ver') == self::ROUTE_VER) {
		// 	Router::from($cache->get('routes'));
		// 	return;
		// }
		Router::get('/api/category', 'api.category.list');
		Router::get('/api/video/all', 'api.video.list');
		Router::get('/api/video/list/{id}', 'api.video.list', [
			'id' => '(\d+)'
		]);
		Router::get('/api/video/user/{id}', 'api.video.user', [
			'id' => '(\d+)'
		]);
		Router::get('/api/video/get/{id}', 'api.video.get', [
			'id' => '(\d+)'
		]);
		Router::post('/api/video', 'api.video.submit');
		Router::get('/api/user/me', 'api.user.me');
		Router::post('/api/user/login', 'api.user.login');
		Router::post('/api/user/register', 'api.user.register');
		Router::post('/api/upload/image', 'api.upload.image');
		// Admin API
		Router::get('/api/admin/user/list', 'admin.user.list');
		Router::post('/api/admin/user/save', 'admin.user.save');
		Router::get('/api/admin/user/del', 'admin.user.del');
		Router::get('/api/admin/video/del', 'admin.video.del');
		Router::post('/api/admin/video/save', 'admin.video.save');
		Router::post('/api/admin/category', 'admin.category.save');
		// $cache->set('routes', Router::dump());
		// $cache->set('routes_ver', self::ROUTE_VER);
	}
}