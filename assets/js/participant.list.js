'use-strict';
function expandRowTemplate(rowData) {
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Nomor Identitas:</td>'+
            '<td>' + rowData.identity_number + '</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Ref. number:</td>'+
            '<td>' + rowData.reference_number + '</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Agama:</td>'+
            '<td>' + rowData.religion + '</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Ref. number:</td>'+
            '<td>' + rowData.reference_number + '</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Ref. number:</td>'+
            '<td>' + rowData.reference_number + '</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Ref. number:</td>'+
            '<td>' + rowData.reference_number + '</td>'+
        '</tr>'+
        '<tr>'+
        
            //     <div class=\"row flex-nowrap\">
            //         <div class=\"col-xs-5  mg-r-5 mg-l-5\">
            //             <button class=\"btn btn-info btn-block btn-modal-info\" data-id=\"${rowData.id}\" data-toggle=\"modal\" data-target=\"#modal-info\">
            //                 Info
            //             <\/button>
            //         <\/div>
            //         <div class=\"col-xs-5 mg-r-5 mg-l-5\">
            //             <button data-id=\"${rowData.id}\" class=\"btn-delete btn btn-danger btn-block\">
            //                 Delete
            //             <\/button>
            //         <\/div>
            //     <\/div>`+
        '</tr>'+
    '</table>';
}

$(document).ready(function() {
    var participantData = {};
    var columnsName = [
        "",
        "id",
        "fullname",
        // "reference_number",
        // "identity_number",
        "place_of_birth",
        "date_of_birth",
        "gender",
        // "religion",
        // "nem",
        "school",
        // "department",
        // "address",
        // "regency",
        // "province",
        // "postal_code",
        // "telephone",
        // "email",
        "registration_date",
        "",
        // "choice1",
        // "choice2",
        // "exam_date",
        // "blood_type",
        // "pathktp",
        // "pathcapture",
        // "namektp",
        // "namecapture",
        // "similiarity"
    ];
    
    $('#participantTable').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        paging: true,
        // dataSrc: data,
        ajax: {
            // url: baseUrl('participant/fetch'),
            url: baseUrl('participant', true),
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
                className: 'details-control',
                data: null,
                render: () => '<i class="far fa-plus-square"></i>',
                orderable: false,
                searchable: false
            },
            { title: 'ID', name: "id", data: "id" },
            { title: 'NAMA', data: "fullname" },
            // { data: "reference_number" },
            // { data: "identity_number" },
            { title: 'TEMPAT LAHIR', name: "place_of_birth", data: 'place_of_birth' },
            { 
                title: 'TANGGAL LAHIR', 
                name: "date_of_birth", 
                data: 'date_of_birth',
                render: (birthDateString) => { 
                    const birthDate = new Date(birthDateString);
                    const options = { year: 'numeric', month: 'short', day: '2-digit' };
    
                    const dateTimeFormat = new Intl.DateTimeFormat('id-ID', options);
                    return dateTimeFormat.format(birthDate);
                }
            },
            // { data: "place_of_birth" },
            // { data: "date_of_birth" },
            { title: 'GENDER',name: "gender", data: "gender" },
            // { data: "nem" },
            { title: 'ASAL SEKOLAH',name: "school", data: "school" },
            // { data: "department" },
            // { title: 'EMAIL',name: "email", data: "email" },
            { title: 'TGL REGISTRASI', name: "registration_date", data: "registration_date" },
            
            // { data: "choice1" },
            // { data: "choice2" }
        ],
        order: [[1, 'asc']],
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

    var table = $('#participantTable').DataTable();
    
    
    // function bindClick() {
        $('#participantTable tbody').on('click', 'td.details-control', function (ev) {
            ev.preventDefault();
            var tr = $(this).parents('tr');            
            var row = table.row(tr);

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                $(this).children().removeClass('fa-minus-square');
                $(this).children().addClass('fa-plus-square');
            }
            else {
                // Open this row
                console.log(row.data());
                $(this).children().removeClass('fa-plus-square');
                $(this).children().addClass('fa-minus-square');

                row.child('<div class="container">'+
                    '<div class="sk-three-bounce" style="margin: auto">'+
                        '<div class="sk-child sk-bounce1 bg-gray-800"></div>'+
                        '<div class="sk-child sk-bounce2 bg-gray-800"></div>'+
                        '<div class="sk-child sk-bounce3 bg-gray-800"></div>'+
                    '</div></div>');
                    
                fetch(baseUrl('participant/detail/' + row.data().id, true), {
                    method: 'GET',
                    mode: 'cors',
                    credentials: 'include',
                    headers: {
                        'Authorization' : 'Bearer ' + Cookies.get('access_token')
                    },
                })
                .then((response) => response.json())
                .then((json) => {
                    row.child(expandRowTemplate(json.data)).show();
                })
                .catch((error) => {
                    Swal.fire('Gagal melakukan koneksi', error.statusText, 'error');
                });
            }
        } );
    // }
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
