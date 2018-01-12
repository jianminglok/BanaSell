import { Component, ViewChild, Injectable } from '@angular/core';
import { AppComponent } from '../app.component'
import { navbarRoutes } from '../routes';
import { MdcTabBar } from '@angular-mdc/web';
import { AfterViewInit } from '@angular/core/src/metadata/lifecycle_hooks';
import { last } from '@angular/router/src/utils/collection';
import { ActivatedRoute } from '@angular/router/src/router_state';
import { Observable } from 'rxjs/Observable';
import { Router } from '@angular/router';

export class Child {
  label: string;
  active: boolean;
}

const DIRECTORY: Child[] = [
  { label: 'Home', active: true},
  { label: 'Book List', active: false},
  { label: 'Post An Ad', active: false},
];

@Component({
  selector: 'app-navbar-tab',
  templateUrl: './navbar-tab.component.html',
  styleUrls: ['./navbar-tab.component.sass'],
  host: {
    '(window:scroll)': 'updateHeader($event)'
  }
})

@Injectable()
export class NavbarTabComponent implements AfterViewInit {

  @ViewChild('tabBar') tabBar: MdcTabBar;

  isScrolled = false;
  currPos: Number = 0;
  startPos: Number = 0;
  changePos: Number = 64;

  updateHeader(evt) {
    this.currPos = (window.pageYOffset || evt.target.scrollTop) - (evt.target.clientTop || 0);
    if(this.currPos >= this.changePos ) {
        this.isScrolled = true;
    } else {
        this.isScrolled = false;
    }
  }

  constructor(private route: Router) {
  }

  directory = navbarRoutes;
  navitem: Child[] = DIRECTORY;

  ngAfterViewInit() {
    if(this.route.url === '/') {
      this.tabBar.setTabActiveAtIndex(0);
    }
    
  }

}