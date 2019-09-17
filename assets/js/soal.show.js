$(function(){
  const examCarousel = $('#examCarousel');
  const examIndicators = $('.exam-indicators li span');

  examCarousel.carousel({
    interval: false,
    wrap: false
  });

  examIndicators.click((ev) => {
    ev.preventDefault();
    
    examCarousel.carousel($(ev.target).parents('li').data('slide-to'));  
    // $(ev.target).parents('li').siblings().removeClass('active');
  })

  examCarousel.on('slide.bs.carousel', (ev) => {
    $(examIndicators[ev.from]).parents('li').removeClass('active');
    $(examIndicators[ev.to]).parents('li').addClass('active');
  });
  
  // fetch({
  //   url: baseUrl('')
  // })
})