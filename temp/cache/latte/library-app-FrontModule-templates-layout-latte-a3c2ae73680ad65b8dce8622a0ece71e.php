<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/@layout.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7030687365', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block _flashes
//
if (!function_exists($_b->blocks['_flashes'][] = '_lbd8ee5b63b0__flashes')) { function _lbd8ee5b63b0__flashes($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('flashes', FALSE)
;$iterations = 0; foreach ($flashes as $flash) { ?>
				<div class="alert alert-<?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?> alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="msg"><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div> 
				</div> 
<?php $iterations++; } 
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
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="robots" content="noindex,follow">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Knihovna Hradec Králové</title>

		<!-- CSS -->
		<link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/print.css" rel="stylesheet" media="print">
		<link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/styles.css" rel="stylesheet">
		<link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/responsive-slider.css" rel="stylesheet">

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico">

		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
        <body>
<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); } ?>
<div id="<?php echo $_control->getSnippetId('flashes') ?>"><?php call_user_func(reset($_b->blocks['_flashes']), $_b, $template->getParameters()) ?>
</div><?php $_b->templates['7030687365']->renderChildTemplate('modals.latte', $template->getParameters()) ?>

		<div class="wrapper">
<?php $_b->templates['7030687365']->renderChildTemplate('header.latte', $template->getParameters()) ?>
			<section>
				<div class="slider">
					<div class="container">
						<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/logo/logo-big.png" alt="logo-big" class="hidden-xs">
						<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["searchForm"], array()) ?>

							<div class="row">
								<div class="col-md-9">
									<?php echo $_form["search"]->getControl() ?>

								</div>
								<div class="col-md-3">
									<?php echo $_form["submit"]->getControl() ?>

								</div>
								<div class="clear"></div>
							</div>
						<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

					</div>
				</div>
			</section>
<?php Latte\Macros\BlockMacros::callBlock($_b, 'content', $template->getParameters()) ?>
			<div class="push"></div>
		</div>
<?php $_b->templates['7030687365']->renderChildTemplate('footer.latte', $template->getParameters()) ?>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js"></script>
		<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/live-form-validation.js"></script>
		<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/responsive-slider.js"></script>
                <script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>


	</body>
</html>
