function exam_page_format(data) {
  let htmlFormat = `
  <div class="carousel-item active">
    <div class="container">
      <div class="col-md-12">
        <div class="question-main">
          <div class="title">
            <div class="row">
              <div class="col-sm-12">
                <p>${data.question_text}</p>
              </div>
            </div>`;

  if( data.question_image ) {
    htmlFormat += `
            <div class="row">
              <div class="col-sm-12">
                <img src="https://via.placeholder.com/300x560.png"/>
              </div>
            </div>`;
  }
  `          
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="answer check">
                <div class="radio">
                  <input type="radio" id="q1radio20" name="question1">
                  <label class="a" for="q1radio20">
                    <span>hello</span>
                  </label>
                </div>
              </div>
              <!--answer-->
            </div>
            <div class="col-sm-12">
              <div class="answer check">
                <div class="radio">
                  <input type="radio" id="q1radio21" name="question1">
                  <label class="b" for="q1radio21"><span>hello codepen!</span></label>
                </div>
              </div>
              <!--answer-->
            </div>

            <div class="col-sm-12">
              <div class="answer check">
                <div class="radio">
                  <input type="radio" id="q1radio22" name="question1">
                  <label class="c" for="q1radio22"><span>hello world</span></label>
                </div>
              </div>
              <!--answer-->
            </div>
          </div>
          <!--./row-->
        </div>
        <!--./question-main-->
      </div>
    </div>
    <!-- <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos voluptatem rem, voluptatum quo incidunt architecto nobis accusamus adipisci cupiditate nihil odio. Consequatur, quis. Impedit voluptatem modi deserunt iste, dicta veniam?
    </p>
    <br/>
    <ol type="A">  
      <li>HTML</li>  
      <li>Java</li>  
      <li>JavaScript</li>  
      <li>SQL</li>  
    </ol>   -->
  </div>`
  // );
}

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