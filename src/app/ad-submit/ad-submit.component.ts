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
import { FileUploadModule, FileUploader } from 'ng2-file-upload';
import { UploaderOptions, UploadFile, UploadInput, UploadOutput, humanizeBytes } from 'ngx-uploader';
import { EventEmitter } from '@angular/core';

const URL = 'https://ogiebooks.com/submitbooks.php';

export class FormItem {
  value: string;
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

const conditions: FormItem[] = [
  { value: '1', description: 'Poor' },
  { value: '2', description: 'Moderate' },
  { value: '3', description: 'Good' },
  { value: '4', description: 'Excellent' },
];

const subjects: FormItem[] = [
  { value: 'cn', description: 'Chinese'  },
  { value: 'en', description: 'English' },
  { value: 'bm', description: 'Bahasa Malaysia' },
  { value: 'sci', description: 'Science' },
  { value: 'am', description: 'Ad. Maths (S)' },
  { value: 'em', description: 'Maths (C)' },
  { value: 'maths', description: '(Maths)' },
  { value: 'sej', description: 'Sejarah' },
  { value: 'khb', description: 'KHB' },
  { value: 'mor', description: 'Moral' },
  { value: 'geo', description: 'Geografi' },
  { value: 'bio', description: 'Biology' },
  { value: 'chem', description: 'Chemistry' },
  { value: 'phy', description: 'Physics' },
  { value: 'business', description: 'Business' },
  { value: 'acc', description: 'Accounting' },
  { value: 'econ', description: 'Economics' },
  { value: 'bookkeep', description: 'Bookkeeping' },
  { value: 'comp', description: 'Computer' },
  { value: 'chist', description: 'Chinese History' },
  { value: 'others', description: 'Others'  },
];

@Component({
  selector: 'app-ad-submit',
  templateUrl: './ad-submit.component.html',
  styleUrls: ['./ad-submit.component.sass']
})
export class AdSubmitComponent implements OnInit, AfterViewInit {

  public uploader:FileUploader = new FileUploader({url: URL});

  img: any;
  key: string;
  public element: any[];
  headers: Headers;
  booknames: any[];
  selectedform: string;
  selectedcondtition: string;
  
  subjectname: number[] = [];
  bookname: number[] = [];
  bookname2: boolean[] = [];
  namescount: number = 1;

  isEmpty: boolean = false;
  isNull: boolean = true;
  isTest: boolean = false;

  options: UploaderOptions;
  formData: FormData;
  files: UploadFile[];
  uploadInput: EventEmitter<UploadInput>;
  dragOver: boolean;
  humanizeBytes: Function;

  height: number = 810;

  facebook: boolean = false;
  whatsapp: boolean = false;
  wechat: boolean = false;

  eventIndex: number;
  eventValue: any;

  sizeLimit = 8000000;

  forms: FormItem[] = forms;
  conditions: FormItem[] = conditions;
  subjectslist: FormItem[] = subjects;

  title: string;
  description: string;
  phone: string;
  price: string;
  facebookname: string;

  qtd: any[];

  @ViewChildren('allTheseThings') things: QueryList<any>;

  onUploadOutput(output: UploadOutput): void {
    if (output.type === 'allAddedToQueue') { // when all files added in queue
      // uncomment this if you want to auto upload files when added
       const event: UploadInput = {
         type: 'uploadAll',
         url: 'http://localhost/file_upload.php',
         method: 'POST',
         data: { foo: 'bar' }
       };
       
        this.uploadInput.emit(event);

    } else if (output.type === 'addedToQueue'  && typeof output.file !== 'undefined') { // add file to array when added
      if(this.files.length > 7) {
        alert("You can only upload up to 8 files");
      } else {
        console.log(this.files.length);
        if(output.file.size > this.sizeLimit) {
          alert(output.file.name + ' is larger than 8MB (' + (output.file.size / 1000000) + 'MB)');
        } else {
          this.files.push(output.file);
          if(this.files.length > 3) {
            this.height += 72;
            document.getElementsByClassName('card__16-9-media')[0].setAttribute('style', 'height: ' + this.height + 'px;');
            document.getElementsByClassName('card-wrapper')[0].setAttribute('style', 'height: ' + this.height + 'px;');
            document.getElementsByClassName('card-wrapper')[1].setAttribute('style', 'height: ' + this.height + 'px;');
          }
        }
      }     
    } else if (output.type === 'uploading' && typeof output.file !== 'undefined') {
      // update current data in files array for uploading file
      const index = this.files.findIndex(file => typeof output.file !== 'undefined' && file.id === output.file.id);
      this.files[index] = output.file;
    } else if (output.type === 'removed') {
      // remove file from array when removed
      this.files = this.files.filter((file: UploadFile) => file !== output.file);
    } else if (output.type === 'dragOver') {
      this.dragOver = true;
    } else if (output.type === 'dragOut') {
      this.dragOver = false;
    } else if (output.type === 'drop') {
      this.dragOver = false;
    }
  }

  startUpload(): void {
    const event: UploadInput = {
      type: 'uploadAll',
      url: 'http://localhost/file_upload.php',
      method: 'POST',
      data: { foo: 'bar' }
    };

    this.uploadInput.emit(event);
  }

  cancelUpload(id: string): void {
    this.uploadInput.emit({ type: 'cancel', id: id });
  }

  removeFile(id: string): void {
    this.uploadInput.emit({ type: 'remove', id: id });
    if(this.files.length > 2) {
      this.height -= 72;
      document.getElementsByClassName('card__16-9-media')[0].setAttribute('style', 'height: ' + this.height + 'px;');
      document.getElementsByClassName('card-wrapper')[0].setAttribute('style', 'height: ' + this.height + 'px;');
      document.getElementsByClassName('card-wrapper')[1].setAttribute('style', 'height: ' + this.height + 'px;');
    }
  }

  removeAllFiles(): void {
    this.uploadInput.emit({ type: 'removeAll' });
  }
  
  constructor(private route: ActivatedRoute, private _http: Http) {
    this.key = route.snapshot.params['term'];
    this.headers = new Headers();
    this.headers.append("Content-Type", "application/x-www-form-urlencoded");

    this.options = { concurrency: 1, allowedContentTypes: ['image/png', 'image/jpeg', 'image/gif', 'image/jpg'] };
    this.files = []; // local uploading files array
    this.uploadInput = new EventEmitter<UploadInput>(); // input events, we use this to emit data to ngx-uploader
    this.humanizeBytes = humanizeBytes;

    this.booknames = Array(this.namescount).fill(0).map((x,i)=> i );
    this.subjectname.length = this.namescount;
    this.bookname.length = this.namescount;
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
        
      },
      err => console.error(err),
      () => console.log('done')
    );
     // .map( res  =><Element[]> res.json())
  } 

  onSearchChange(searchValue : string ) {
    alert(searchValue);
  }

  ngOnInit() {
    
  }

  ngAfterViewInit() {
    
  }
  
  addField() {
    this.namescount += 1;
    this.booknames = Array(this.namescount).fill(0).map((x,i)=> i );
    this.subjectname.length = this.namescount;
    this.bookname.length = this.namescount;
  }

  removeField() {
    if(this.booknames.length > 1) {
      this.namescount -= 1;
      this.booknames = Array(this.namescount).fill(0).map((x,i)=> i );
      this.subjectname.length = this.namescount;
      this.bookname.length = this.namescount;
    }
  }

  removeAllField() {
    this.namescount = 1;
    this.booknames = Array(this.namescount).fill(0).map((x,i)=> i );
    this.subjectname.length = this.namescount;
    this.bookname.length = this.namescount;
  }

  test() {
    if(this.title && this.phone && this.price && this.selectedcondtition) {
      console.log(this.title);
      console.log(this.description);
      console.log(this.phone);
      console.log(this.price);
      console.log(this.selectedcondtition);

     
    } else {
      console.log(this.subjectname[1]);
    }
    if(this.title) {
      
    } else {
      this.isTest = true;
    }

    for(var i=0; i < this.bookname.length; i++) {
      if(!this.bookname[i]) {
        this.bookname2[i] = true;
      }
    }
  }

 
}
