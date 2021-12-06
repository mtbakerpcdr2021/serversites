$(function () {
  $('.material-form .form-group').each(function() {
    var $parent = $(this);
    var $highlight = $('<span>').addClass('form-highlight');
    var $bar = $('<span>').addClass('form-bar');
    $('.form-control', $parent).after($highlight).after($bar);
  });
});
