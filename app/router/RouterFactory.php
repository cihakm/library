<?php

namespace App;

use Nette,
    Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route;
/**
 * Router factory.
 */
class RouterFactory {

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter() {
		$router = new RouteList();


		$router[] = new Route('index.php', 'Front:Default:default', Route::ONE_WAY);

		$router[] = $adminRouter = new RouteList('Admin');
		$adminRouter[] = new Route('admin/<presenter>/<action>', 'Sign:in');


		$router[] = $frontRouter = new RouteList('Front');
		$frontRouter[] = new Route('[<locale=de de|en>/]<presenter>/<action>[/<id>]', 'Homepage:default');


		return $router;
	}

}
