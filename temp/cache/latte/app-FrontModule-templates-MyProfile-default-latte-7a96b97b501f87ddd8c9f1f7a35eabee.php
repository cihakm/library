<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/MyProfile/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5466403835', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb5e1fc85fa0_content')) { function _lb5e1fc85fa0_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container account">
        <h2><span>Můj</span> účet</h2>
	<nav>
		<div class="col-md-6 col-sm-6 text-center">
			<p><a class="btn orange" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:MyProfile:myBooks"), ENT_COMPAT) ?>
">Mé výpůjčky</a></p>
		</div>
		<div class="col-md-6 col-sm-6 text-center">
			<p><a class="btn orange" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:MyProfile:myData"), ENT_COMPAT) ?>
">Mé osobní údaje</a></p>
		</div>
		<div class="clearfix"></div>
	</nav>

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