$(function(){
  $('#addForm').parsley();
  
  let ds = { 
    "admin": { "index":"1", "detail":"1", "add":"1", "update":"1" }, 
    "admin_group": { "index":"1", "detail":"1", "add":"1", "update":"1" }, 
    "answer": { "index":"1", "detail":"1", "add":"1", "update":"1" }, 
    "change_log": { "index":"1" }, 
    "exam_scedule": { "index":"1", "detail":"1", "add":"1", "update":"1" }, 
    "exam_status": { "index":"1", "detail":"1", "add":"1", "update":"1" }, 
    "exam": { "index":"1" }, 
    "participant": { "index":"1", "detail":"1", "add":"1", "update":"1" }, 
    "question_group": { "index":"1", "detail":"1", "add":"1", "update":"1" },
    "question_type": { "index":"1", "detail":"1", "add":"1", "update":"1" }, 
    "question": { "index":"1", "detail":"1", "add":"1", "update":"1" }, 
    "upload": { "exam":"1", "answer":"1", "ktp":"1" }, 
    "helper": { "province":"1", "regencie":"1" }
  };

  console.log(ds);

  $('#btnSubmit').click((ev) => {
    ev.preventDefault();
    const formData = new FormData($('#addForm')[0]);
    let jsonObject = {};
    
    for (const [key, value]  of formData.entries()) {
        jsonObject[key] = value;
    }

    console.log(jsonObject);
  })

  $('#addForm').submit((event) => {
    event.preventDefault();
    
    console.log($(event.target).serializeArray());

    timedLog('Event submit trigerred.');

    let data = new FormData(event.target);
    $('#btnSubmit').prop("disabled", true);
    Swal.showLoading()
    
    timedLog('Sending form data ...');

    $.ajax({
      method: "POST",
      url: baseUrl('admin/add', true),
      data: $(event.target).serialize(),
      headers: {
          'Authorization' : 'Bearer ' + Cookies.get('access_token')
      },
    })
    .always(() => {  
      $('#btnSubmit').prop("disabled", false);
      Swal.close();
    })
    .done((resData) => {
      try {
        console.log(resData);
        timedLog('Add success.');
        Swal.fire("Berhasil tambah data", `ID Admin : ${resData.data.id}`, "success");
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

  $('#adminGroupTable').DataTable({
      scrollX: true,
      processing: true,
      serverSide: true,
      paging: true,
      responsive: true,
      initComplete: function() {
          $('#adminGroupTable').trigger('dataTables.initComplete');
      },
      // dataSrc: data,
      ajax: {
          // url: baseUrl('participant/fetch'),
          url: baseUrl('admin_group', true),
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
              // participantData = resData.data;
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
          { title: 'ROLE NAME', data: "name" },
          { 
            title: 'STATUS', 
            name: 'status', 
            data: 'status', 
            render: (data) => parseInt(data) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Disabled</span>' 
          },
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
          sSearch: '',
      }
  });

  var table = $('#adminGroupTable').DataTable();

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
  $('#adminGroupTable').on('dataTables.initComplete', (ev) => {
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
