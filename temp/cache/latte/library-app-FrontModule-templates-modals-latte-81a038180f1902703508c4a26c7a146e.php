<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/modals.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('8423061497', 'html')
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
<!-- Login modal -->
<div id="loginModal" class="modal fade">
        <div class="modal-dialog">
                <div class="modal-content">
                        <p class="fb-login"><a class="btn fb blue" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("fbLogin-open!"), ENT_COMPAT) ?>
">Facebook přihlášení</a></p>
			<p class="choise">Nebo</p>
                        <?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["signInForm"], array()) ?>

				<?php echo $_form["email"]->getControl() ?>

				<?php echo $_form["password"]->getControl() ?>

				<p class="lost-pass"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:Password:"), ENT_COMPAT) ?>
">Zapoměli jste své heslo?</a></p>
				<?php echo $_form["submit"]->getControl() ?>


                        <?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

                </div>
        </div>


</div>

<!-- Registration modal -->
<div id="registrationModal" class="modal fade">
        <div class="modal-dialog">
                <div class="modal-content">
                        <p class="fb-login"><a class="btn fb blue" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("fbLogin-open!"), ENT_COMPAT) ?>
">Facebook přihlášení</a></p>
			<p class="choise">Nebo</p>
                        <?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["regForm"], array()) ?>

				<div class="control-group">
					<?php echo $_form["name"]->getControl() ?>

				</div>
				<div class="control-group">
					<?php echo $_form["surname"]->getControl() ?>

				</div>
				<div class="control-group">
					<?php echo $_form["mail"]->getControl() ?>

				</div>
				<div class="control-group">
					<?php echo $_form["password"]->getControl() ?>

				</div>
				<div class="control-group">
					<?php echo $_form["password_ver"]->getControl() ?>

				</div>
				<?php echo $_form["submit"]->getControl() ?>

                        <?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

                </div>
        </div>
</div>

<!-- Please Register modal -->
<div id="pleaseLoginModal" class="modal fade">
        <div class="modal-dialog">
                <div class="modal-content">
			<p class="modal-info">Nejprve se prosím zaregistrujte nebo prihlaště.</p>
                        <p class="fb-login"><a class="btn fb blue" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("fbLogin-open!"), ENT_COMPAT) ?>
">Facebook přihlášení</a></p>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<p class="col-md-6"><a href="#" data-toggle="modal" class="btn orange" data-target="#registrationModal"  data-dismiss="modal">Registrace</a></p>
						<p class="col-md-6"><a href="#" data-toggle="modal" class="btn orange" data-target="#loginModal" data-dismiss="modal">Přihlášení</a></p>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
        </div>
</div>