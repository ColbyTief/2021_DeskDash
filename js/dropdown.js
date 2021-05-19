$('#state').on('change', function() {
    $('#city').html('');
    if($('#state').val()=='Wisconsin'){
        $('#city').append('<option value="Eau Claire">Eau Claire</option>');
        $('#city').append('<option value="Madison">Madison</option>');
        $('#city').append('<option value="Superior">Superior</option>');
        $('#city').append('<option value="Milwaukee">Milwaukee</option>');
        $('#city').append('<option value="Madison">Madison</option>');
        $('#city').append('<option value="Ashland">Ashland</option>');
    }else if($('#state').val()=='Minnesota'){
        $('#city').append('<option value="Minneapolis">Minneapolis</option>');
        $('#city').append('<option value="St. Cloud">St. Cloud</option>');
        $('#city').append('<option value="Duluth">Duluth</option>');
        $('#city').append('<option value="Brainerd">Brainerd</option>');
    }else if($('#state').val()=='Michigan'){
        $('#city').append('<option value="Houghton">Houghton</option>');
        $('#city').append('<option value="Lansing">Lansing</option>');
        $('#city').append('<option value="Detroit">Detroit</option>');
    }
});