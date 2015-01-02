<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/Homepage/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('6930731355', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbbaf59b297c_content')) { function _lbbaf59b297c_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><section class="numbers">
	<div class="container">
		<h2>Knihovna HK <span>v číslech</span></h2>
		<div class="list">
			<div class="col-md-4 daily">
				<p><span>Výpujček</span> deně</p>
				<p class="number">1500</p>
			</div>
			<div class="col-md-4 users">
				<p><span>Uživatelů</span></p>
				<p class="number">10555</p>
			</div>
			<div class="col-md-4 books">
				<p>Knih <span>k vypůjčení</span></span>
				<p class="number">253242</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>
<section class="welcome">
	<div class="container">
		<h2>Vítejte <span>v knihovně města Hradec Králové</span></h2>
		<?php echo $welcome->text ?>

	</div>
</section>
<section class="bestsellers">
	<div class="container">
		<h2><span>Nejčasteji půjčované</span> knihy</h2>
		<div class="book-carousel">
<?php $iterations = 0; foreach ($mostBorrowed as $book) { ?>
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
	</div>
</section>
<section class="registration">
	<div class="container">
		<h2><span>Zaregistrujte se</span> u nás</h2>
		<div class="subtitle">
			<?php echo $registration->text ?>


		</div>
		<div class="col-md-6 right">
			<p><a href="#" class="btn reg orange" data-toggle="modal" data-target="#registrationModal">Běžná registrace</a></p>
		</div>
		<div class="col-md-6">
			<p><a class="btn fb blue" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("fbLogin-open!"), ENT_COMPAT) ?>
">Facebook přihlášení</a></p>
		</div>
	</div>
</section><?php
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
[
<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 