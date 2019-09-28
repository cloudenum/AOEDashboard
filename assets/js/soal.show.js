$(function(){
  const examCarousel = $('#examCarousel');
  const examIndicators = $('.exam-indicators li span');
  const examControls = $('.exam-controls');

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