$(function(){
  'use strict'

  // FOR DEMO ONLY
  // menu collapsed by default during first page load or refresh with screen
  // having a size between 992px and 1199px. This is intended on this page only
  // for better viewing of widgets demo.
  $(window).resize(function(){
    minimizeMenu();
  });

  minimizeMenu();

  function minimizeMenu() {
    if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1199px)').matches) {
      // show only the icons and hide left menu label by default
      $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
      $('body').addClass('collapsed-menu');
      $('.show-sub + .br-menu-sub').slideUp();
    } else if(window.matchMedia('(min-width: 1200px)').matches && !$('body').hasClass('collapsed-menu')) {
      $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
      $('body').removeClass('collapsed-menu');
      $('.show-sub + .br-menu-sub').slideDown();
    }
  }
  
  const profileNameElement = $('#profileName');
  const schoolHeaderElement = $('#schoolHeader');
  const addressHeaderElement = $('#addressHeader');

  fetchGetData(baseUrl('participant/detail/' + Cookies.get('user_id'), true))
  .then((jsonData) => {
    profileNameElement.html(jsonData.data.fullname);
    schoolHeaderElement.html(jsonData.data.school);
    addressHeaderElement.html(jsonData.data.address);
    // .each((idx, element) => {
    //   console.log(idx);
    //   if($(element).attr('name') == key) {
        
    //     $(element).val(value);
    //   }
    // });
    
    for (const key in jsonData.data) {
      if (jsonData.data.hasOwnProperty(key)) {
        const value = jsonData.data[key];
        $('input[name="'+key+'"]').val(value);
      }
    }
  })
  .catch((e) => {
    console.log(e);
  });

  fetchGetData(baseUrl('exam/status', true))
  .then((jsonData) => {
    if(jsonData.data != null) {
      $('#nilaiNamaUjian').text(jsonData.data.question_group);
      $('#nilaiExamDetail').text(jsonData.data.total_answered + '/' + jsonData.data.total_question);
      $('#nilaiGrade').text(jsonData.data.grade);
    }
  })
  .catch((e) => {
    console.log(e);
  });

  $('#editProfileForm').submit((ev) => {
    ev.preventDefault();
    var formData = new FormData();
    fetchPostData(baseUrl('participant/update', true), formData).catch((e) => {console.log(e)});
  })

  $('.form-control').on('change', (ev) => {
    $('#btnSave').attr('disabled', false);
    $('#btnSave').removeClass('btn-disabled');
    $('#btnSave').addClass('btn-info');
  })

  var columnsName = [
    "",
    "Tanggal Ujian",
    
  ];

  var options = {
      columns: [
      {
        data: 'start_date',
        render: (value) => {
          const startDate = new Date(value);
          const options = { year: 'numeric', month: 'short', day: '2-digit' };

          const dateTimeFormat = new Intl.DateTimeFormat('id-ID', options);
          return dateTimeFormat.format(startDate);
        }
      },
      {
        data: 'completion_date',
        render: (value) => {
          const completionDate = new Date(value);
          const options = { year: 'numeric', month: 'short', day: '2-digit' };

          const dateTimeFormat = new Intl.DateTimeFormat('id-ID', options);
          return dateTimeFormat.format(completionDate);
        }
      },
      {
        data: 'question_group'
      }
    ]
  };

  fetchGetData(baseUrl('exam/schedule', true), { today: true })
  .then((jsonData) => {
    if (!jsonData.data != null) {
      if (jsonData.data.start_date != null) {
        var examStartDate = new Date(jsonData.data.start_date);
        var examCompletionDate = new Date(jsonData.data.completion_date);
        var dateNow = new Date();
        const options = { year: 'numeric', month: 'short', day: '2-digit' };
        const dateTimeFormat = new Intl.DateTimeFormat('id-ID', options);

        if( sameDay(examStartDate, dateNow) ) {  
          $('#textSchedule').text(dateTimeFormat.format(examStartDate) + ' - ' + dateTimeFormat.format(examCompletionDate))
          $('#btnStartExam').attr('disabled', false);
          $('#btnStartExam').removeClass('btn-disabled');
          $('#btnStartExam').addClass('btn-success');
          
          $('#btnStartExam').click((ev) => {
            window.open(baseUrl('soal/show?id=' + Cookies.get('user_id')), 'popUpWindow', 'height=600,width=800,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no, status=yes')
          });          
        } else {
          $('#textSchedule').text('Belum waktunya ujian.');
        }
      } 

      if (jsonData.data.question_group != null) {
        $('#textExamName').text(jsonData.data.question_group);
      }
    }
  })
  .catch((e) => {
    console.log(e);
  });

  fetchTable($('#scheduleTable'), baseUrl('exam/schedule', true), options)
  .catch((e) => {
    console.log(e);
  });
   
});