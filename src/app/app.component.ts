import { Component, ViewChild, Injectable, EventEmitter, HostListener, NgZone, Renderer, ElementRef, enableProdMode } from '@angular/core';
import { RouterModule, Router, Event as RouterEvent, NavigationStart, NavigationEnd, NavigationCancel, NavigationError } from '@angular/router';
import { NavbarComponent } from './navbar/navbar.component';
import { drawerRoutes } from './routes';
import { MdcMenu, MdcMenuOpenFrom, MdcListItem, MdcTemporaryDrawer, MdcTextField } from '@angular-mdc/web';
import { AfterViewInit, OnInit } from '@angular/core/src/metadata/lifecycle_hooks';
import { TranslateService } from '@ngx-translate/core';
import { NavbarTabComponent } from './navbar-tab/navbar-tab.component';
import { Location } from '@angular/common';
import { BehaviorSubject } from 'rxjs'
import { SearchComponent } from './search/search.component';
import { Element } from '@angular/compiler';
import { Input } from '@angular/core/src/metadata/directives';
import { NgProgress } from '@ngx-progressbar/core';
import { ActivatedRoute } from '@angular/router';

export class DrawerItem {
  label: string;
  icon: string;
  select: string;
}

export class FormItem {
  value: string;
  description: string;
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

const forms: FormItem[] = [
  { value: 'all', description: 'All' },
  { value: 'f1', description: 'Junior 1' },
  { value: 'f2', description: 'Junior 2' },
  { value: 'f3', description: 'Junior 3' },
  { value: 'f4', description: 'Senior 1' },
  { value: 'f5', description: 'Senior 2' },
  { value: 'f6', description: 'Senior 3' },
];



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.sass'],
  host: {
    '(window:scroll)': 'updateHeader($event)'
  }
})

@Injectable()
export class AppComponent implements OnInit, AfterViewInit {

  blockback: boolean = true;

  @HostListener("document:keydown", ["$event"])
  handleKeydown(event: KeyboardEvent) {
      if (event.keyCode === 8 && document.activeElement.tagName != 'INPUT' && document.activeElement.tagName != 'TEXTAREA') {
          event.preventDefault();
      } 
  }

  title = 'Ogiebooks';
  searchValue1: string;

  selectedIndex = -1;
  openFrom: MdcMenuOpenFrom = 'topRight';
  @ViewChild('menu') menu: MdcMenu;
  @ViewChild('search') search: MdcTextField;

  openMenu() {
    this.menu.open();
  }

  isDarkTheme: boolean = false;
  isScrolled = false;
  currPos: Number = 0;
  startPos: Number = 0;
  changePos: Number = 64;
  isHome: boolean = false;
  isBookList: boolean = false;
  isNotHome: boolean;
  previousUrl:string;

  updateHeader(evt) {
    this.currPos = (window.pageYOffset || evt.target.scrollTop) - (evt.target.clientTop || 0);
    if(this.currPos >= this.changePos ) {
        this.isScrolled = true;
    } else {
        this.isScrolled = false;
    }

  }

  scrolltoTop() {
    window.scrollTo(0, 0);
  }

  onSearchChange(searchValue : string ) {
    if(!this.searchValue1) {
      this.searchValue1 = this.router.url;
    } else {
      if(this.router.url.indexOf('search') === -1 && this.searchValue1 != this.router.url) {
        this.searchValue1 = this.router.url;
      }
    }
    
    if(searchValue && searchValue.indexOf('isTrusted: true') === -1) {
      console.log(searchValue);
      if(this.router.url.indexOf('search') != -1) {
        this.router.navigate([this.searchValue1]).then(()=>{this.router.navigate(['/search', searchValue])});
      } else {
        this.router.navigate(['/search', searchValue], { relativeTo: this.route });
      }
    } else {
      this.location.back();
    }
  }

  @ViewChild('temporary') temporaryDrawer: MdcTemporaryDrawer;
  @ViewChild('listItem') listItem: MdcListItem;

  isFixed: boolean = true;
  isWaterfall: boolean = false;

  drawertitle = title;

  directory2 = drawerRoutes;
  navitem: DrawerItem[] = DIRECTORY;
  forms: FormItem[] = forms;

  handleTemporary() {
    this.temporaryDrawer.open();
  }

  switchLanguage() {
    if(this.translate.currentLang == 'en') {
      this.translate.use('cn');
    } else {
      this.translate.use('en');
    }
  }

  checkRoute() {
    if(this.router.url == '/') {
      this.isHome = true;
      this.isBookList = false;
    } 
    else if (this.router.url == '/booklist' || this.router.url.indexOf('/search') > -1) {
      this.isHome = false;
      this.isBookList = true;
      if(this.router.url.indexOf('/redirect') == -1 && this.router.url.indexOf('/search') == -1) {
        this.search.value = '';  
      }
    }
    else {
      this.isHome = false;
      this.isBookList = false;
      if(this.router.url.indexOf('/redirect') == -1 && this.router.url.indexOf('/search') == -1) {
        this.search.value = '';  
      }
    }
  }

  constructor(public translate: TranslateService, private router: Router, private location: Location, private ngZone: NgZone, private renderer: Renderer, public progress: NgProgress, private route: ActivatedRoute) {
    // this language will be used as a fallback when a translation isn't found in the current language
    translate.addLangs(["en", "cn"]);
    translate.setDefaultLang('en');

     // the lang to use, if the lang isn't available, it will use the current loader to get them
    translate.use('en');

    router.events.subscribe((event: RouterEvent) => {
      this._navigationInterceptor(event)
    })
  }

  ngOnInit() {
    this.checkRoute();
  }

  ngAfterViewInit() {
    document.getElementsByClassName("mdc-text-field__label")[0].setAttribute('style', 'top: 25%');
  }

  // Shows and hides the loading spinner during RouterEvent changes
  private _navigationInterceptor(event: RouterEvent): void {
    if (event instanceof NavigationStart) {
      // We wanna run this function outside of Angular's zone to
      // bypass change detection
      this.progress.start();
    }
    if (event instanceof NavigationEnd) {
      this.progress.done();
      this.checkRoute();
    }
    // Set loading state to false in both of the below events to
    // hide the spinner in case a request fails
    if (event instanceof NavigationCancel) {
      this.progress.done();
      this.checkRoute();
    }
    if (event instanceof NavigationError) {
      this.progress.done();
      this.checkRoute();
      this.previousUrl = event.url;
    }
  }
}

export const title: string = 'Ogiebooks';