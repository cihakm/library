<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/MyProfile/myData.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9116897715', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb7c78eb6b5a_content')) { function _lb7c78eb6b5a_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container account">
        <h2><span>Můj</span> účet</h2>
	<div class="row">

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
	</div>
<?php $iterations = 0; foreach ($mydata as $mydata) { ?>
		<p><?php echo Latte\Runtime\Filters::escapeHtml($mydata->name, ENT_NOQUOTES) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml($mydata->surname, ENT_NOQUOTES) ?></p>
		<p><?php echo Latte\Runtime\Filters::escapeHtml($mydata->email, ENT_NOQUOTES) ?></p>
		<p><?php echo Latte\Runtime\Filters::escapeHtml($mydata->street, ENT_NOQUOTES) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml($mydata->house_number, ENT_NOQUOTES) ?></p>
		<p><?php echo Latte\Runtime\Filters::escapeHtml($mydata->city, ENT_NOQUOTES) ?>
, <?php echo Latte\Runtime\Filters::escapeHtml($mydata->post_id, ENT_NOQUOTES) ?></p>
<?php $iterations++; } ?>
	<div class="col-md-6">
		<div class="row">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<p><a class="btn orange edit" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:MyProfile:editMyData"), ENT_COMPAT) ?>
">Editovat mé údaje</a></p>
				</div>
				<div class="col-md-6 col-sm-6">
					<p><a class="btn orange editPass" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:MyProfile:editPassword"), ENT_COMPAT) ?>
">Zadat nové heslo</a></p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

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