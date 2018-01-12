import { Component, OnInit } from '@angular/core';
import { AfterViewInit } from '@angular/core/src/metadata/lifecycle_hooks';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.sass']
})
export class HomeComponent implements OnInit, AfterViewInit {

  isHome: boolean = false;

  constructor(private router: Router) {
    
   }

  ngOnInit() {
  }

  ngAfterViewInit() {
  }

}
console.log('Height: ' + Math.max(
  document.documentElement["clientHeight"],
  document.body["scrollHeight"],
  document.documentElement["scrollHeight"],
  document.body["offsetHeight"],
  document.documentElement["offsetHeight"]
));