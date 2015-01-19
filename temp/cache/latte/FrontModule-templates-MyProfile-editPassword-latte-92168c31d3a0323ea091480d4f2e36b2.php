<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/MyProfile/editPassword.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5123332459', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb3f9d1be0bc_content')) { function _lb3f9d1be0bc_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
        <h2><span>Můj</span> účet</h2>
<?php $_l->tmp = $_control->getComponent("passwordForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
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
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 