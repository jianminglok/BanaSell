import { Component, OnInit } from '@angular/core';

import { SwiperComponent, SwiperDirective, SwiperConfigInterface,
  SwiperScrollbarInterface, SwiperPaginationInterface, SwiperZoomInterface, SwiperControllerInterface } from 'ngx-swiper-wrapper';
import { ActivatedRoute } from '@angular/router';
import { Http } from '@angular/http';
import { HttpParams } from '@angular/common/http';
import { Headers } from '@angular/http';
import { HttpHeaders } from '@angular/common/http';
import { RequestOptions } from '@angular/http';
import { AfterViewInit } from '@angular/core/src/metadata/lifecycle_hooks';
import { ViewChildren, QueryList } from '@angular/core';
import { MdcCard } from '@angular-mdc/web';

@Component({
  selector: 'app-info',
  templateUrl: './info.component.html',
  styleUrls: ['./info.component.sass']
})
export class InfoComponent implements OnInit, AfterViewInit {

  img: any;
  key: string;
  public element: any[];
  headers: Headers;
  paths: any[];
  booknames: any[];
  subjects: any[];

  @ViewChildren('allTheseThings') things: QueryList<any>;
  
  public onIndexChange(index: number) {
    console.log('Swiper index: ', index);

    if(document.getElementsByClassName('slide1')[index].clientWidth > document.getElementsByClassName('slide1')[index].clientHeight) {
      document.getElementsByClassName('slide1')[index].setAttribute('style', 'height: auto; width: 100%; margin: auto; position: absolute;');
    } else {
      document.getElementsByClassName('slide1')[index].setAttribute('style', 'position: absolute;');
    }
  }  

  public config: SwiperConfigInterface = {
    direction: 'horizontal',
    slidesPerView: 1,
    spaceBetween: 30,
    keyboard: true,
    mousewheel: false,
    scrollbar: false,
    navigation: true,
    pagination: false,
    preloadImages: false,
    observer: true,
    updateOnImagesReady: true,
    setWrapperSize: true,
    lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 3,
        loadOnTransitionStart: true
    },
    autoplay: {
      delay: 10000,
    },
  };
  
  constructor(private route: ActivatedRoute, private _http: Http) {
    this.key = route.snapshot.params['term'];
    this.headers = new Headers();
    this.headers.append("Content-Type", "application/x-www-form-urlencoded");
  }

  private _ulr ="http://localhost/get_info.php";

  public getPost(){
    let body: HttpParams = new HttpParams();
    body = body.append('key2', this.key);    

    let options = new RequestOptions({ headers: this.headers });

    return this._http.post(this._ulr, JSON.stringify(this.key), options)
    .map( res => res.json() )
    .subscribe(
      data => { this.element = data 
        let pathcount = Object.keys(data['0'].path).length;
        let namecount = Object.keys(data['0'].book_name).length;
        let subjectcount = Object.keys(data['0'].book_subject).length;
        this.paths = Array(pathcount).fill(0).map((x,i)=> i );
        this.booknames = Array(namecount).fill(0).map((x,i)=> i );
        this.subjects = Array(subjectcount).fill(0).map((x,i)=> i );
        console.log();
      },
      err => console.error(err),
      () => console.log('done')
    );
     // .map( res  =><Element[]> res.json())
  } 

  ngOnInit() {
    this.getPost();
  }

  static subscribeData:any;
  static setSubscribeData(data):any{
      InfoComponent.subscribeData=data;
      return data;
  }

  ngAfterViewInit() {
    this.things.changes.subscribe(t => {
      this.ngForRendred();
    })
  }

  ngForRendred() {
    document.getElementsByClassName('swiper-container')[0].setAttribute('style', 'height: ' + document.getElementsByClassName('mdc-card')[1].clientHeight + 'px');
    if(document.getElementsByClassName('slide1')[0].clientWidth > document.getElementsByClassName('slide1')[0].clientHeight) {
      document.getElementsByClassName('slide1')[0].setAttribute('style', 'height: auto; width: 100%; margin: auto; position: absolute;');
    } else {
      document.getElementsByClassName('slide1')[0].setAttribute('style', 'position: absolute;');
    }
  }
  

}
