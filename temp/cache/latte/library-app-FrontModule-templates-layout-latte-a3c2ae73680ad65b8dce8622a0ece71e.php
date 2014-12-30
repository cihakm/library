<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/@layout.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2517056962', 'html')
;
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
<?php $iterations = 0; foreach ($flashes as $flash) { ?>
                        <div class="alert alert-<?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?>"> 
                                <div class="msg"><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div> 
				<a href="#" class="close" data-dismiss="alert">Close</a>
			</div>
<?php $iterations++; } $_b->templates['2517056962']->renderChildTemplate('modals.latte', $template->getParameters()) ?>

		<div class="wrapper">
<?php $_b->templates['2517056962']->renderChildTemplate('header.latte', $template->getParameters()) ?>
			<section>
				<div class="slider">
					<div class="container">
						<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/logo/logo-big.png" alt="logo-big">
						<form>
							<div class="row">
								<div class="col-md-9">
									<input type="text" placeholder="Zadejte jméno autora nebo název knihy" class="form-control">
								</div>
								<div class="col-md-3">
									<input type="submit" class="btn" value="Hledat">
								</div>
								<div class="clear"></div>

							</div>
						</form>
					</div>
				</div>
			</section>
<?php Latte\Macros\BlockMacros::callBlock($_b, 'content', $template->getParameters()) ?>
			<div class="push"></div>
		</div>
<?php $_b->templates['2517056962']->renderChildTemplate('footer.latte', $template->getParameters()) ?>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js"></script>
		<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/live-form-validation.js"></script>
		<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/responsive-slider.js"></script>
                <script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>


	</body>
</html>
