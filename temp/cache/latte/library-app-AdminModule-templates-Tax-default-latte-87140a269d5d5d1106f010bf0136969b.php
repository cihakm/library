<?php
// source: C:\xampp\htdocs\library\app\AdminModule/templates/Tax/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('1466114598', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbebf622d5b5_content')) { function _lbebf622d5b5_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2 class="pull-left">Ceník</h2>
<div class="pull-right">
	<a class="btn" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Admin:Tax:edit"), ENT_COMPAT) ?>
">Editovat stránku</a>
</div>
<div class="clearfix"></div>
<?php echo $tax->content ?>

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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 