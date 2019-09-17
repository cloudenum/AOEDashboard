$(function(){
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
  

  $('#addForm').submit((event) => {
    timedLog('Event submit trigerred.');

    event.preventDefault();
    let data = new FormData(event.target);
    $('#btnSubmit').prop("disabled", true);
    Swal.showLoading()
    
    timedLog('Sending form data ...');

    $.ajax({
      method: "POST",
      contentType: false,
      url: baseUrl('participant/add', true),
      data: data,
      headers: {
          'Authorization' : 'Bearer ' + Cookies.get('access_token')
      },
      processData: false,  // Important!
      cache: false,
    })
    .always(() => {  
      $('#btnSubmit').prop("disabled", false);
      Swal.close();
    })
    .done((resData) => {
      try {
        console.log(resData);
        timedLog('Add success.');
        Swal.fire("Berhasil tambah data", `ID Peserta : ${resData.data.id}`, "success");
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

fetch(baseUrl('helper/province', true), { 
  "credentials": "include",
  "headers": {
    "accept": "*/*", 
    "authorization": "Bearer " + Cookies.get('access_token')
  },
  "method": "GET",
  "mode": "cors"
})
.then((res) => { 
  try {
    var json = res.json();
    return json;
  } catch (e) {
    console.error(e.message);
  }
})
.then((res) => { console.log(res) })
.catch((res) => { console.log(res) });