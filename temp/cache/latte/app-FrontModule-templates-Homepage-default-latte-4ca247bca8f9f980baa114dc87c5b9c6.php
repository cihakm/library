<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/Homepage/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('0482904225', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbf04ca0ced6_content')) { function _lbf04ca0ced6_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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
		<p>Knihovna v Hradci Králové je veřejnou knihovnou, jejímž účelem je zabezpečovat všem          občanům rovný přístup k informacím a kulturním hodnotám, které jsou obsaženy ve fondech a informačních databázích knihovny. Pomáhá zvyšovat všeobecné a odborné vzdělání občanů.</p>
	</div>
</section>
<section class="bestsellers">
	<div class="container">
		<h2><span>Nejčasteji půjčované</span> knihy</h2>

		<div id="carousel" class="carousel slide" data-interval="5000" data-ride="carousel">
			<!-- Carousel items -->
			<div class="carousel-inner" >
				<div class="active item" data-target="#carousel">
					<div class="row">
						<div class="book-box col-md-3">
							<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0001/thumb.jpg" alt="">
							<div class="infobox">
								<p class="title">Hra o trůny</p>
								<p class="author">George R.R. Martin</p>
								<a href="#" class="info-button">info</a>
								<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>
							</div>
						</div>
						<div class="book-box col-md-3">
							<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0002/thumb.jpg" alt="">
							<div class="infobox">
								<p class="title">50 odstínů šedi</p>
								<p class="author">E. L. James</p>
								<a href="#" class="info-button">info</a>
								<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>

							</div>
						</div>
						<div class="book-box col-md-3">
							<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0003/thumb.jpg" alt="">
							<div class="infobox">
								<p class="title">Hobbit</p>
								<p class="author">J. R. R. Tolkien</p>
								<a href="#" class="info-button">info</a>
								<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>

							</div>
						</div>
						<div class="book-box col-md-3">
							<img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/books/0004/thumb.jpg" alt="">
							<div class="infobox">
								<p class="title">Hunger Games</p>
								<p class="author">S. Collins</p>
								<a href="#" class="info-button">info</a>
								<a href="#" class="basket-button" <?php if (!$user->loggedIn) { ?>data-toggle="modal" data-target="#pleaseLoginModal"<?php } ?>>vypůjčit</a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>


			</div> 
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel" role="button" data-slide="prev"><span></span></a>
			<a class="right carousel-control" href="#carousel" role="button" data-slide="next"><span></span></a>
		</div>
	</div>
</section>
<section class="registration">
	<div class="container">
		<h2><span>Zaregistrujte se</span> u nás</h2>
		<p class="subtitle">Registrací na našem webu získáte nejenom možnost vypůjčení knih.</p>
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