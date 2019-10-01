function examQuestionTemplate(data) {
  let htmlTemplate = '<div class="carousel-item" id="q' + data.id + '" data-id="' + data.id + '">'+
                      '<div class="container">'+
                        '<div class="col-md-12">'+
                          '<div class="question-main">'+
                            '<div class="title">';
  if( data.question_text ) {
    htmlTemplate          +=  '<div class="row">'+
                                '<div class="col-sm-12">'+
                                  '<p>' + data.question_text + '</p>'+
                                '</div>'+
                              '</div>';
  }

  if( data.question_image ) {
    htmlTemplate          +=  '<div class="row">'+
                                '<div class="col-sm-12">'+
                                  '<img src="' + data.question_image + '"/>'+
                                '</div>'+
                              '</div>';
  }

  htmlTemplate          +=  '</div>'+
                            '<div class="row">';
  let i = 0;
  
  if(data.answers){
    let htmlAnswersTemplate = '';
    data.answers.forEach(element => {
      htmlAnswersTemplate +=    '<div class="col-sm-12 mg-y-5">'+
                                  '<div class="answer check">'+
                                    '<div class="radio">'+
                                      '<input type="radio" id="q' + data.id + 'Radio' + String.fromCharCode(65 + i) + '" name="q' + data.id + '">'+
                                      '<label class="' + String.fromCharCode(97 + i) + '" for="q' + data.id + 'Radio' + String.fromCharCode(65 + i) + '">';
      if (element.answer_text)  htmlAnswersTemplate += '<span>' + element.answer_text + '</span>';
      if (element.answer_image) htmlAnswersTemplate += '<img src="' + element.answer_text + '"/>';
      htmlAnswersTemplate +=          '</label>'+
                                    '</div>'+
                                  '</div>'+
                                  '<!--answer-->'+
                                '</div>';
      i++;
    });

    htmlTemplate += htmlAnswersTemplate;
  } else {
    htmlTemplate +=             '<div class="col-sm-12 mg-y-5">'+
                                  '<textarea rows="3" class="form-control" placeholder="Tulis jawaban Anda"></textarea>'+
                                '</div>';
  }

  htmlTemplate          +=  '</div>'+
                            '<!--./row-->'+
                          '</div>'+
                          '<!--./question-main-->'+
                        '</div>'+
                      '</div>'+
                    '</div>';

  return htmlTemplate;
  // );
}

$(function(){
  const examCarousel = $('#examCarousel');
  const examIndicators = $('.exam-indicators li span');
  const examControls = $('.exam-controls');
  const examItems = $('#examCarousel .carousel-inner');

  fetchGetData(baseUrl('question', true), {
    group : examCarousel.data('id')
  }).then((jsonData) => {
    // fetchGetData(baseUrl('answers', true), {
    //   question_id : jsonData.data[i]
    // })

    for (let i = 0; i < jsonData.data.length; i++) {
      const element = jsonData.data[i];
    }
    
    jsonData.data.forEach(element => {
      console.log(element);
      examItems.append(examQuestionTemplate(element));  
    });
    $('#examCarousel .carousel-inner .carousel-item:first-child').addClass('active');
  }).catch((e) => {
    console.log(e);
  });

  examCarousel.carousel({
    interval: false,
    wrap: false
  });

  examIndicators.click((ev) => {
    ev.preventDefault();
    
    examCarousel.carousel($(ev.target).parents('li').data('slide-to'));  
    // $(ev.target).parents('li').siblings().removeClass('active');
  });

  examControls.click((ev) => {
    ev.preventDefault();
    const direction = $(ev.target).data('slide') ? $(ev.target).data('slide') : $(ev.target).parents('.exam-controls').data('slide');
    console.log(direction);
    examCarousel.carousel(direction);
  });

  examCarousel.on('slide.bs.carousel', (ev) => {
    $(examIndicators[ev.from]).parents('li').removeClass('active');
    $(examIndicators[ev.to]).parents('li').addClass('active');
  });
  
  // fetch({
  //   url: baseUrl('')
  // })
})