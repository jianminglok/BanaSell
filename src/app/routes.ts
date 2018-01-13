import { Routes } from '@angular/router';

import { HomeComponent } from './home/home.component';
import { BookListComponent } from './book-list/book-list.component';
import { AdSubmitComponent } from './ad-submit/ad-submit.component';
import { AdSectionComponent } from './ad-section/ad-section.component';
import { FaqComponent } from './faq/faq.component';
import { TermsComponent } from './terms/terms.component';
import { ContactComponent } from './contact/contact.component';
import { SettingsComponent } from './settings/settings.component';
import { AccountComponent } from './account/account.component';
import { SearchComponent } from './search/search.component';
import { InfoComponent } from './info/info.component';
import { RedirectorComponent } from './redirector/redirector.component';

export const navbarRoutes: Routes = [
    { path: '', component:  HomeComponent},
    { path: 'booklist', component: BookListComponent },
    { path: 'postanad', component: AdSubmitComponent },
    { path: 'search', component: SearchComponent},
    { path: 'search/:term', component: SearchComponent},
    { path: 'info/:term', component: InfoComponent},
    { path: 'redirect', component: RedirectorComponent},
]

export const drawerRoutes: Routes = [
    { path: '', component:  HomeComponent},
    { path: 'booklist', component: BookListComponent },
    { path: 'postanad', component: AdSubmitComponent },
    { path: 'faq', component:  FaqComponent},
    { path: 't&c', component: TermsComponent },
    { path: 'contact-us', component: ContactComponent },
    { path: 'settings', component: SettingsComponent },
    { path: 'account', component: AccountComponent },
]