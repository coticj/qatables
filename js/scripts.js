$(document).ready(function() {

    $('#reset').click(function() {
        $('input:checkbox').removeAttr('checked');
    });

    $('#apply').click(function() {
        $.post("process_phones.php", $("#phones").serialize()).done(function(data) {
            alert(data);
        });
    });

});