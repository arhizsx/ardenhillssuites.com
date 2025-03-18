<script>

jQuery(document).ready(function ($) {

    jQuery(function($) {

    // Phone
    var eb_countries = []
    eb_countries = {
        "af": "<?php echo __('Afghanistan', 'eagle-booking') ?>",
        "al": "<?php echo __('Albania', 'eagle-booking') ?>",
        "dz": "<?php echo __('Algeria‬', 'eagle-booking') ?>",
        "as": "<?php echo __('American Samoa', 'eagle-booking') ?>",
        "ad": "<?php echo __('Andorra', 'eagle-booking') ?>",
        "ao": "<?php echo __('Angola', 'eagle-booking') ?>",
        "ai": "<?php echo __('Anguilla', 'eagle-booking') ?>",
        "ag": "<?php echo __('Antigua and Barbuda', 'eagle-booking') ?>",
        "ar": "<?php echo __('Argentina', 'eagle-booking') ?>",
        "am": "<?php echo __('Armenia', 'eagle-booking') ?>",
        "aw": "<?php echo __('Aruba', 'eagle-booking') ?>",
        "au": "<?php echo __('Australia', 'eagle-booking') ?>",
        "at": "<?php echo __('Austria', 'eagle-booking') ?>",
        "az": "<?php echo __('Azerbaijan', 'eagle-booking') ?>",
        "bs": "<?php echo __('Bahamas', 'eagle-booking') ?>",
        "bh": "<?php echo __('Bahrain', 'eagle-booking') ?>",
        "bd": "<?php echo __('Bangladesh', 'eagle-booking') ?>",
        "bb": "<?php echo __('Barbados', 'eagle-booking') ?>",
        "by": "<?php echo __('Belarus', 'eagle-booking') ?>",
        "be": "<?php echo __('Belgium', 'eagle-booking') ?>",
        "bz": "<?php echo __('Belize', 'eagle-booking') ?>",
        "bj": "<?php echo __('Benin', 'eagle-booking') ?>",
        "bm": "<?php echo __('Bermuda', 'eagle-booking') ?>",
        "bt": "<?php echo __('Bhutan', 'eagle-booking') ?>",
        "bo": "<?php echo __('Bolivia', 'eagle-booking') ?>",
        "ba": "<?php echo __('Bosnia and Herzegovina', 'eagle-booking') ?>",
        "bw": "<?php echo __('Botswana', 'eagle-booking') ?>",
        "br": "<?php echo __('Brazil', 'eagle-booking') ?>",
        "io": "<?php echo __('British Indian Ocean Territory', 'eagle-booking') ?>",
        "vg": "<?php echo __('Virgin Islands, British', 'eagle-booking') ?>",
        "bn": "<?php echo __('Brunei Darussalam', 'eagle-booking') ?>",
        "bg": "<?php echo __('Bulgaria', 'eagle-booking') ?>",
        "bf": "<?php echo __('Burkina Faso', 'eagle-booking') ?>",
        "bi": "<?php echo __('Burundi', 'eagle-booking') ?>",
        "kh": "<?php echo __('Cambodia', 'eagle-booking') ?>",
        "cm": "<?php echo __('Cameroon', 'eagle-booking') ?>",
        "ca": "<?php echo __('Canada', 'eagle-booking') ?>",
        "cv": "<?php echo __('Cape Verde', 'eagle-booking') ?>",
        "bq": "<?php echo __('Caribbean Netherlands', 'eagle-booking') ?>",
        "ky": "<?php echo __('Cayman Islands', 'eagle-booking') ?>",
        "cf": "<?php echo __('Central African Republic', 'eagle-booking') ?>",
        "td": "<?php echo __('Chad', 'eagle-booking') ?>",
        "cl": "<?php echo __('Chile', 'eagle-booking') ?>",
        "cn": "<?php echo __('China', 'eagle-booking') ?>",
        "co": "<?php echo __('Colombia', 'eagle-booking') ?>",
        "km": "<?php echo __('Comoros', 'eagle-booking') ?>",
        "cd": "<?php echo __('Congo', 'eagle-booking') ?>",
        "cg": "<?php echo __('Congo, The Democratic Republic of The', 'eagle-booking') ?>",
        "ck": "<?php echo __('Cook Islands', 'eagle-booking') ?>",
        "cr": "<?php echo __('Costa Rica', 'eagle-booking') ?>",
        "ci": "<?php echo __("Cote D'ivoire", 'eagle-booking') ?>",
        "hr": "<?php echo __('Croatia', 'eagle-booking') ?>",
        "cu": "<?php echo __('Cuba', 'eagle-booking') ?>",
        "cw": "<?php echo __('Curaçao', 'eagle-booking') ?>",
        "cy": "<?php echo __('Cyprus', 'eagle-booking') ?>",
        "cz": "<?php echo __('Czech Republic', 'eagle-booking') ?>",
        "dk": "<?php echo __('Denmark', 'eagle-booking') ?>",
        "dj": "<?php echo __('Djibouti', 'eagle-booking') ?>",
        "dm": "<?php echo __('Dominica', 'eagle-booking') ?>",
        "do": "<?php echo __('Dominican Republic', 'eagle-booking') ?>",
        "ec": "<?php echo __('Ecuador', 'eagle-booking') ?>",
        "eg": "<?php echo __('Egypt', 'eagle-booking') ?>",
        "sv": "<?php echo __('El Salvador', 'eagle-booking') ?>",
        "gq": "<?php echo __('Equatorial Guinea', 'eagle-booking') ?>",
        "er": "<?php echo __('Eritrea', 'eagle-booking') ?>",
        "ee": "<?php echo __('Estonia', 'eagle-booking') ?>",
        "et": "<?php echo __('Ethiopia', 'eagle-booking') ?>",
        "fk": "<?php echo __('Falkland Islands (Malvinas)', 'eagle-booking') ?>",
        "fo": "<?php echo __('Faroe Islands', 'eagle-booking') ?>",
        "fj": "<?php echo __('Fiji', 'eagle-booking') ?>",
        "fi": "<?php echo __('Finland', 'eagle-booking') ?>",
        "fr": "<?php echo __('France', 'eagle-booking') ?>",
        "gf": "<?php echo __('French Guiana', 'eagle-booking') ?>",
        "pf": "<?php echo __('French Polynesia', 'eagle-booking') ?>",
        "ga": "<?php echo __('Gabon', 'eagle-booking') ?>",
        "gm": "<?php echo __('Gambia', 'eagle-booking') ?>",
        "ge": "<?php echo __('Georgia', 'eagle-booking') ?>",
        "de": "<?php echo __('Germany', 'eagle-booking') ?>",
        "gh": "<?php echo __('Ghana', 'eagle-booking') ?>",
        "gi": "<?php echo __('Gibraltar', 'eagle-booking') ?>",
        "gr": "<?php echo __('Greece', 'eagle-booking') ?> ",
        "gl": "<?php echo __('Greenland', 'eagle-booking') ?>",
        "gd": "<?php echo __('Grenada', 'eagle-booking') ?>",
        "gp": "<?php echo __('Guadeloupe', 'eagle-booking') ?>",
        "gu": "<?php echo __('Guam', 'eagle-booking') ?>",
        "gt": "<?php echo __('Guatemala', 'eagle-booking') ?>",
        "gn": "<?php echo __('Guinea', 'eagle-booking') ?>",
        "gw": "<?php echo __('Guinea-bissau', 'eagle-booking') ?>",
        "gy": "<?php echo __('Guyana', 'eagle-booking') ?>",
        "ht": "<?php echo __('Haiti', 'eagle-booking') ?>",
        "hn": "<?php echo __('Honduras', 'eagle-booking') ?>",
        "hk": "<?php echo __('Hong Kong', 'eagle-booking') ?>",
        "hu": "<?php echo __('Hungary', 'eagle-booking') ?>",
        "is": "<?php echo __('Iceland', 'eagle-booking') ?>",
        "in": "<?php echo __('India', 'eagle-booking') ?>",
        "id": "<?php echo __('Indonesia', 'eagle-booking') ?>",
        "ir": "<?php echo __('Iran, Islamic Republic of', 'eagle-booking') ?>",
        "iq": "<?php echo __('Iraq', 'eagle-booking') ?>",
        "ie": "<?php echo __('Ireland', 'eagle-booking') ?>",
        "il": "<?php echo __('Israel', 'eagle-booking') ?>",
        "it": "<?php echo __('Italy', 'eagle-booking') ?>",
        "jm": "<?php echo __('Jamaica', 'eagle-booking') ?>",
        "jp": "<?php echo __('Japan', 'eagle-booking') ?>",
        "jo": "<?php echo __('Jordan', 'eagle-booking') ?>",
        "kz": "<?php echo __('Kazakhstan', 'eagle-booking') ?>",
        "ke": "<?php echo __('Kenya', 'eagle-booking') ?>",
        "ki": "<?php echo __('Kiribati', 'eagle-booking') ?>",
        "kw": "<?php echo __('Kuwait', 'eagle-booking') ?>",
        "kg": "<?php echo __('Kyrgyzstan', 'eagle-booking') ?>",
        "la": "<?php echo __('Kyrgyzstan', 'eagle-booking') ?>",
        "lv": "<?php echo __('Latvia', 'eagle-booking') ?>",
        "lb": "<?php echo __('Lebanon', 'eagle-booking') ?>",
        "ls": "<?php echo __('Lesotho', 'eagle-booking') ?>",
        "lr": "<?php echo __('Liberia', 'eagle-booking') ?>",
        "ly": "<?php echo __('Libyan Arab Jamahiriya', 'eagle-booking') ?>",
        "li": "<?php echo __('Liechtenstein', 'eagle-booking') ?>",
        "lt": "<?php echo __('Lithuania', 'eagle-booking') ?>",
        "lu": "<?php echo __('Luxembourg', 'eagle-booking') ?>",
        "mo": "<?php echo __('Macao', 'eagle-booking') ?>",
        "mk": "<?php echo __('North Macedonia', 'eagle-booking') ?>",
        "mg": "<?php echo __('Madagascar', 'eagle-booking') ?>",
        "mw": "<?php echo __('Malawi', 'eagle-booking') ?>",
        "my": "<?php echo __('Malaysia', 'eagle-booking') ?>",
        "mv": "<?php echo __('Maldives', 'eagle-booking') ?>",
        "ml": "<?php echo __('Mali', 'eagle-booking') ?>",
        "mt": "<?php echo __('Malta', 'eagle-booking') ?>",
        "mh": "<?php echo __('Marshall Islands', 'eagle-booking') ?>",
        "mq": "<?php echo __('Martinique', 'eagle-booking') ?>",
        "mr": "<?php echo __('Mauritania', 'eagle-booking') ?>",
        "mu": "<?php echo __('Mauritius', 'eagle-booking') ?>>",
        "mx": "<?php echo __('Mexico', 'eagle-booking') ?>",
        "fm": "<?php echo __('Micronesia, Federated States of', 'eagle-booking') ?>",
        "md": "<?php echo __('Moldova, Republic of', 'eagle-booking') ?>",
        "mc": "<?php echo __('Monaco', 'eagle-booking') ?>",
        "mn": "<?php echo __('Mongolia', 'eagle-booking') ?>",
        "me": "<?php echo __('Montenegro', 'eagle-booking') ?>",
        "ms": "<?php echo __('Montserrat', 'eagle-booking') ?>",
        "ma": "<?php echo __('Morocco', 'eagle-booking') ?>",
        "mz": "<?php echo __('Mozambique', 'eagle-booking') ?>",
        "mm": "<?php echo __('Myanmar', 'eagle-booking') ?>",
        "na": "<?php echo __('Namibia', 'eagle-booking') ?>",
        "nr": "<?php echo __('Nauru', 'eagle-booking') ?>",
        "np": "<?php echo __('Nepal', 'eagle-booking') ?>",
        "nl": "<?php echo __('Netherlands', 'eagle-booking') ?>",
        "nc": "<?php echo __('New Caledonia', 'eagle-booking') ?>",
        "nz": "<?php echo __('New Zealand', 'eagle-booking') ?>",
        "ni": "<?php echo __('Nicaragua', 'eagle-booking') ?>",
        "ne": "<?php echo __('Niger', 'eagle-booking') ?>",
        "ng": "<?php echo __('Nigeria', 'eagle-booking') ?>",
        "nu": "<?php echo __('Niue', 'eagle-booking') ?>",
        "nf": "<?php echo __('Norfolk Island', 'eagle-booking') ?>",
        "kp": "<?php echo __('North Korea', 'eagle-booking') ?>",
        "mp": "<?php echo __('Northern Mariana Islands', 'eagle-booking') ?>",
        "no": "<?php echo __('Norway', 'eagle-booking') ?>",
        "om": "<?php echo __('Oman', 'eagle-booking') ?>",
        "pk": "<?php echo __('Pakistan', 'eagle-booking') ?>",
        "pw": "<?php echo __('Palau', 'eagle-booking') ?>",
        "ps": "<?php echo __('Palestinian Territory, Occupied', 'eagle-booking') ?>",
        "pa": "<?php echo __('Panama', 'eagle-booking') ?>",
        "pg": "<?php echo __('Papua New Guinea', 'eagle-booking') ?>",
        "py": "<?php echo __('Paraguay', 'eagle-booking') ?>",
        "pe": "<?php echo __('Peru', 'eagle-booking') ?>",
        "ph": "<?php echo __('Philippines', 'eagle-booking') ?>",
        "pl": "<?php echo __('Poland', 'eagle-booking') ?>",
        "pt": "<?php echo __('Portugal', 'eagle-booking') ?>",
        "pr": "<?php echo __('Puerto Rico', 'eagle-booking') ?>",
        "qa": "<?php echo __('Qatar', 'eagle-booking') ?>",
        "re": "<?php echo __('Reunion', 'eagle-booking') ?>",
        "ro": "<?php echo __('Romania', 'eagle-booking') ?>",
        "ru": "<?php echo __('Russian Federation', 'eagle-booking') ?>",
        "rw": "<?php echo __('Rwanda', 'eagle-booking') ?>",
        "bl": "<?php echo __('Saint Barthélemy', 'eagle-booking') ?>",
        "sh": "<?php echo __('Saint Helena') ?>",
        "kn": "<?php echo __('Saint Kitts and Nevis', 'eagle-booking') ?>",
        "lc": "<?php echo __('Saint Lucia', 'eagle-booking') ?>",
        "mf": "<?php echo __('Saint Martin', 'eagle-booking') ?>",
        "pm": "<?php echo __('Saint Pierre and Miquelon', 'eagle-booking') ?>",
        "vc": "<?php echo __('Saint Vincent and the Grenadines', 'eagle-booking') ?>",
        "ws": "<?php echo __('Samoa', 'eagle-booking') ?>",
        "sm": "<?php echo __('San Marino', 'eagle-booking') ?>",
        "st": "<?php echo __('Sao Tome and Principe', 'eagle-booking') ?>",
        "sa": "<?php echo __('Saudi Arabia', 'eagle-booking') ?>",
        "sn": "<?php echo __('Senegal', 'eagle-booking') ?>",
        "rs": "<?php echo __('Serbia', 'eagle-booking') ?>",
        "sc": "<?php echo __('Seychelles', 'eagle-booking') ?>",
        "sl": "<?php echo __('Sierra Leone', 'eagle-booking') ?>",
        "sg": "<?php echo __('Singapore', 'eagle-booking') ?>",
        "sx": "<?php echo __('Sint Maarten', 'eagle-booking') ?>",
        "sk": "<?php echo __('Slovakia', 'eagle-booking') ?>",
        "si": "<?php echo __('Slovenia', 'eagle-booking') ?>",
        "sb": "<?php echo __('Solomon Islands', 'eagle-booking') ?>",
        "so": "<?php echo __('Somalia', 'eagle-booking') ?>",
        "za": "<?php echo __('South Africa', 'eagle-booking') ?>",
        "kr": "<?php echo __('South Korea', 'eagle-booking') ?>",
        "ss": "<?php echo __('Sudan', 'eagle-booking') ?>",
        "es": "<?php echo __('Spain', 'eagle-booking') ?>",
        "lk": "<?php echo __('Sri Lanka', 'eagle-booking') ?>",
        "sd": "<?php echo __('Sudan', 'eagle-booking') ?>",
        "sr": "<?php echo __('Suriname', 'eagle-booking') ?>",
        "sz": "<?php echo __('Swaziland', 'eagle-booking') ?>",
        "se": "<?php echo __('Sweden', 'eagle-booking') ?>",
        "ch": "<?php echo __('Switzerland', 'eagle-booking') ?>",
        "sy": "<?php echo __('Syrian Arab Republic', 'eagle-booking') ?>",
        "tw": "<?php echo __('Taiwan, Province of China','eagle-booking') ?>",
        "tj": "<?php echo __('Tajikistan', 'eagle-booking') ?>",
        "tz": "<?php echo __('Tanzania, United Republic of', 'eagle-booking') ?>",
        "th": "<?php echo __('Thailand', 'eagle-booking') ?>",
        "tl": "<?php echo __('Timor-leste', 'eagle-booking') ?>",
        "tg": "<?php echo __('Togo', 'eagle-booking') ?>",
        "tk": "<?php echo __('Tokelau', 'eagle-booking') ?>",
        "to": "<?php echo __('Tonga', 'eagle-booking') ?>",
        "tt": "<?php echo __('Trinidad and Tobago', 'eagle-booking') ?>",
        "tn": "<?php echo __('Tunisia', 'eagle-booking') ?>",
        "tr": "<?php echo __('Turkey', 'eagle-booking') ?>",
        "tm": "<?php echo __('Turkmenistan', 'eagle-booking') ?>",
        "tc": "<?php echo __('Turks and Caicos Islands', 'eagle-booking') ?>",
        "tv": "<?php echo __('Tuvalu', 'eagle-booking') ?>",
        "vi": "<?php echo __('U.S. Virgin Islands', 'eagle-booking') ?>",
        "ug": "<?php echo __('Uganda', 'eagle-booking') ?>",
        "ua": "<?php echo __('Ukraine', 'eagle-booking') ?>",
        "ae": "<?php echo __('United Arab Emirates', 'eagle-booking') ?>",
        "gb": "<?php echo __('United Kingdom', 'eagle-booking') ?>",
        "us": "<?php echo __('United States', 'eagle-booking') ?>",
        "uy": "<?php echo __('Uruguay', 'eagle-booking') ?>",
        "uz": "<?php echo __('Uzbekistan', 'eagle-booking') ?>",
        "vu": "<?php echo __('Vanuatu', 'eagle-booking') ?>",
        "va": "<?php echo __('Vatican City', 'eagle-booking') ?>",
        "ve": "<?php echo __('Venezuela', 'eagle-booking') ?>",
        "vn": "<?php echo __('Viet Nam', 'eagle-booking') ?>",
        "wf": "<?php echo __('Wallis and Futuna', 'eagle-booking') ?>",
        "ye": "<?php echo __('Yemen', 'eagle-booking') ?>",
        "zm": "<?php echo __('Zambia', 'eagle-booking') ?>",
        "zw": "<?php echo __('Zimbabwe', 'eagle-booking') ?>"
    }

    var input = document.querySelectorAll(".eb_user_phone_field");
    var i;

    function eb_phone_ip_lookup(callback) {

        // Check if IP Lookup is enabled
        <?php if ( eb_get_option( 'geo_ip_lookup' ) == true ) : ?>

            $.get("//ipinfo.io?callback=?", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
             if(callback) callback(countryCode);
            });

        <?php else: ?>

            return false

        <?php endif ?>

    }

    for (i = 0; i < input.length; i++) {

        window.intlTelInput(input[i], {

            autoHideDialCode: false,
            autoPlaceholder: "off",
            formatOnDisplay: false,
            geoIpLookup: eb_phone_ip_lookup,
            hiddenInput: "user_phone",
            initialCountry: "auto",
            localizedCountries: eb_countries,
            nationalMode: true,
            preferredCountries: [],
            separateDialCode: true,
            utilsScript: "<?php echo EB_URL ?>/assets/js/utils.js",

        });

    }

});

});
</script>