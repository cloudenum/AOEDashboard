'use-strict';
function expandRowTemplate(rowData) {
    return (
    '<div class="container">'+
        
        '<div class="row">'+
            '<div class="col-sm-5">'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Nomor Identitas:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.identity_number + '</p></div>'+
                '</div>'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Agama:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.religion + '</p></div>'+
                '</div>'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>NEM:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.nem + '</p></div>'+
                '</div>'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Jurusan:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.department + '</p></div>'+
                '</div>'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Alamat:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.address + ', ' + rowData.regency + ', ' + rowData.province + ' ' + rowData.postal_code + '</p></div>'+
                '</div>'+
            '</div>'+
            '<div class="col-sm-5">'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Gol. Darah:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.blood_type + '</p></div>'+
                '</div>'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Telepon:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.telephone + '</p></div>'+
                '</div>'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Pilihan 1:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.choice1 + '</p></div>'+
                '</div>'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Pilihan 2:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.choice2 + '</p></div>'+
                '</div>'+
                '<div class="row  ">'+
                    '<div class="col-sm-4"><p>Tanggal Ujian:</p></div>'+
                    '<div class="col-sm-8 text-wrap bd-l bd-gray-400"><p>' + rowData.exam_date + '</p></div>'+
                '</div>'+
            '</div>'+
            '<div class="col-sm-2 flex no-wrap">'+
                '<div class="row  ">'+
                    '<div class=\"col-sm-12 mg-b-2\">'+
                        '<button class=\"btn btn-info btn-sm btn-block btn-modal-info\" data-id=\"' + rowData.id + '\" data-toggle=\"modal\" data-target=\"#modal-info\">'+
                            'Info'+
                        '<\/button>'+
                    '<\/div>'+
                    '<div class=\"col-sm-12 mg-t-2\">'+
                        '<button data-id=\"' + rowData.id + '\" class=\"btn-delete btn btn-danger btn-block btn-sm\">'+
                            'Delete'+
                        '<\/button>'+
                    '<\/div>'+
                '</div>'+    
            '</div>'+
        '</div>'+
    '</div>');
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
            sSearch: ''
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

                    participantData[row.data().id] = json.data;
                })
                .catch((error) => {
                    Swal.fire('Gagal melakukan koneksi', error.statusText, 'error');
                });
            }
        } );
    // }

    
    // $('#question-group-select').select2("updateResults");
  
    $('#editForm').submit((event) => {
      timedLog('Event submit trigerred.');
  
      event.preventDefault();
      let data = new FormData(event.target);
      $('#btnSaveChanges').prop("disabled", true);
      Swal.showLoading()
      
      timedLog('Sending form data ...');
  
      $.ajax({
        method: "POST",
        contentType: false,
        url: baseUrl('participant/update', true),
        data: data,
        headers: {
            'Authorization' : 'Bearer ' + Cookies.get('access_token')
        },
        processData: false,  // Important!
        cache: false,
      })
      .always(() => {  
        $('#btnSaveChanges').prop("disabled", false);
        Swal.close();
      })
      .done((resData) => {
        try {
          console.log(resData);
          timedLog('Edit success.');
          Swal.fire("Berhasil edit data", `ID Peserta : ${resData.data.id}`, "success");
        }
        catch(e) {
          console.error(e.message);
        }
      })
      .fail((xhr) => {
        try {
          const res = JSON.parse(xhr.responseText);
          
          console.log(res);
          
          let messages = '';
          for (const key in res.meta.message) {
            if (res.meta.message.hasOwnProperty(key)) {
              messages += '<br/>' + res.meta.message[key];    
            }
          }
  
          timedLog('Add failed.');
          Swal.fire(xhr.statusText, messages, "warning");
        }
        catch(e) {
          console.error(e.message);
        }
      });
    });
  
  
    const modalElement = $('#modal-info');
    const inputEditElements = $('.input-edit');
    const btnModalEdit = $('#btnModalEdit');
    const btnModalDelete = $('#btnModalDelete');
    const btnSaveChanges = $('#btnSaveChanges');
    
    // inputEditElements.attr('disabled', true);
    
  
    modalElement.on('shown.bs.modal', (ev) => {
        $('.select2').select2();

        $('#birthDate').datepicker({
        altField: '#altDate',
        altFormat: 'mm/dd/yy',
        dateFormat: 'dd-mm-yy',
        maxDate: '-18y',
        changeYear: true,
        changeMonth: true,
        });
    
        $('#birthDate').mask('99-99-9999');
    
        $.ajax({
        method: 'GET',
        url: baseUrl('question_group', true),
        dataType: 'json',
        headers: {
            'Authorization' : 'Bearer ' + Cookies.get('access_token')
        }
        })
        .done((resData) => {
        try {
            let questionGroupData = [];
            resData.data.forEach(element => {
            questionGroupData.push({
                id: parseInt(element.group_id),
                text: element.question_group
            })
            });
    
            $('#question-group-select').select2('destroy');
            $('#question-group-select').select2({ data: questionGroupData });
            console.log(JSON.stringify(questionGroupData));
        }
        catch (e) {
            console.error(e.message);
        }
        })
        .fail((res) => {
        try {
            console.error(res.statusText);
        }
        catch(e) {
            console.error(e.message);
        }
        });
    
        const id = $(ev.relatedTarget).data('id');
        console.log(participantData);
        for (const key in participantData[id]) {
            if (participantData[id].hasOwnProperty(key)) {
                const element = participantData[id][key];
                $('[name="' + key + '"]').val(participantData[id][key]);
            }
        }
        
        
        // $('#fullname-edit').val(ev.relatedTarget.data
    });
    
    // $('.input-edit').dblclick((ev) => {
    //     ev.preventDefault();
    //     ev.target.disabled = !ev.target.disabled;
    //     console.dir(ev);
    // });

    btnModalEdit.click((ev) => {
        ev.preventDefault();
        ev.target.disabled = true;
        inputEditElements.trigger('dblclick');
    });

    btnModalDelete.click((ev) => {
        ev.preventDefault();
        Swal.fire('Anda yakin?', '', 'warning')
        .then((result) => {
            console.dir(result);
        });
    })

    inputEditElements.change((ev) => {
        btnSaveChanges.prop('disabled', false);
    });

    btnSaveChanges.click((ev) => {
        ev.preventDefault();
        $('#editForm').trigger('submit');
    })

});
