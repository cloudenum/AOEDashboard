'use-strict';

$(document).ready(function() {

    const deleteUser = (data) => {
        var formData = new FormData();
        
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                const element = data[key];
                formData.append(key, element);
            }
        }

        formData.delete('group_name');

        return fetch(baseUrl('admin/update/' + data.id, true), {
            method: 'POST',
            mode: 'cors',
            credentials: 'include',
            headers: {
                'Authorization' : 'Bearer ' + Cookies.get('access_token')
            },
            body: formData
        })
    }

    var participantData = {};
    var columnsName = [
        "",
        "id",
        "name",
        "username",
        "email",
        "group_id",
        "group_name",
        ""
    ];

    $('#adminTable').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        paging: true,
        initComplete: function() {
            $('#adminTable').trigger('dataTables.initComplete');
        },
        // dataSrc: data,
        ajax: {
            // url: baseUrl('participant/fetch'),
            url: baseUrl('admin', true),
            type: 'GET',
            data: (data) => {
                data.sort_by = columnsName[data.order[0].column];
                data.order = data.order[0].dir;

                if (data.search.value) {
                    data.keyword = data.search.value;
                }

                data.columns = undefined;
                data.search = undefined;
                data.length = undefined;
                data.start = undefined;
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON(data);
                json.recordsTotal = json.meta.pagination.total_data;
                json.recordsFiltered = json.meta.pagination.total_data < json.meta.pagination.item_per_page ? json.meta.pagination.total_data : json.meta.pagination.item_per_page;
                return JSON.stringify( json );
            },
            xhrFields: {
                withCredentials: true
            },
            beforeSend: (request) => {
                request.setRequestHeader('Authorization', 'Bearer ' + Cookies.get('access_token'))
            },
            dataSrc: (resData) => {                
                participantData = resData.data;
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
            { 
                title: '#',
                data: null,
                render: (data, type, row, meta) => meta.row + 1,
                searchable: false
            },
            { title: 'ID', name: "id", data: "id" },
            { title: 'NAME', data: "name" },
            { title: 'USERNAME', name: "username", data: 'username' },
            { title: 'EMAIL', name: "email", data: "email" },
            { title: 'ROLE', name: "role", data: "group_name" },
            { 
                title: 'ACTION', 
                data: null, 
                orderable: false,
                searchable: false,
                render: (data, type, row) => {
                    return (
                        '<button data-id="'+ row.id +'" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning btn-edit mg-r-5">'+
                            '<i class="fas fa-user-edit"></i> Edit'+
                        '</button>'+
                        '<button data-id="'+ row.id +'" class="btn btn-danger btn-delete mg-l-5">'+
                            '<i class="fas fa-trash-alt"></i> Delete'+
                        '</button>'
                    );
                }
            }
        ],
        // order: [[1, 'asc']],
        // lengthMenu: [20],
        language: {
            processing: 
                '<div class="sk-three-bounce" style="margin: auto">'+
                    '<div class="sk-child sk-bounce1 bg-gray-800"></div>'+
                    '<div class="sk-child sk-bounce2 bg-gray-800"></div>'+
                    '<div class="sk-child sk-bounce3 bg-gray-800"></div>'+
                '</div>',
            searchPlaceholder: 'Search...',
        }
    });

    var table = $('#adminTable').DataTable();
    
    const modalElement = $('#modal-edit');
    const inputEditElement = $('.input-edit');
    const btnModalEdit = $('#btnModalEdit');
    const btnModalDelete = $('#btnModalDelete');
    const btnSaveChanges = $('#btnSaveChanges');
    
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-danger mg-l-5',
          cancelButton: 'btn btn-primary mg-r-5'
        },
        buttonsStyling: false
    });
    
    var swalResult = {};
    $('#adminTable').on('dataTables.initComplete', (ev) => {
        var btnDelete = $('.btn-delete');       
        btnDelete.click((ev) => {
            console.log('clicked')
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true,
                focusCancel: true
            })
            .then((result) => {
                swalResult = result;
                if (result.value) {
                    var row = table.row($(ev.target).parents('tr'));
                    deleteUser(row.data())
                    .then((response) => response.text())
                    .then((text) => {
                        console.log(text);
                    });
                }
            })
        });
    });

    console.log(swalResult);

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
