'use-strict';

$(document).ready(function() {
    const columnsName = [
        "id",
        "start_date",
        "completion_date"
    ];

    $('.fc-datepicker')
    
    $.each($('.fc-datepicker'), (index, element) => {
        $(element).mask('99-99-9999');
        
        $(element).datepicker({
            altField: '#altDate' + index,
            altFormat: 'mm/dd/yy',
            dateFormat: 'dd-mm-yy',
            changeYear: true,
            changeMonth: true,
        });
    });
    
   
    $('#scheduleTable').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        responsive: true,
        // dataSrc: data,
        ajax: {
            // url: baseUrl('participant/fetch'),
            url: baseUrl('exam_schedule', true),
            type: 'GET',
            data: (data) => {
                // data.orderBy = 'asc';
                // data.page = data.length;
                data.sort_by = columnsName[data.order[0].column];
                data.order = data.order[0].dir;
                console.log(this);

                if (data.search.value) {
                    data.keyword = data.search.value;
                }

                data.columns = undefined;
                data.search = undefined;
                data.length = undefined;
                data.start = undefined;
            },
            // dataSrc: 'data',
            dataFilter: function(data){
                var json = jQuery.parseJSON(data);
                json.recordsTotal = json.meta.pagination.total_data;
                json.recordsFiltered = json.meta.pagination.total_data < json.meta.pagination.item_per_page ? json.meta.pagination.total_data : json.meta.pagination.item_per_page;
                return JSON.stringify( json ); // return JSON string
            },
            xhrFields: {
                withCredentials: true
            },
            beforeSend: (request) => {
                request.setRequestHeader('Authorization', 'Bearer ' + Cookies.get('access_token'))
            },
            dataSrc: (resData) => {
                return resData.data;
            },
            error: (jqXHR) => {
                try {
                    let res = JSON.parse(jqXHR.responseText);
                    let messages = '';
                    res.meta.message.forEach(element => {
                        messages = messages + '<br/>' + element;
                    });

                    Swal.fire(jqXHR.statusText, messages, 'error');
                    
                } catch (e) {
                    xhrPool.abortAll();
                    console.log(e.message);
                }
            }
        },
        rowId: 'id',
        columns: [
            { title: 'ID', name: "id", data: "id" },
            { title: 'NAMA SOAL', data: null },
            { 
                title: 'TGL MULAI UJIAN', 
                name: 'start_date', 
                data: 'start_date',
                render: (startDateString) => { 
                    const startDate = new Date(startDateString);
                    const options = { year: 'numeric', month: 'short', day: '2-digit' };
    
                    const dateTimeFormat = new Intl.DateTimeFormat('id-ID', options);
                    return dateTimeFormat.format(startDate);
                }
            },
            { 
                title: 'TGL SELESAI UJIAN', 
                name: 'completion_date', 
                data: 'completion_date',
                render: (endDateString) => { 
                    const endDate = new Date(endDateString);
                    const options = { year: 'numeric', month: 'short', day: '2-digit' };
    
                    const dateTimeFormat = new Intl.DateTimeFormat('id-ID', options);
                    return dateTimeFormat.format(endDate);
                }
            },
            { 
                title: 'ACTION', 
                name: "action", 
                data: 'null',
                orderable: false,
                searchable: false,
                render: (data, type, row) => { 
                    return (
                        `<div class=\"row flex-nowrap\">
                            <div class=\"col-xs-5  mg-r-5 mg-l-5\">
                                <button class=\"btn btn-info btn-block btn-modal-info\" data-id=\"${row.group_id}\" data-toggle=\"modal\" data-target=\"#modal-info\">
                                    <i class=\"fas fa-info-circle\"><\/i> Info
                                <\/button>
                            <\/div>
                            <div class=\"col-xs-5 mg-r-5 mg-l-5\">
                                <button data-id=\"${row.group_id}\" class=\"btn-delete btn btn-danger btn-block\">
                                    <i class=\"fas fa-trash-alt\"><\/i> Delete
                                <\/button>
                            <\/div>
                        <\/div>`
                    )
                }
            },
        ],
        language: {
            processing: 
                '<div class="sk-three-bounce" style="margin: auto">'+
                    '<div class="sk-child sk-bounce1 bg-gray-800"></div>'+
                    '<div class="sk-child sk-bounce2 bg-gray-800"></div>'+
                    '<div class="sk-child sk-bounce3 bg-gray-800"></div>'+
                '</div>',
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });

    var table = $('#scheduleTable').DataTable();
    
    $('#scheduleForm').on('submit', (ev) => {
        ev.preventDefault();
        
        fetch(baseUrl('exam_schedule/add', true), {
            method: 'POST',
            mode: 'cors',
            credentials: 'include',
            headers: {
                Authorization: 'Bearer ' + Cookies.get('access_token')
            },
            body: new FormData(ev.target)
        })
        .then((response) => {
            switch (response.status) {
                case 200:
                    Swal.fire('Success', '', 'success');
                    table.ajax.reload(null, false);
                    break;
                default:
                    Swal.fire('Error', response.statusText, 'error');
                    break;
            }
        })
        .catch((reason) => {
            console.log(reason);
        });

        console.log($(ev.target).serialize());
    });

    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
    
    const modalElement = $('#modal-info');
    const inputEditElement = $('.input-edit');
    const btnModalEdit = $('#btnModalEdit');
    const btnModalDelete = $('#btnModalDelete');
    const btnSaveChanges = $('#btnSaveChanges');

    modalElement.on('show.bs.modal', (ev) => {
        console.dir(ev.relatedTarget);
        // $('#fullname-edit').val(ev.relatedTarget.data
    });

    inputEditElement.dblclick((ev) => {
        ev.preventDefault();
        ev.target.readOnly = !ev.target.readOnly;
        console.dir(ev);
    });

    btnModalEdit.click((ev) => {
        ev.preventDefault();
        ev.target.disabled = true;
        inputEditElement.trigger('dblclick');
    });

    btnModalDelete.click((ev) => {
        ev.preventDefault();
        Swal.fire('Anda yakin?', '', 'warning')
        .then((result) => {
            console.dir(result);
        });
    })

    inputEditElement.change((ev) => {
        btnSaveChanges.prop('disabled', false);
    });

});
