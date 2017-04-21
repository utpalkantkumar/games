(function($) {
$.fn.placeholder = function() {
if(typeof document.createElement("input").placeholder == 'undefined') {
$('[placeholder]').focus(function() {
var input = $(this);
if (input.val() == input.attr('placeholder')) {
input.val('');
input.removeClass('placeholder');
$(this).css('color','#666')
}
}).blur(function() {
var input = $(this);
if (input.val() == '' || input.val() == input.attr('placeholder')) {
input.addClass('placeholder');
input.val(input.attr('placeholder'));
$(this).css('color','#666')
}
}).blur().parents('form').submit(function() {
$(this).find('[placeholder]').each(function() {
var input = $(this);
if (input.val() == input.attr('placeholder')) {
input.val('');
$(this).css('color','#666')
}
})
});
}
}

})(jQuery);
// JavaScript Document