import { Component, ViewChild } from '@angular/core';
import { AppComponent, title } from '../app.component'
import { MdcDrawerModule, MdcListItem, MdcTabBar } from '@angular-mdc/web';
import { drawerRoutes } from '../routes';
import { OnInit, AfterViewInit } from '@angular/core/src/metadata/lifecycle_hooks';
import { Body } from '@angular/http/src/body';

export class DrawerItem {
  label: string;
  icon: string;
  select: string;
}

const DIRECTORY: DrawerItem[] = [
  { label: 'Home', icon: 'home', select: 'true'},
  { label: 'Book List', icon: 'library_books', select: 'false'},
  { label: 'Post An Ad', icon: 'send', select: 'false'},
  { label: 'FAQ', icon: 'question_answer', select: 'false'},
  { label: 'T&C', icon: 'home', select: 'false'},
  { label: 'Contact Us', icon: 'call', select: 'false'},
  { label: 'Manage Ads', icon: 'edit', select: 'false'},
  { label: 'Settings', icon: 'settings', select: 'false'},
];

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.sass'],
  host: {
    '(window:scroll)': 'updateHeader($event)'
  }
})
export class NavbarComponent {

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

  
}
