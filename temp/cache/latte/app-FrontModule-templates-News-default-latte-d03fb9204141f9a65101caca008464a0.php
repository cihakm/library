<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/News/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9228888885', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb7f097a48cf_content')) { function _lb7f097a48cf_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
        <h2><span>Aktuality</span> z knihovny</h2>
<?php $iterations = 0; foreach ($news as $new) { ?>
		<article>
			<header>
				<p class="date"><?php echo Latte\Runtime\Filters::escapeHtml($template->date($new->date, 'd.m.Y'), ENT_NOQUOTES) ?></p>
				<h3><?php echo Latte\Runtime\Filters::escapeHtml($new->title, ENT_NOQUOTES) ?></h3>
			</header>
			<?php echo $new->content ?>

		</article>
<?php $iterations++; } ?>
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