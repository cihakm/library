<?php
// source: C:\xampp\htdocs\library\app\AdminModule/templates/Texts/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3972978253', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lba299eebeaa_content')) { function _lba299eebeaa_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2 class="pull-left">Aktuality</h2>

<div class="clearfix"></div>
<div id="<?php echo $_control->getSnippetId('dataGrid') ?>"><?php call_user_func(reset($_b->blocks['_dataGrid']), $_b, $template->getParameters()) ?>
</div>
<?php
}}

//
// block _dataGrid
//
if (!function_exists($_b->blocks['_dataGrid'][] = '_lb69908bdb5f__dataGrid')) { function _lb69908bdb5f__dataGrid($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('dataGrid', FALSE)
;$_l->tmp = $_control->getComponent("textDataGrid"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;
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