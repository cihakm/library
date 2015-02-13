<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/Catalog/detail.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('8102542936', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbb65f8c68ba_content')) { function _lbb65f8c68ba_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
	<div class="book-detail">
		<div class="book-about">
			<div class="row">
				<div class="col-md-12">
					<div class="row head">
						<p class="back pull-right"><a href="javascript:history.back();" >Zpět</a></p>
					</div>
				</div>
			</div>
			<div class="row first">
				<div class="col-md-3 col-sm-3 col-xs-12 text-center">
					<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($book->url), ENT_COMPAT) ?>" alt="book thumbnail">
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="category">
						<p><?php echo Latte\Runtime\Filters::escapeHtml($book->category->name, ENT_NOQUOTES) ?></p>
					</div>
					<h2><?php echo Latte\Runtime\Filters::escapeHtml($book->title, ENT_NOQUOTES) ?></h2>
					<p class="author"><?php echo Latte\Runtime\Filters::escapeHtml($book->author->name, ENT_NOQUOTES) ?></p>
					<div class="text">
						<?php echo $book->desc ?>

					</div>
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<p><span>Rok vydání: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->year, ENT_NOQUOTES) ?></p>
							<p><span>Počet stran: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->page_count, ENT_NOQUOTES) ?></p>
						</div>
						<div class="col-md-4 col-sm-4">
							<div id="<?php echo $_control->getSnippetId('bookCount') ?>"><?php call_user_func(reset($_b->blocks['_bookCount']), $_b, $template->getParameters()) ?>
</div>
							<p><span>Vydavatel: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->publisher->name, ENT_NOQUOTES) ?></p>
						</div>
						<div class="col-md-4 col-sm-4">
							<p><span>EAN: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->ean, ENT_NOQUOTES) ?></p>
							<p><span>ISBN: </span><?php echo Latte\Runtime\Filters::escapeHtml($book->isbn, ENT_NOQUOTES) ?></p>
						</div>
					</div>

				</div>
				<div class="col-md-12">
					<div class="row">
						<p class="basket pull-right">
<?php if (!$user->loggedIn) { ?>
                        							<a href="#" data-toggle="modal" data-target="#pleaseLoginModal" class="basket-button">vypůjčit</a>
<?php } else { ?>
                        							<a class="basket-button ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("bookBorrow!", array($book->id)), ENT_COMPAT) ?>
">vypůjčit</a>
<?php } ?>
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><?php
}}

//
// block _bookCount
//
if (!function_exists($_b->blocks['_bookCount'][] = '_lbdf1b948664__bookCount')) { function _lbdf1b948664__bookCount($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('bookCount', FALSE)
?><p><span>Dostupnost: </span>zbývají <?php echo Latte\Runtime\Filters::escapeHtml($book->count, ENT_NOQUOTES) ?>
</p><?php
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