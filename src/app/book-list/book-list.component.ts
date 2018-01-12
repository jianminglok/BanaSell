import { Component, OnInit, Injectable, ViewChild, ChangeDetectionStrategy, Pipe, PipeTransform } from '@angular/core';
import { Http } from '@angular/http';
import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { AppComponent } from '../app.component';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { ActivatedRoute } from '@angular/router';
import { OnDestroy, AfterViewInit } from '@angular/core/src/metadata/lifecycle_hooks';
import { Router } from '@angular/router';
import * as Immutable from 'immutable'; 
import { delay } from 'q';
import { RoundPipePipe } from '../round-pipe.pipe';

export class FormItem {
  value: string;
  description: string;
}

export class FilterItem {
  filter: string;
  description: string;
}

const forms: FormItem[] = [
  { value: '%', description: 'All' },
  { value: 'f1', description: 'Junior 1' },
  { value: 'f2', description: 'Junior 2' },
  { value: 'f3', description: 'Junior 3' },
  { value: 'f4', description: 'Senior 1' },
  { value: 'f5', description: 'Senior 2' },
  { value: 'f6', description: 'Senior 3' },
  { value: 'others', description: 'Others' },
];

const filters: FilterItem[] = [
  { filter: 'CAST(pricing AS DECIMAL(10,2)) ASC', description: 'Price: Lowest to Highest' },
  { filter: 'CAST(pricing AS DECIMAL(10,2)) DESC', description: 'Price: Highest to Lowest' },
  { filter: 'id DESC', description: 'Newest First' },
  { filter: 'id ASC', description: 'Oldest First' },
  { filter: '`condition` DESC', description: 'Condition: Best to Worst' },
  { filter: '`condition` ASC', description: 'Condition: Worst to Best' },
]

@Component({
  selector: 'app-book-list',
  templateUrl: './book-list.component.html',
  styleUrls: ['./book-list.component.sass'],
  
})

export class BookListComponent implements OnInit {

  roundPipe = new RoundPipePipe();

  test: string;
  current: any;

  proceed: boolean = false;

  isFixed: boolean = true;

  isScrolled = false;
  isHome: boolean = false;
  dbstart: number = 0;
  dbend: number = 8;
  scrollDistance: number = 1.5;

  element: any[];
  element2: any[];
  numbers: number[];

  pages: number;

  eventValue: any;

  dbcount: number;

  forms: FormItem[] = forms;
  filters: FilterItem[] = filters;

  form: string = '';
  filter: string = '';

  trackByFn(index, item) {
    return index; // or item.id
  }

  goNext() {
    this.dbstart += 56;
    this.dbend = 8;
    this.getPost(this.dbstart, this.dbend);
    window.scrollTo(0, 0);
  }

  goPrev() {
    this.dbstart -= 56;
    this.dbend = 8;
    this.getPost(this.dbstart, this.dbend);
    window.scrollTo(0, 0);
  }

  private _ulr ="http://localhost/get_test.php?start=";
  private _ulr2 ="http://localhost/get_count.php";
  //private _ulr ="server/student_liste.php";
   constructor( private _http : Http, route: ActivatedRoute, private router: Router){
    this.test = route.snapshot.params['term'];
   }
 
   getPost(start: number, end: number){
     this._http.get(this._ulr + start + '&end=' + end  + '&form=' + this.form + '&filter=' + this.filter)
     .map( res => res.json())
     .subscribe(
       data => { 
         this.element = data
      },
       err => console.error(err)
     );
      // .map( res  =><Element[]> res.json())
   } 

  getCount(){
    this._http.get(this._ulr2 + '?form=' + this.form)
    .map( res => res.json())
    .subscribe(
      data => { 
        this.element2 = data
        this.pages = data / 56;
        this.numbers = Array.from(Array(this.roundPipe.transform(this.pages)),(x,i)=>i)
     },
      err => console.error(err)
    );
     // .map( res  =><Element[]> res.json())
  } 
  
  ngOnInit() {
    this.getPost(this.dbstart, this.dbend);
    this.getCount();
  }

  onScroll() {
    if(this.dbend <= 48) {
      this.dbend += 8;
      this.getPost(this.dbstart, this.dbend);
    }
  }

  getLength(str: string) {
    return str.replace(/[\u0391-\uFFE5]/g,"aa").length;
  }

  handleChange(event: { index: number, value: any }) {
    this.form = event.value;
    this.dbend = 8;
    this.dbstart = 0;
    if(this.form == event.value && this.form != '') {
      this.getCount();
      this.getPost(this.dbstart, this.dbend);
    }
  }

  handleChange2(event: { index: number, value: any }) {
    this.filter = event.value;
    this.dbend = 8;
    if(this.filter == event.value && this.filter != '') {
      this.getCount();
      this.getPost(this.dbstart, this.dbend);
    }
  }

  handleChange3(event: { index: number, value: any }) {
    this.dbstart = event.value;
    if(this.dbstart == 1) {
      this.dbstart = 0;
      this.proceed = true;
    }
    this.dbend = 8;
    if(this.dbstart == event.value && this.dbstart != 0) {
      this.getCount();
      this.getPost(this.dbstart, this.dbend);
    } else if (this.proceed && event.value == 1) {
      this.getCount();
      this.getPost(this.dbstart, this.dbend);
    }
  }
  
}
