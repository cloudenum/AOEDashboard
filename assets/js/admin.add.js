$(function(){
  $('.select2').select2();
  $('#addForm').parsley();
  
  $.ajax({
    method: 'GET',
    url: baseUrl('admin_group', true),
    dataType: 'json',
    headers: {
        'Authorization' : 'Bearer ' + Cookies.get('access_token')
    }
  })
  .done((resData) => {
    try {
      let adminGroupData = [];
      resData.data.forEach(element => {
        if (element.status) {
          adminGroupData.push({
            id: parseInt(element.id),
            text: element.name
          })
        }
      });

      $('#adminGroupSelect').select2('destroy');
      $('#adminGroupSelect').select2({ 
        placeholder: "Pilih role",
        data: adminGroupData 
      });
      console.log(JSON.stringify(adminGroupData));
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
  
  // $('#question-group-select').select2("updateResults");

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
  
  ds = {};
  
  window.Parsley
  .addValidator('checkPasswordRetype', {
    requirementType: 'string',
    validateString: function(value) {
      return $('#passwordInput').val() === value ? true : false;
    },
    messages: {
      en: 'Password doesn\'t match!'
    }
  });

  // window.Parsley.addAsyncValidator('checkEmail', function (xhr) {
  //   console.log(this.$element); // jQuery Object[ input[name="q"] ]

  //   return 404 === xhr.status;
  // }, baseUrl('admin', true));
  // $('#btnSubmit').click((ev) => {
  //   ev.preventDefault();
  //   $('#addForm').trigger('submit');
  // });

  $('#addForm').submit((event) => {
    event.preventDefault();
    
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
});
