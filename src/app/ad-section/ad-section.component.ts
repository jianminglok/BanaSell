import { Component, OnInit } from '@angular/core';

import { SwiperComponent, SwiperDirective, SwiperConfigInterface,
  SwiperScrollbarInterface, SwiperPaginationInterface } from 'ngx-swiper-wrapper';

@Component({
  selector: 'app-ad-section',
  templateUrl: './ad-section.component.html',
  styleUrls: ['./ad-section.component.sass'],
  host: {
    '(window:scroll)': 'updateHeader($event)'
  }
})
export class AdSectionComponent implements OnInit {

  public config: SwiperConfigInterface = {
    direction: 'horizontal',
    slidesPerView: 1,
    keyboard: true,
    mousewheel: false,
    scrollbar: false,
    navigation: true,
    pagination: false,
    preloadImages: false,
    observer: true,
    lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 3,
        loadOnTransitionStart: true
    },
    autoplay: {
      delay: 10000,
    },
  };

  isScrolled = false;
  currPos: Number = 0;
  startPos: Number = 0;
  changePos: Number = 650;

  updateHeader(evt) {
    this.currPos = (window.pageYOffset || evt.target.scrollTop) - (evt.target.clientTop || 0);
    if(this.currPos >= this.changePos ) {
        this.isScrolled = true;
    } else {
        this.isScrolled = false;
    }
  }

  constructor() { }

  ngOnInit() {
  }

}
