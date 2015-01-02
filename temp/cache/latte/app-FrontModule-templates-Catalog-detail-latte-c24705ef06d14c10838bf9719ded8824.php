<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/Catalog/detail.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7815958362', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lba302c774f9_content')) { function _lba302c774f9_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
	<div class="book-detail">
		<div class="book-about">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<p class="back pull-right"><a href="javascript:history.back();" >Zpět</a></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($book->url), ENT_COMPAT) ?>" alt="book thumbnail">
				</div>
				<div class="col-md-9">
					<div class="category">
						<p><?php echo Latte\Runtime\Filters::escapeHtml($book->category->name, ENT_NOQUOTES) ?></p>
					</div>
					<h2><?php echo Latte\Runtime\Filters::escapeHtml($book->title, ENT_NOQUOTES) ?></h2>
					<p class="author"><?php echo Latte\Runtime\Filters::escapeHtml($book->author->name, ENT_NOQUOTES) ?></p>
					<div class="text">
						<?php echo $book->desc ?>

					</div>
					<div class="row">
						<div class="col-md-4">
							<p><span>Rok vydání: </span><?php echo Latte\Runtime\Filters::escapeHtml($template->date($book->year, 'Y'), ENT_NOQUOTES) ?></p>
							<p><span>Počet stran: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->page_count, ENT_NOQUOTES) ?></p>
						</div>
						<div class="col-md-4">
							<p><span>Dostupnost: </span>zbývají <?php echo Latte\Runtime\Filters::escapeHtml($book->count, ENT_NOQUOTES) ?></p>
							<p><span>Vydavatel: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->publisher->name, ENT_NOQUOTES) ?></p>
						</div>
						<div class="col-md-4">
							<p><span>EAN: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->ean, ENT_NOQUOTES) ?></p>
							<p><span>ISBN: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->isbn, ENT_NOQUOTES) ?></p>
						</div>
					</div>

				</div>
				<div class="col-md-12">
					<div class="row">
						<p class="basket pull-right"><a href="#" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>Vypůjčit</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
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