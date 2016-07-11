var populateDisplayTable = function () {

    $('#display-all-table tbody').html('<tr></tr>');

    $.getJSON('http://localhost:91/index.php/customer/', function (data) {
        $.each(data, function (e) {
            $('#display-all-table tbody tr:last').after(
                '<tr>' +
                '<td>' + this.customer_id + '</td>' +
                '<td>' + this.CompanyName + '</td>' +
                '<td>' + this.ContactTitle + '</td>' +
                '<td>' + this.Address + '</td>' +
                '<td>' + this.City + '</td>' +
                '<td>' + '<a class="edit-button" href="#" ' +
                'data-customer_id="' + this.customer_id + '"' +
                'data-CompanyName="' + this.CompanyName + '"' +
                'data-ContactName="' + this.ContactName + '"' +
                'data-ContactTitle="' + this.ContactTitle + '"' +
                'data-Address="' + this.Address + '"' +
                'data-City="' + this.City + '"' +
                'data-region="' + this.region + '"' +
                'data-postal_code="' + this.postal_code + '"' +
                'data-country="' + this.country + '"' +
                'data-phone="' + this.phone + '"' +
                'data-fax="' + this.fax + '"' +
                '>edit</a>' + '</td>' +
                '</tr>');
        });

        enableEditButton();
    });
};

var enableEditButton = function () {
    $('.edit-button').on('click', function () {
        $('#edit-contact-form')[0].reset();//Remove all the old data
        $('#edit-contact-form .customer_id').val($(this).data('customer_id'));
        $('#edit-contact-form .CompanyName').val($(this).data('companyname'));
        $('#edit-contact-form .ContactName').val($(this).data('contactname'));
        $('#edit-contact-form .ContactTitle').val($(this).data('contacttitle'));
        $('#edit-contact-form .Address').val($(this).data('address'));
        $('#edit-contact-form .City').val($(this).data('city'));
        $('#edit-contact-form .region').val($(this).data('region'));
        $('#edit-contact-form .postal_code').val($(this).data('postal_code'));
        $('#edit-contact-form .Country').val($(this).data('country'));
        $('#edit-contact-form .Phone').val($(this).data('phone'));
        $('#edit-contact-form .fax').val($(this).data('fax'));
        $('#editCustomerModal').modal('show');
    });
};

$('#new-contact-submit').on('click', function () {
    $.post('http://localhost:91/index.php/customer/',
        {
            CompanyName: $('#CompanyName').val(),
            ContactName: $('#ContactName').val(),
            ContactTitle: $('#ContactTitle').val(),
            Address: $('#Address').val(),
            City: $('#City').val(),
            region: $('#region').val(),
            postal_code: $('#postal_code').val(),
            country: $('#country').val(),
            phone: $('#phone').val(),
            fax: $('#fax').val()
        }
    );

    populateDisplayTable();
});

$('#edit-contact-submit').on('click', function () {
    $.ajax({
        url: 'http://localhost:91/index.php/customer/' + $('#edit-contact-form .customer_id').val(),
        method: 'PUT',
        data: {
            customer_id: $('#edit-contact-form .customer_id').val(),
            CompanyName: $('#edit-contact-form .CompanyName').val(),
            ContactName: $('#edit-contact-form .ContactName').val(),
            ContactTitle: $('#edit-contact-form .ContactTitle').val(),
            Address: $('#edit-contact-form .Address').val(),
            City: $('#edit-contact-form .City').val(),
            Region: $('#edit-contact-form .region').val(),
            Postal_code: $('#edit-contact-form .postal_code').val(),
            Country: $('#edit-contact-form .Country').val(),
            Phone: $('#edit-contact-form .Phone').val(),
            Fax: $('#edit-contact-form .fax').val()
        },
        success: function () {
            $('#editCustomerModal').modal('hide');
            populateDisplayTable();
        },
        error: function () {
            alert('failure! Please try again.');
        }
    });
});

$('#delete-contact').on('click', function () {
    $.ajax({
        url: 'http://localhost:91/index.php/customer/' + $('#edit-contact-form .customer_id').val(),
        method: 'DELETE',
        success: function () {
            $('#editCustomerModal').modal('hide');
            populateDisplayTable();
        },
        error: function () {
            alert('failure! Please try again.');
        }
    });
});

//On load scripts
populateDisplayTable();