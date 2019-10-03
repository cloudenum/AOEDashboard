const baseUrl = (uri = "", api = false) => {
    return api ? "http://localhost/aoeapi/api/v2/" + uri : "http://localhost/amikomexam/" + uri;
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
    // xhrPool.abortAll();
    timedLog('Relogin attempt ...')
    $.ajax({
        url: baseUrl('login/refresh_token'),
    }).done((data, textStatus, xhr) => {
        try {
            if (xhr.statusText === "OK") {
                // const inAnHour = 1/24;
                // window.location.reload();
                // Cookies.set('access_token', data.data.access_token, { expires: inAnHour });
                // Cookies.set('user_id', data.data.id, { expires: inAnHour });
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

function beforeDDay(d1, d2) {
    return d1.getFullYear() >= d2.getFullYear() &&
      d1.getMonth() >= d2.getMonth() &&
      d1.getDate() > d2.getDate();
}

function sameDay(d1, d2) {
    return d1.getFullYear() === d2.getFullYear() &&
      d1.getMonth() === d2.getMonth() &&
      d1.getDate() === d2.getDate();
}

async function fetchGetData(url = '', data = {}) {
    var esc = encodeURIComponent;
    var query = Object.keys(data)
        .map(key => esc(key) + '=' + esc(data[key]))
        .join('&');
    
    if (query !== '') url += '?';

    // Default options are marked with *
    const response = await fetch(url + query, {
      method: 'GET', // *GET, POST, PUT, DELETE, etc.
      mode: 'cors', // no-cors, *cors, same-origin
      credentials: 'include', // include, *same-origin, omit
      headers: {
        'Authorization' : 'Bearer ' + Cookies.get('access_token')
      },
      
    }).then((res) => {
        if(!res.ok) {
            Swal.fire(res.status + ' ' + res.statusText, ' ', 'error');
        }
        return res;
    }); 
 
    return response.json();
}

async function fetchPostData(url, data = {}) {
    const response = await fetch(url, {
      method: 'POST', 
      mode: 'cors', 
      cache: 'no-cache', 
      credentials: 'include', 
      headers: {
        'Authorization' : 'Bearer ' + Cookies.get('access_token')
      },
      body: data
    }).then((res) => {
        if(!res.ok) {
            Swal.fire(res.status + ' ' + res.statusText, ' ', 'error');
        }
        return res;
    });    
 
    return await response.json();
}


/**
 * Generate table data from remote source in an existing table element 
 * data.columns = {}
 * data.fetchQuery = {}
 * @param {JQuery} tableJqElement 
 * @param {String} url 
 * @param {Object} thead 
 * @param {Object} data 
 */
async function fetchTable(tableJqElement, url, options = {}) {

    if (options.thead != null){
        tableJqElement.children('thead').children().remove();
        options.thead.forEach(value => {
            tableJqElement.children('thead').append(
                $('<th>').text(value)
            );
        });
    }

   const response = await fetchGetData(url, options.fetchQuery)
    .then((jsonData) => {
        if (jsonData.data != null) {
            jsonData.data.forEach((rowData, index) => {
                tableJqElement.children('tbody').append('<tr></tr>');

                if (options.columns != null) {
                    options.columns.forEach((column, j) => {
                        if (rowData.hasOwnProperty(column.data)){
                            var columnValue = '';
                            if (column.render == undefined) 
                                columnValue = rowData[column.data];   
                            else 
                                columnValue = column.render(rowData[column.data]);

                            tableJqElement.children('tbody').children().eq(index).append(
                                '<td>' + columnValue + '</td>'
                            );
                        }
                    });
                } else {
                    for (const key in rowData) {
                        if (rowData.hasOwnProperty(key)) {
                            const columnValue = rowData[key];
                            tableJqElement.children('tbody').children().eq(index).append(
                                '<td>' + columnValue + '</td>'
                            );
                        }
                    }
                }
            });
        } else {
            tableJqElement.children('tbody').append('<tr><td class="tx-center" colspan=6 >Jadwal belum ada.</td></tr>');
        }

        return jsonData;
    });

    return await response;
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
