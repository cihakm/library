<?php
// source: C:\xampp\htdocs\library\app\AdminModule/templates/Sign/in.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9634783674', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb0160308310_title')) { function _lb0160308310_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Knihovna HK | Admin | Login<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb1902a17df2_content')) { function _lb1902a17df2_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="login-form">
	<h2>Přihlášení do administrace</h2>
	<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["signInForm"], array()) ?>

		<div class="form-group">
			<?php echo $_form["username"]->getControl() ?>

			<?php if ($_label = $_form["username"]->getLabel()) echo $_label->addAttributes(array('class'=> "noTransition"))  ?>


		</div>
		<div class="form-group">
			<?php echo $_form["password"]->getControl() ?>

			<?php if ($_label = $_form["password"]->getLabel()) echo $_label  ?>


		</div>
		<div class="form-group">
			<?php echo $_form["submit"]->getControl() ?>

		</div>
	<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

</div>
<?php
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lb51ccc98343_scripts')) { function _lb51ccc98343_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/design-admin/js/jquery.js"></script>

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
call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars()) ; 