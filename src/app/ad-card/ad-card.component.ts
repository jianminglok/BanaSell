import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { Router } from '@angular/router';

@Component({
  selector: 'app-ad-card',
  templateUrl: './ad-card.component.html',
  styleUrls: ['./ad-card.component.sass']
})

export class AdCardComponent implements OnInit {

  element: any[];

  // private _ulr ="http://jsonplaceholder.typicode.com/posts";
 private _ulr ="http://localhost/get_test.php?start=0&end=6&form=&filter=";
 //private _ulr ="server/student_liste.php";
  constructor( private _http : Http, private router: Router){}

  getPost(){
    this._http.get(this._ulr)
    .map( res => res.json())
    .subscribe(
      data => { this.element = data},
      err => console.error(err),
      () => console.log('done')
    );
     // .map( res  =><Element[]> res.json())
  }

  ngOnInit() {
    this.getPost();
  }

  getInfo(key: string) {
    this.router.navigate(['/info', key]);
  }

  Arr = Array; //Array type captured in a variable
  num:number = 20;

  getLength(str: string) {
    return str.replace(/[\u0391-\uFFE5]/g,"aa").length;
  }

}
