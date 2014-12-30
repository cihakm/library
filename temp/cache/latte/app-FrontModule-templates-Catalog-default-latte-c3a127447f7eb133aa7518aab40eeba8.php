<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/Catalog/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9858736957', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbc8a25361cb_content')) { function _lbc8a25361cb_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
	<div class="catalog">
		<div class="row">
<div id="<?php echo $_control->getSnippetId('category') ?>"><?php call_user_func(reset($_b->blocks['_category']), $_b, $template->getParameters()) ?>
</div>
		</div>
	</div>
</div><?php
}}

//
// block _category
//
if (!function_exists($_b->blocks['_category'][] = '_lb3c682b7129__category')) { function _lb3c682b7129__category($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('category', FALSE)
?>				<div class="col-md-3">
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
<?php $iterations = 0; foreach ($categories as $cat) { ?>
										<li <?php if ($categoryId == $cat->id) { ?>class="active"<?php } ?>><a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("changeCategory!", array($cat->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($cat->name, ENT_NOQUOTES) ?></a></li>
<?php $iterations++; } ?>
								</ul>
							</div><!--/.nav-collapse -->
						</div><!--/.container-fluid -->
					</nav>
				</div>
				<div class="col-md-9">
					<h4><?php echo Latte\Runtime\Filters::escapeHtml($category->name, ENT_NOQUOTES) ?></h4>
					<div class="row">
<?php $iterations = 0; foreach ($books as $book) { ?>
							<div class="book-box col-md-4">
								<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($book->url), ENT_COMPAT) ?>" alt="">
								<div class="infobox">
									<p class="title"><?php echo Latte\Runtime\Filters::escapeHtml($book->title, ENT_NOQUOTES) ?></p>
									<p class="author"><?php echo Latte\Runtime\Filters::escapeHtml($book->author->name, ENT_NOQUOTES) ?></p>
									<a class="info-button" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:Catalog:detail", array($book->id)), ENT_COMPAT) ?>
">info</a>
									<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>
								</div>
							</div>
<?php $iterations++; } ?>
						<div class="clear"></div>
					</div>
				</div>
<?php
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