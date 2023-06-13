$(document).ready(function() {
    $('#class_select').change(function() {
        var classId = $(this).val();
        if (classId  == '') {
            $("#subject_select").html('');
            return ;
        }
        $.ajax({
            url: '/ajax-class',
            type: 'GET',
            data: {
                'classId': classId
            },
            success: function(response) {
                if(response.status == 200) {
                    var html = '';
                    if (Array.isArray(classId)) {
                        for (var subject of response.subjects) {
                            html += `<option value='${subject.id}'>${subject.title} - ${subject.class_title}</option>`;
                        }
                    } else {
                        html += '<option value="">Chọn môn</option>';
                        for (var subject of response.subjects) {
                            html += `<option value='${subject.id}'>${subject.title}</option>`;
                        }
                    }
                    html += '</option>';
                    $("#subject_select").html(html);
                }
            }
        });
    });

    $('#city_select').change(function() {
        var cityId = $(this).val();
        if (cityId == '') {
            $("#district_select").html('<option value="">Chọn khu vực dạy</option>');
            return ;
        }
        $.ajax({
            url: '/ajax-city',
            type: 'GET',
            data: {
                'cityId': cityId
            },
            success: function(response) {
                if(response.status == 200) {
                    var html = '';
                    for (var district of response.districts) {
                        html += `<option value='${district.id}'>${district.name}</option>`;
                    }
                    html += '</option>';
                    $("#district_select").html(html);
                }
            }
        });
    });
});