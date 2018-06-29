$(document).ready(function() {
  function isNotEmpty(caller) {
      if (caller.val() == '') {
          caller.css('border', '1px solid red');
          return false;
      } else {
          caller.css('border', '');
      }
      return true;
  }

  $("#btnSubmit").click(function() {
    var radio1 = $("#inlineRadio1");
    var radio2 = $("#inlineRadio2");
    var list = $("#list");
    var inputDate = $('#datepicker');
    var balance = $("#balance");
    if (isNotEmpty(list) && isNotEmpty(balance)) {
      $.post('ajax.php', {
        key: 'addNew',
        list: list.val(),
        inputDate: inputDate.val(),
        balance: balance.val()
      }, function(data, textStatus, xhr) {
       alert(data);
      });
    }
  });
});