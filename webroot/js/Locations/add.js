$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#country-id').on('change', function () {
        var countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'country_id=' + countryId,
                success: function (cities) {
                    $select = $('#city-id');
                    $select.find('option').remove();
                    $.each(cities, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#city-id').html('<option value="">Select City first</option>');
        }
    });
});


