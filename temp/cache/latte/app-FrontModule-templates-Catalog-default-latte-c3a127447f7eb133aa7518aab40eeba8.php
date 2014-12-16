<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/Catalog/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('8071419812', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbef8351ee2a_content')) { function _lbef8351ee2a_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
	<div class="catalog">
		<div class="row">
			<div class="col-md-3">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Kategorie</a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="#">Beletrie</a></li>
								<li><a href="#">Detektivky</a></li>
								<li class="active"><a href="#">Dobrodružné</a></li>
								<li><a href="#">Dětské</a></li>
								<li><a href="#">Duchovní rozvoj</a></li>
								<li><a href="#">Jazyky</a></li>
								<li><a href="#">Komiksy</a></li>
								<li><a href="#">Kuchařky</a></li>
								<li><a href="#">Sci-fi a fantasy</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div><!--/.container-fluid -->
				</nav>
			</div>
			<div class="col-md-9">
				<h4>Dobrodružné</h4>
				<div class="row">

					<div class="book-box col-md-4">
						<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0001/thumb.jpg" alt="">
						<div class="infobox">
							<p class="title">Hra o trůny</p>
							<p class="author">George R.R. Martin</p>
							<a href="#" class="info-button">info</a>
							<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>
						</div>
					</div>
					<div class="book-box col-md-4">
						<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0002/thumb.jpg" alt="">
						<div class="infobox">
							<p class="title">50 odstínů šedi</p>
							<p class="author">E. L. James</p>
							<a href="#" class="info-button">info</a>
							<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>

						</div>
					</div>
					<div class="book-box col-md-4">
						<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0003/thumb.jpg" alt="">
						<div class="infobox">
							<p class="title">Hobbit</p>
							<p class="author">J. R. R. Tolkien</p>
							<a href="#" class="info-button">info</a>
							<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>

						</div>
					</div>
					<div class="book-box col-md-4">
						<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0004/thumb.jpg" alt="">
						<div class="infobox">
							<p class="title">Hunger Games</p>
							<p class="author">S. Collins</p>
							<a href="#" class="info-button">info</a>
							<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>
						</div>
					</div>	
					<div class="book-box col-md-4">
						<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0001/thumb.jpg" alt="">
						<div class="infobox">
							<p class="title">Hra o trůny</p>
							<p class="author">George R.R. Martin</p>
							<a href="#" class="info-button">info</a>
							<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>
						</div>
					</div>
					<div class="book-box col-md-4">
						<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0002/thumb.jpg" alt="">
						<div class="infobox">
							<p class="title">50 odstínů šedi</p>
							<p class="author">E. L. James</p>
							<a href="#" class="info-button">info</a>
							<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>

						</div>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div><?php
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 