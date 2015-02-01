<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/header.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('6796927506', 'html')
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
<section>
	<div class="container">
			<header>
				<div class="logo pull-left">
					<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:Homepage:"), ENT_COMPAT) ?>
"><h1><img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/data/logo/logo.png" alt="Knihovna Hradec Králové"></h1></a>
				</div>
				<div class="pull-right">
<?php if ($user->loggedIn) { ?>
						<p class="pull-left"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:MyProfile:"), ENT_COMPAT) ?>
">Můj účet</a></p>
						<p class="pull-right"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
">Odhlásit</a></p>
<?php } else { ?>
						<p class="pull-left"><a href="#" data-toggle="modal" data-target="#registrationModal">Registrace</a></p>
						<p class="pull-right"><a href="#" data-toggle="modal" data-target="#loginModal">Přihlášení</a></p>
<?php } ?>
					<div class="clear"></div>
				</div>
				<div class="clearfix"></div>
			</header>
			<div class="navbar-header main">
            								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
            									<span class="sr-only">Toggle navigation</span>
            									<span class="icon-bar"></span>
            									<span class="icon-bar"></span>
            									<span class="icon-bar"></span>
            								</button>
            								<a class="navbar-brand" data-toggle="collapse" data-target="#navbar-main" href="#">Menu</a>
            							</div>
            							<div id="navbar-main" class="navbar-collapse collapse">
            								<ul class="nav navbar-nav">
            									<li <?php try { $_presenter->link(":Front:Homepage:default"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")) { ?>
class="active"<?php } ?>><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:Homepage:"), ENT_COMPAT) ?>
">Úvod</a></li>
                                                <li <?php try { $_presenter->link(":Front:Catalog:default"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")) { ?>
class="active"<?php } ?>><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:Catalog:"), ENT_COMPAT) ?>
">Katalog</a></li>
                                                <li <?php try { $_presenter->link(":Front:Tax:default"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")) { ?>
class="active"<?php } ?>><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:Tax:"), ENT_COMPAT) ?>
">Ceník</a></li>
                                                <li <?php try { $_presenter->link(":Front:News:default"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")) { ?>
class="active"<?php } ?>><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:News:"), ENT_COMPAT) ?>
">Aktuality</a></li>
            								</ul>
            							</div><!--/.nav-collapse -->

	</div>
</section>