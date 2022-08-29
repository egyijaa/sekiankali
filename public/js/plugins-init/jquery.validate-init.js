jQuery(".form-valide").validate({
    rules: {
        "val-username": {
            required: !0,
            minlength: 3
        },
        "val-email": {
            required: !0,
            email: !0
        },
        "val-password": {
            required: !0,
            minlength: 5
        },
        "val-confirm-password": {
            required: !0,
            equalTo: "#val-password"
        },
        "val-select2": {
            required: !0
        },
        "val-select2-multiple": {
            required: !0,
            minlength: 2
        },
        "val-suggestions": {
            required: !0,
            minlength: 5
        },
        "val-skill": {
            required: !0
        },
        "val-currency": {
            required: !0,
            currency: ["$", !0]
        },
        "val-website": {
            required: !0,
            url: !0
        },
        "val-phoneus": {
            required: !0,
            phoneUS: !0
        },
        "val-digits": {
            required: !0,
            digits: !0
        },
        "val-number": {
            required: !0,
            number: !0
        },
        "val-range": {
            required: !0,
            range: [1, 5]
        },
        "val-terms": {
            required: !0
        }
    },
    messages: {
        "val-username": {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 3 characters"
        },
        "val-email": "Please enter a valid email address",
        "val-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        "val-confirm-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        "val-select2": "Please select a value!",
        "val-select2-multiple": "Please select at least 2 values!",
        "val-suggestions": "What can we do to become better?",
        "val-skill": "Please select a barang!",
        "val-currency": "Please enter a price!",
        "val-website": "Please enter your website!",
        "val-phoneus": "Please enter a US phone!",
        "val-digits": "Please enter only digits!",
        "val-number": "Please enter a number!",
        "val-range": "Please enter a number between 1 and 5!",
        "val-terms": "You must agree to the service terms!"
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});


jQuery(".form-valide-with-icon").validate({
    rules: {
        "val-kode": {
            required: !0,
            minlength: 3
        },
        "val-nama": {
            required: !0,
            minlength: 1
        },
        "val-username": {
            required: !0,
            minlength: 3
        },
        "val-telepon": {
            required: !0,
            minlength: 10,
            digits: !0
        },
        "val-password": {
            required: !0,
            minlength: 5
        },
        "val-terms": {
            required: !0
        },
        "val-harga": {
            required: !0,
            digits: !0
        },
        "val-kuantiti": {
            required: !0,
            digits: !0
        }
    },
    messages: {
        "val-kode": {
            required: "Please enter kode",
            minlength: "Your kode must consist of at least 3 characters"
        },
        "val-nama": {
            required: "Please enter a name",
            minlength: "Your username must consist of at least 1 characters"
        },
        "val-username": {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 3 characters"
        },
        "val-telepon": {
            required: "Please provide a phone number",
            minlength: "Your phone number format is not correct",
            digits: "Please enter only digits!",
        },
        "val-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        "val-harga": {
            required: "Please provide a price",
            digits: "Please enter only digits!"
        },
        "val-kuantiti": {
            required: "Please provide a kuantiti",
            digits: "Please enter only digits!"
        },
        "val-terms": "You must agree to the service terms!"
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }




});

jQuery(".form-valide-with-icon-update").validate({
    rules: {
        "kode": {
            required: !0,
            minlength: 3
        },
        "nama": {
            required: !0,
            minlength: 1
        },
        "username": {
            required: !0,
            minlength: 3
        },
        "telp": {
            required: !0,
            minlength: 10,
            digits: !0
        },
        "password": {
            required: !0,
            minlength: 5
        },
        "terms": {
            required: !0
        },
        "harga": {
            required: !0,
            digits: !0
        },
        "kuantiti": {
            required: !0,
            digits: !0
        }
    },
    messages: {
        "kode": {
            required: "Please enter kode",
            minlength: "Your kode must consist of at least 3 characters"
        },
        "nama": {
            required: "Please enter a name",
            minlength: "Your username must consist of at least 1 characters"
        },
        "username": {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 3 characters"
        },
        "telp": {
            required: "Please provide a phone number",
            minlength: "Your phone number format is not correct",
            digits: "Please enter only digits!",
        },
        "password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        "harga": {
            required: "Please provide a price",
            digits: "Please enter only digits!"
        },
        "kuantiti": {
            required: "Please provide a kuantiti",
            digits: "Please enter only digits!"
        },
        "terms": "You must agree to the service terms!"
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }




});

jQuery(".form-valide-transaksi").validate({
    rules: {
        "kode": {
            required: !0,
            minlength: 3
        },
        "nama": {
            required: !0,
            minlength: 1
        },
        "password": {
            required: !0,
            minlength: 5
        },
        "terms": {
            required: !0
        },
        "hargaBandrol": {
            required: !0,
            digits: !0
        },
        "diskonKecil": {
            required: !0,
            digits: !0
        },
        "hargaDiskon": {
            required: !0,
            digits: !0
        },
        "total": {
            required: !0,
            digits: !0
        },
        "subTotal": {
            required: !0,
            digits: !0
        },
        "diskonAkhir": {
            required: !0,
            digits: !0
        },
        "ongkir": {
            required: !0,
            digits: !0
        },
        "totalBayar": {
            required: !0,
            digits: !0
        },
        "qty": {
            required: !0,
            digits: !0
        }
    },
    messages: {
        "val-skill": {
            required: !0
        },
        "kode": {
            required: "Please enter kode",
            minlength: "Your kode must consist of at least 3 characters"
        },
        "nama": {
            required: "Please enter a name",
            minlength: "Your username must consist of at least 1 characters"
        },
        "hargaBandrol": {
            required: "Please provide a price",
            digits: "Please enter only digits!"
        },
        "diskonKecil": {
            digits: "Please enter only digits!"
        },
        "hargaDiskon": {
            required: "Please provide a price",
            digits: "Please enter only digits!"
        },
        "total": {
            required: "Please provide a price",
            digits: "Please enter only digits!"
        },
        "subTotal": {
            required: "Please provide a price",
            digits: "Please enter only digits!"
        },
        "diskonAkhir": {
            digits: "Please enter only digits!"
        },
        "ongkir": {
            required: "Please provide a price",
            digits: "Please enter only digits!"
        },
        "totalBayar": {
            required: "Please provide a price",
            digits: "Please enter only digits!"
        },
        "qty": {
            required: "Please provide a kuantiti",
            digits: "Please enter only digits!"
        },
        "terms": "You must agree to the service terms!",
        "val-skill": "Please select a barang!",
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }




});