<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/Search/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('0849459175', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb7b35da3e1f_content')) { function _lb7b35da3e1f_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
	<h2>Výsledky <span>vyhledávání</span></h2>
	<div class="catalog search">
		<div class="col-md-12">
			<div class="row">
				<p class="searchkey"><span>Hledaný výraz:</span> "<?php echo Latte\Runtime\Filters::escapeHtml($searchKey, ENT_NOQUOTES) ?>"</p>
<?php if ($booksCount > 0) { ?>
					<div class="row">

<?php $iterations = 0; foreach ($books as $book) { ?>
							<div class="book-box col-md-3">
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
					</div>
<?php } else { ?>
					<p>Nebyly nalezeny žádné výsledky.</p>
<?php } ?>
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