<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/footer.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9043601448', 'html')
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
	<div class="footer">
		<div class="container">
			<footer>
				<p>Vytvořeno pouze pro studijní účely</p>
			</footer>
		</div>
	</div>
</section>