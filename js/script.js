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
        var list = $("#list");
        var inputDate = $('#datepicker');
        var balance = $("#balance");
        var checked_radio = $('input:radio[name=inlineRadioOptions]:checked').val();

        if (isNotEmpty(list) && isNotEmpty(balance) && checked_radio == 'option1') {
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'income',
                    list: list.val(),
                    inputDate: inputDate.val(),
                    balance: balance.val()
                },
                success: function(response) {
                    alert(response);
                }
            });
        } else if (isNotEmpty(list) && isNotEmpty(balance) && checked_radio == 'option2') {
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'moneyout',
                    list: list.val(),
                    inputDate: inputDate.val(),
                    balance: balance.val()
                },
                success: function(response) {
                    alert(response);
                }
            });
        }
    });
});