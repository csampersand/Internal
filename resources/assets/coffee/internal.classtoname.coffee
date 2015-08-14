$(document).ready ->
    $('#type').change ->
        unless $(this).val() is 0
            $('#name').val($('option[value=' + $(this).val() + ']').text())