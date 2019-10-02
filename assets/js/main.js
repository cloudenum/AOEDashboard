const baseUrl = (uri = "", api = false) => {
    return api ? "http://indiarkmedia.com/api/v2/" + uri : "http://localhost/amikomexam/" + uri;
} 

const timedLog = (message) => {
    date = new Date();
    console.log(`[${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}] ${message}`);
}

var xhrPool = [];
$(document).ajaxSend(function(e, jqXHR, options){
    xhrPool.push(jqXHR);
});

$(document).ajaxComplete(function(e, jqXHR, options) {
    xhrPool = $.grep(xhrPool, function(x){return x!=jqXHR});
});

xhrPool.abortAll = function() {
    $.each(xhrPool, function(idx, jqXHR) {
        jqXHR.abort();
        console.log(`[${idx}] Request aborted`)
    });
};

// Relogin purpose
if(typeof Cookies.get('access_token') === "undefined") {
    xhrPool.abortAll();
    timedLog('Relogin attempt ...')
    $.ajax({
        method: 'POST',
        url: baseUrl('authenticate', true),
        data: {
            login: Cookies.get('username'),
            password: Cookies.get('access_gate'),
        },
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }).done((data, textStatus, xhr) => {
        try {
            if (xhr.statusText === "OK") {
                const inAnHour = 1/24;
                window.location.reload();
                Cookies.set('access_token', data.data.access_token, { expires: inAnHour });
                Cookies.set('user_id', data.data.id, { expires: inAnHour });
                timedLog('Relogin success.');
            } else {
                Swal.fire("Went wrong", xhr.statusText, 'error');
            }
        } catch (e) {
            xhrPool.abortAll();
            console.log(e.message);
        }
    }).fail((xhr) => {
        try {
            xhrPool.abortAll();
            
            let messages = '';
            for (let k in xhr.responseJSON.meta.message) {
                messages = messages + '<br/>' + xhr.responseJSON.meta.message[k];
            }

            timedLog('Relogin failed.');
            Swal.fire(xhr.statusText, messages, 'warning');
        } catch (e) {
            console.log(e.message);
        }
    });
}

async function fetchGetData(url = '', data = {}) {
    var esc = encodeURIComponent;
    var query = Object.keys(data)
        .map(k => esc(k) + '=' + esc(data[k]))
        .join('&');

    // Default options are marked with *
    const response = await fetch(url + '?' + query, {
      method: 'GET', // *GET, POST, PUT, DELETE, etc.
      mode: 'cors', // no-cors, *cors, same-origin
      credentials: 'include', // include, *same-origin, omit
      headers: {
        'Authorization' : 'Bearer ' + Cookies.get('access_token')
      },
      
    });
 
    return await response.json(); // parses JSON response into native JavaScript objects
}

async function fetchPostData(url = '', data = {}) {
    // Default options are marked with *
    const response = await fetch(url, {
      method: 'POST', // *GET, POST, PUT, DELETE, etc.
      mode: 'cors', // no-cors, *cors, same-origin
      cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
      credentials: 'include', // include, *same-origin, omit
      headers: {
        'Authorization' : 'Bearer ' + Cookies.get('access_token')
      },
      body: data // body data type must match "Content-Type" header
    });
 
    return await response.json(); // parses JSON response into native JavaScript objects
}

$(function() {
    $('.custom-file-input').each(function() {
		var $input	 = $(this),
			$label	 = $input.next('label'),
			labelVal = $label.html();

		$input.on('change', function(e) {
			var fileName = '';

			// if( this.files && this.files.length > 1 )
			// 	fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            // else
            if (e.target.value)
				fileName = e.target.value.split('\\').pop();

			if (fileName)
				$label.html(fileName);
			else
				$label.html(labelVal);
		});

		// Firefox bug fix
		// $input
		// .on('focus', function(){ $input.addClass( 'has-focus' ); })
		// .on('blur', function(){ $input.removeClass( 'has-focus' ); });
	});
});
jQuery.support.cors = true;
