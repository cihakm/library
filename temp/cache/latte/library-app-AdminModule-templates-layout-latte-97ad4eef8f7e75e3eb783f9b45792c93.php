<?php
// source: C:\xampp\htdocs\library\app\AdminModule/templates/@layout.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('1232813234', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbc0f7f9e1e6_title')) { function _lbc0f7f9e1e6_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Knihovna HK | Admin<?php
}}

//
// block _flashes
//
if (!function_exists($_b->blocks['_flashes'][] = '_lb5eabe93d21__flashes')) { function _lb5eabe93d21__flashes($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('flashes', FALSE)
;$iterations = 0; foreach ($flashes as $flash) { ?>
				<div class="alert alert-<?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?> alert-dismissible fade in" role="alert"> 
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="msg"><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div> 
				</div> 
<?php $iterations++; } 
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbc82e071772_scripts')) { function _lbc82e071772_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="">
<?php if (isset($robots)) { ?>		<meta name="robots" content="noindex">
<?php } ?>

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<title><?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
ob_start(); call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?></title>
		<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/live-form-validation.js"></script>

		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/design-admin/css/styles.css">
		<link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico">
	</head>
	<body class="admin">
<?php $_b->templates['1232813234']->renderChildTemplate("modal.latte", $template->getParameters())  ?>
<div id="<?php echo $_control->getSnippetId('flashes') ?>"><?php call_user_func(reset($_b->blocks['_flashes']), $_b, $template->getParameters()) ?>
</div>
<?php if (!$isSign) { ?>
			<header>
				<div class="pull-left">
					<a class="admin-logo" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Admin:Default:default"), ENT_COMPAT) ?>
">Admin CMS</a>
				</div>
				<div class="pull-right">
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownUser" data-toggle="dropdown" aria-expanded="true">
							<?php echo Latte\Runtime\Filters::escapeHtml($user->identity->name, ENT_NOQUOTES) ?>

							<span class="caret"></span>
							<div class="clearfix"></div>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownUser">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
">Logout</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>    
			</header>
<?php } ?>

<?php if (!$isSign) { ?>
			<div class="sidebar col-lg-2 col-md-3 col-sm-3">
				<nav>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" data-toggle="dropdown"  class="dropdown-toggle">Obsah</a>
								<ul class="dropdown-menu">
									<li <?php try { $_presenter->link(":Admin:News:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")) { ?>
class="current"<?php } ?>><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Admin:News:"), ENT_COMPAT) ?>
">Aktuality</a></li>
									<li <?php try { $_presenter->link(":Admin:Tax:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")) { ?>
class="current"<?php } ?>><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Admin:Tax:"), ENT_COMPAT) ?>
">Ceník</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" data-toggle="dropdown"  class="dropdown-toggle">test</a>
								<ul class="dropdown-menu">
									<li ><a>test submenu</a></li>
								</ul>
							</li>
						</ul>
					</div>

				</nav>   
			</div>

		</div>


<?php } ?>
	<div class="content <?php if (!$isSign) { ?>col-lg-10 col-md-9 col-sm-9<?php } ?>">
<?php Latte\Macros\BlockMacros::callBlock($_b, 'content', $template->getParameters()) ?>
	</div>




	<!-- javascripts -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/design-admin/js/live-form-validation.js"></script>
	<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/design-admin/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/design-admin/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/design-admin/js/alert.js"></script>
	<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/design-admin/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/design-admin/js/jquery.nette.js"></script>
	<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>

	<script type="text/javascript">
		$(".alert").delay(4000).slideUp(200, function () {
			$(this).alert('close');
		});
	</script>

</body>

</html>
