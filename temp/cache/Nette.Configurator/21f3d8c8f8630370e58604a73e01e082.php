<?php
// source: C:\xampp\htdocs\library\app/config/config.neon 
// source: C:\xampp\htdocs\library\app/config/config.local.neon 

/**
 * @property Nette\Application\Application $application
 * @property Nette\Caching\Storages\FileStorage $cacheStorage
 * @property Nette\DI\Container $container
 * @property Nette\Http\Request $httpRequest
 * @property Nette\Http\Response $httpResponse
 * @property Nette\Bridges\Framework\NetteAccessor $nette
 * @property Nette\Application\IRouter $router
 * @property Nette\Http\Session $session
 * @property Nette\Security\User $user
 */
class SystemContainer extends Nette\DI\Container
{

	protected $meta = array(
		'types' => array(
			'nette\\object' => array(
				'nette',
				'nette.cacheJournal',
				'cacheStorage',
				'nette.httpRequestFactory',
				'httpRequest',
				'httpResponse',
				'nette.httpContext',
				'session',
				'nette.userStorage',
				'user',
				'application',
				'nette.presenterFactory',
				'nette.mailer',
				'nette.templateFactory',
				'database.default',
				'database.default.context',
				'facebook.config',
				'facebook.session',
				'facebook.panel',
				'facebook.client',
				'container',
			),
			'nette\\bridges\\framework\\netteaccessor' => array('nette'),
			'nette\\caching\\storages\\ijournal' => array('nette.cacheJournal'),
			'nette\\caching\\storages\\filejournal' => array('nette.cacheJournal'),
			'nette\\caching\\istorage' => array('cacheStorage'),
			'nette\\caching\\storages\\filestorage' => array('cacheStorage'),
			'nette\\http\\requestfactory' => array('nette.httpRequestFactory'),
			'nette\\http\\irequest' => array('httpRequest'),
			'nette\\http\\request' => array('httpRequest'),
			'nette\\http\\iresponse' => array('httpResponse'),
			'nette\\http\\response' => array('httpResponse'),
			'nette\\http\\context' => array('nette.httpContext'),
			'nette\\http\\session' => array('session'),
			'nette\\security\\iuserstorage' => array('nette.userStorage'),
			'nette\\http\\userstorage' => array('nette.userStorage'),
			'nette\\security\\user' => array('user'),
			'nette\\application\\application' => array('application'),
			'nette\\application\\ipresenterfactory' => array('nette.presenterFactory'),
			'nette\\application\\presenterfactory' => array('nette.presenterFactory'),
			'nette\\application\\irouter' => array('router'),
			'nette\\mail\\imailer' => array('nette.mailer'),
			'nette\\mail\\sendmailmailer' => array('nette.mailer'),
			'nette\\bridges\\applicationlatte\\ilattefactory' => array('nette.latteFactory'),
			'nette\\application\\ui\\itemplatefactory' => array('nette.templateFactory'),
			'nette\\bridges\\applicationlatte\\templatefactory' => array('nette.templateFactory'),
			'nette\\database\\connection' => array('database.default'),
			'nette\\database\\context' => array('database.default.context'),
			'kdyby\\facebook\\configuration' => array('facebook.config'),
			'kdyby\\facebook\\sessionstorage' => array('facebook.session'),
			'kdyby\\facebook\\apiclient' => array('facebook.apiClient'),
			'tracy\\ibarpanel' => array('facebook.panel'),
			'kdyby\\facebook\\diagnostics\\panel' => array('facebook.panel'),
			'kdyby\\facebook\\facebook' => array('facebook.client'),
			'app\\model\\adminusermanager' => array('27_App_Model_AdminUserManager'),
			'app\\model\\bookmanager' => array('28_App_Model_BookManager'),
			'app\\model\\catalogmanager' => array('29_App_Model_CatalogManager'),
			'app\\model\\categorymanager' => array('30_App_Model_CategoryManager'),
			'app\\model\\newsmanager' => array('31_App_Model_NewsManager'),
			'app\\model\\taxmanager' => array('32_App_Model_TaxManager'),
			'app\\model\\textmanager' => array('33_App_Model_TextManager'),
			'app\\model\\usermanager' => array('34_App_Model_UserManager'),
			'app\\routerfactory' => array('35_App_RouterFactory'),
			'nette\\di\\container' => array('container'),
		),
	);


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => 'C:\\xampp\\htdocs\\library\\app',
			'wwwDir' => 'C:\\xampp\\htdocs\\library\\www',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array(
				'class' => 'SystemContainer',
				'parent' => 'Nette\\DI\\Container',
				'accessors' => TRUE,
			),
			'tempDir' => 'C:\\xampp\\htdocs\\library\\app/../temp',
		));
	}


	/**
	 * @return App\Model\AdminUserManager
	 */
	public function createService__27_App_Model_AdminUserManager()
	{
		$service = new App\Model\AdminUserManager($this->getService('database.default.context'), $this->getService('user'));
		return $service;
	}


	/**
	 * @return App\Model\BookManager
	 */
	public function createService__28_App_Model_BookManager()
	{
		$service = new App\Model\BookManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\CatalogManager
	 */
	public function createService__29_App_Model_CatalogManager()
	{
		$service = new App\Model\CatalogManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\CategoryManager
	 */
	public function createService__30_App_Model_CategoryManager()
	{
		$service = new App\Model\CategoryManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\NewsManager
	 */
	public function createService__31_App_Model_NewsManager()
	{
		$service = new App\Model\NewsManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\TaxManager
	 */
	public function createService__32_App_Model_TaxManager()
	{
		$service = new App\Model\TaxManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\TextManager
	 */
	public function createService__33_App_Model_TextManager()
	{
		$service = new App\Model\TextManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\UserManager
	 */
	public function createService__34_App_Model_UserManager()
	{
		$service = new App\Model\UserManager($this->getService('database.default.context'), $this->getService('user'));
		return $service;
	}


	/**
	 * @return App\RouterFactory
	 */
	public function createService__35_App_RouterFactory()
	{
		$service = new App\RouterFactory;
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication()
	{
		$service = new Nette\Application\Application($this->getService('nette.presenterFactory'), $this->getService('router'), $this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->catchExceptions = FALSE;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		Tracy\Debugger::getBar()->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel($this->getService('router'), $this->getService('httpRequest'), $this->getService('nette.presenterFactory')));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileStorage
	 */
	public function createServiceCacheStorage()
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\\xampp\\htdocs\\library\\app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceDatabase__default()
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=library', 'root', NULL, array('lazy' => TRUE));
		Tracy\Debugger::getBlueScreen()->addPanel('Nette\\Bridges\\DatabaseTracy\\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, TRUE, 'default');
		return $service;
	}


	/**
	 * @return Nette\Database\Context
	 */
	public function createServiceDatabase__default__context()
	{
		$service = new Nette\Database\Context($this->getService('database.default'), new Nette\Database\Reflection\DiscoveredReflection($this->getService('database.default'), $this->getService('cacheStorage')), $this->getService('cacheStorage'));
		return $service;
	}


	/**
	 * @return Kdyby\Facebook\ApiClient
	 */
	public function createServiceFacebook__apiClient()
	{
		$service = new Kdyby\Facebook\Api\CurlClient;
		if (!$service instanceof Kdyby\Facebook\ApiClient) {
			throw new Nette\UnexpectedValueException('Unable to create service \'facebook.apiClient\', value returned by factory is not Kdyby\\Facebook\\ApiClient type.');
		}
		$service->curlOptions = array(
			78 => 10,
			13 => 60,
			10023 => array('User-Agent: kdyby-facebook-1.1'),
			2 => TRUE,
			42 => TRUE,
			19913 => TRUE,
		);;
		$this->getService('facebook.panel')->register($service);
		return $service;
	}


	/**
	 * @return Kdyby\Facebook\Facebook
	 */
	public function createServiceFacebook__client()
	{
		$service = new Kdyby\Facebook\Facebook($this->getService('facebook.config'), $this->getService('facebook.session'), $this->getService('facebook.apiClient'), $this->getService('httpRequest'), $this->getService('httpResponse'));
		return $service;
	}


	/**
	 * @return Kdyby\Facebook\Configuration
	 */
	public function createServiceFacebook__config()
	{
		$service = new Kdyby\Facebook\Configuration('338832029575373', '1d950df241ca1bf88dd30ceaa6bc66b3');
		$service->verifyApiCalls = TRUE;
		$service->fileUploadSupport = FALSE;
		$service->trustForwarded = FALSE;
		$service->permissions = array('email');
		$service->canvasBaseUrl = NULL;
		$service->graphVersion = '';
		return $service;
	}


	/**
	 * @return Kdyby\Facebook\Diagnostics\Panel
	 */
	public function createServiceFacebook__panel()
	{
		$service = new Kdyby\Facebook\Diagnostics\Panel;
		return $service;
	}


	/**
	 * @return Kdyby\Facebook\SessionStorage
	 */
	public function createServiceFacebook__session()
	{
		$service = new Kdyby\Facebook\SessionStorage($this->getService('session'), $this->getService('facebook.config'));
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttpRequest()
	{
		$service = $this->getService('nette.httpRequestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'httpRequest\', value returned by factory is not Nette\\Http\\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttpResponse()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\Bridges\Framework\NetteAccessor
	 */
	public function createServiceNette()
	{
		$service = new Nette\Bridges\Framework\NetteAccessor($this);
		return $service;
	}


	/**
	 * @return Nette\Caching\Cache
	 */
	public function createServiceNette__cache($namespace = NULL)
	{
		$service = new Nette\Caching\Cache($this->getService('cacheStorage'), $namespace);
		trigger_error('Service cache is deprecated.', 16384);
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileJournal
	 */
	public function createServiceNette__cacheJournal()
	{
		$service = new Nette\Caching\Storages\FileJournal('C:\\xampp\\htdocs\\library\\app/../temp');
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceNette__httpContext()
	{
		$service = new Nette\Http\Context($this->getService('httpRequest'), $this->getService('httpResponse'));
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceNette__httpRequestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy(array());
		return $service;
	}


	/**
	 * @return Latte\Engine
	 */
	public function createServiceNette__latte()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\\xampp\\htdocs\\library\\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	public function createServiceNette__latteFactory()
	{
		return new SystemContainer_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_nette_latteFactory($this);
	}


	/**
	 * @return Nette\Mail\SendmailMailer
	 */
	public function createServiceNette__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Nette\Application\PresenterFactory
	 */
	public function createServiceNette__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory('C:\\xampp\\htdocs\\library\\app', $this);
		$service->setMapping(array(
			'*' => 'App\\*Module\\Presenters\\*Presenter',
		));
		return $service;
	}


	/**
	 * @return Nette\Templating\FileTemplate
	 */
	public function createServiceNette__template()
	{
		$service = new Nette\Templating\FileTemplate;
		$service->registerFilter($this->getService('nette.latteFactory')->create());
		$service->registerHelperLoader('Nette\\Templating\\Helpers::loader');
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\PhpFileStorage
	 */
	public function createServiceNette__templateCacheStorage()
	{
		$service = new Nette\Caching\Storages\PhpFileStorage('C:\\xampp\\htdocs\\library\\app/../temp/cache', $this->getService('nette.cacheJournal'));
		trigger_error('Service templateCacheStorage is deprecated.', 16384);
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\TemplateFactory
	 */
	public function createServiceNette__templateFactory()
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('nette.latteFactory'), $this->getService('httpRequest'), $this->getService('httpResponse'), $this->getService('user'), $this->getService('cacheStorage'));
		return $service;
	}


	/**
	 * @return Nette\Http\UserStorage
	 */
	public function createServiceNette__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session'));
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	public function createServiceRouter()
	{
		$service = $this->getService('35_App_RouterFactory')->createRouter();
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'router\', value returned by factory is not Nette\\Application\\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession()
	{
		$service = new Nette\Http\Session($this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->setExpiration('14 days');
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceUser()
	{
		$service = new Nette\Security\User($this->getService('nette.userStorage'));
		Tracy\Debugger::getBar()->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		$sl = $this; $service->onLoggedOut[] = function () use ($sl) { $sl->getService('facebook.session')->clearAll(); };
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		Nette\Caching\Storages\FileStorage::$useDirectories = TRUE;
		$this->getByType("Nette\Http\Session")->exists() && $this->getByType("Nette\Http\Session")->start();
		header('X-Frame-Options: SAMEORIGIN');
		header('X-Powered-By: Nette Framework');
		header('Content-Type: text/html; charset=utf-8');
		Nette\Utils\SafeStream::register();
		Nette\Reflection\AnnotationsParser::setCacheStorage($this->getByType("Nette\Caching\IStorage"));
		Nette\Reflection\AnnotationsParser::$autoRefresh = TRUE;
	}

}



final class SystemContainer_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_nette_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{

	private $container;


	public function __construct(Nette\DI\Container $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\\xampp\\htdocs\\library\\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		return $service;
	}

}
