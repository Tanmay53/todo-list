/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
$(function () {
  $("#prioritySelector").on("change", function (event) {
    updateFlagColor();
  });
  $("#taskDeleteModal").on('show.bs.modal', function (event) {
    button = $(event.relatedTarget);
    $("#taskDeleteForm").attr('action', '/task/delete/' + button.data('taskid'));
    $("#deleteTaskName").text(button.data('taskname'));
  });
  function updateFlagColor() {
    $("#priorityFlag").removeClass(['text-muted', 'text-danger', 'text-warning', 'text-primary']);
    new_class = "";
    switch ($("#prioritySelector").val()) {
      case 'high':
        new_class = "text-danger";
        break;
      case 'medium':
        new_class = "text-warning";
        break;
      case 'low':
        new_class = "text-primary";
        break;
      default:
        new_class = "text-muted";
    }
    $("#priorityFlag").addClass(new_class);
  }
  updateFlagColor();
});
/******/ })()
;