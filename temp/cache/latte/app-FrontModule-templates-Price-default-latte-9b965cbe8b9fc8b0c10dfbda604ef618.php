<?php
// source: C:\xampp\htdocs\library\app\FrontModule/templates/Price/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5055753656', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb49b3ba8c7d_content')) { function _lb49b3ba8c7d_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container price">
        <h2><span>Ceník služeb</span> knihovny Hradec Králové</h2>
        <table>
            <tr>
                <th colspan="2">Registrační poplatek na jeden rok (12 měsíců)</th>
            </tr>
            <tr>
                <td>Dospělí</td>
                <td>200,- Kč</td>
            </tr>
            <tr>
                <td>Studenti do 26 let</td>
                <td>100,- Kč</td>
            </tr>
            <tr>
                <td>Senioři nad 60 let</td>
                <td>100,- Kč</td>
            </tr>
            <tr>
                <td>Osoby se zdravotním postižením (držitelé průkazu ZTP a ZTP-P)</td>
                <td>100,- Kč</td>
            </tr>
            <tr>
                <td>Dítě</td>
                <td>65,- Kč</td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="2">Sankční poplatky za každou knihovní jednotku zvlášť</th>
            </tr>
            <tr>
                <td>Za nedodržení výpůjční lhůty - 1. Upomínka</td>
                <td>10,- Kč</td>
            </tr>
            <tr>
                <td>Za nedodržení výpůjční lhůty - 2. Upomínka</td>
                <td>20,- Kč</td>
            </tr>
            <tr>
                <td>Za nedodržení výpůjční lhůty - 3. Upomínka</td>
                <td>30,- Kč</td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="2">Placené informační služby</th>
            </tr>
            <tr>
                <td>Poplatek při zadání rešerše</td>
                <td>40,- Kč</td>
            </tr>
            <tr>
                <td>Kopie dříve zpracované rešerše za 1 stranu A4</td>
                <td>2,- Kč</td>
            </tr>
        </table>
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