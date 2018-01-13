import { BrowserModule } from '@angular/platform-browser';
import { NgModule, HostListener } from '@angular/core';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { HttpClientModule, HttpClient } from '@angular/common/http';
import { TranslateModule, TranslateLoader } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';
import { AppComponent } from './app.component'
import { navbarRoutes, drawerRoutes } from './routes';
import { InfiniteScrollModule } from 'angular2-infinite-scroll';
import { NgProgressModule } from '@ngx-progressbar/core';
import { NgProgressHttpModule } from '@ngx-progressbar/http';

import { SwiperModule } from 'ngx-swiper-wrapper';
import { SWIPER_CONFIG } from 'ngx-swiper-wrapper';
import { SwiperConfigInterface } from 'ngx-swiper-wrapper';

const DEFAULT_SWIPER_CONFIG: SwiperConfigInterface = {
  direction: 'horizontal',
  slidesPerView: 'auto',
  keyboard: true
};

// AoT requires an exported function for factories
export function HttpLoaderFactory(http: HttpClient) {
  return new TranslateHttpLoader(http);
}

import {
  MdcButtonModule,
  MdcFabModule,
  MdcSelectModule,
  MdcMenuModule,
  MdcToolbarModule,
  MdcCardModule,
  MdcDialogModule,
  MdcThemeModule,
  MdcTypographyModule,
  MdcIconModule,
  MdcCheckboxModule,
  MdcTabModule,
  MdcDrawerModule,
  MdcListModule,
  MdcSwitchModule,
  MdcFormFieldModule,
  MdcTextFieldModule,
  MdcLinearProgressModule,
} from '@angular-mdc/web';


import { NavbarComponent } from './navbar/navbar.component';
import { AdSectionComponent } from './ad-section/ad-section.component';
import { NavbarTabComponent } from './navbar-tab/navbar-tab.component';
import { BookListComponent } from './book-list/book-list.component';
import { HomeComponent } from './home/home.component';
import { AdSubmitComponent } from './ad-submit/ad-submit.component';
import { FaqComponent } from './faq/faq.component';
import { TermsComponent } from './terms/terms.component';
import { SettingsComponent } from './settings/settings.component';
import { ContactComponent } from './contact/contact.component';
import { AccountComponent } from './account/account.component';
import { DrawerComponent } from './drawer/drawer.component';
import { SearchComponent } from './search/search.component';
import { AdCardComponent } from './ad-card/ad-card.component';
import { InfiniteScrollerDirective } from './infinite-scroller.directive';
import { BaseRequestOptions } from '@angular/http/src/base_request_options';
import { RoundPipePipe } from './round-pipe.pipe';
import { InfoComponent } from './info/info.component';
import { RedirectorComponent } from './redirector/redirector.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    AdSectionComponent,
    NavbarTabComponent,
    BookListComponent,
    HomeComponent,
    AdSubmitComponent,
    FaqComponent,
    TermsComponent,
    SettingsComponent,
    ContactComponent,
    AccountComponent,
    DrawerComponent,
    AdCardComponent,
    SearchComponent,
    InfiniteScrollerDirective,
    RoundPipePipe,
    InfoComponent,
    RedirectorComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    MdcButtonModule,
    MdcFabModule,
    MdcMenuModule,
    MdcToolbarModule,
    MdcCardModule,
    MdcDialogModule,
    MdcThemeModule,
    MdcTypographyModule,
    MdcIconModule,
    MdcCheckboxModule,
    MdcTabModule,
    MdcDrawerModule,
    MdcListModule,
    MdcSelectModule,
    MdcSwitchModule,
    MdcMenuModule,
    MdcFormFieldModule,
    MdcTextFieldModule,
    InfiniteScrollModule,
    MdcLinearProgressModule,
    MdcSelectModule,
    NgProgressModule.forRoot(),
    NgProgressHttpModule,
    RouterModule.forRoot(navbarRoutes, { useHash: true, enableTracing: false }),
    RouterModule.forRoot(drawerRoutes, { useHash: true, enableTracing: false }),
    SwiperModule,
    HttpClientModule,
    TranslateModule.forRoot({
        loader: {
            provide: TranslateLoader,
            useFactory: HttpLoaderFactory,
            deps: [HttpClient]
        }
    })
  ],
  entryComponents: [
    AppComponent
  ],
  providers: [
    {
      provide: SWIPER_CONFIG,
      useValue: DEFAULT_SWIPER_CONFIG,
      
    },    
  ],
  bootstrap: [AppComponent]
})

export class AppModule { 
  @HostListener("document:keyup", ["$event"])
  handleKeyup(event: KeyboardEvent) {
      if (event.keyCode === 8) {
          event.preventDefault();
      }
  }

}
