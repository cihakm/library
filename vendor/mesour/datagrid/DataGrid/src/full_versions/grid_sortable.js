(function($) {
    $(document).ready(function() {
        $('tbody.sortable').nestedSortable({
            disableNesting: 'no-child',
            forcePlaceholderSize: true,
            autoScroll: true,
            handle: 'a.handler',
            listType: 'tbody',
            helper: 'clone',
            items: 'tr',
            maxLevels: $('a#sort_href').attr("title"),
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> td',
            stop: function(a, b) {
                var item_id = b.item.attr('id').split('-');
                var $this = $(this);
                var data = {
                    serialized: $this.nestedSortable('serialize'),
                    item: item_id[item_id.length-1]
                };
                var gridName = $this.closest('[data-mesour-grid]').attr('data-mesour-grid');
                $.get(mesour.getUrlWithParam(gridName, $this.attr("data-sort-href"), 'sortable', 'sortable_data', data), function(data) {

                });
            },
            start: function(a, b) {
                var sorted;
                if (b.placeholder.is('tr') && sorted == undefined)
                {
                    var x = 0;
                    $('thead tr th', $(a.currentTarget).closest('table')).each(function() {
                        x++;
                        $('td:nth-child(' + x + ')', b.helper).css('width', $(this).width());
                    });

                    b.placeholder.append($('<td colspan="' + $('tr:first-child td', $(a.currentTarget)).length + '">&nbsp;</td>'));
                    $(b.placeholder).find('td').css('height', $(a.currentTarget).find('tr .thumbnailx').outerHeight() - 9);

                    sorted = true;
                } else if (sorted == true) {
                    sorted = false;
                }
            }
        });
    });
})(jQuery);