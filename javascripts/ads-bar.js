	jQuery.cookie = function(name, value, time) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        mul = 0;
        if (value === null) {
            value = '';
            mul = -100;
            time = 0;
        }

        var expires = '';
        if (time && (typeof time == 'number' || time.toUTCString)) {
            var date;
            if (typeof time == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (((mul * 24 * 60 * 60)+time) * 1000));
            } else {
                date = time;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = '';
        var domain = '';
        var secure = '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
	
	       
    function HideAd(p){
      $.cookie('P-A-AD', 'noad', 180);   
  		$("#advertisement").hide(1000);
  	}