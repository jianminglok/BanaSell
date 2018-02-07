import { Component, OnInit, ViewChild } from '@angular/core';
import { HttpParams, HttpHeaders } from '@angular/common/http';
import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { Router } from '@angular/router';
import { AppComponent } from '../app.component'
import { LoginSharedService } from '../login-shared.service';
import { AfterContentInit, AfterViewChecked } from '@angular/core/src/metadata/lifecycle_hooks';
import { MdcTextField, MdcTextFieldModule, MdcTextFieldOutline, MdcButton } from '@angular-mdc/web';
import { ElementRef } from '@angular/core/src/linker/element_ref';

export interface FormModel {
  captcha?: string;
}

const inputs: any[] = [
  { value: 'title' },
  { value: 'condition' },
  { value: 'phone' },
  { value: 'price' },
  { value: 'form' },
  { value: 'fb_name' }
];


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.sass']
})
export class LoginComponent implements OnInit, AfterViewChecked {

  @ViewChild('emailField') emailField: MdcTextField;
  @ViewChild('passwordField') passwordField: MdcTextField;
  @ViewChild('formButton') formButton: MdcButton;

  private element: any[];
  headers: Headers;
  inputs: any[] = inputs;

  email: string;
  password: string;

  isFormValid: boolean = true;

  posted: boolean = false;

  emailHelper: string = "A valid email is required";
  passwordHelper: string = "Password is required";

  formValid: boolean = false;

  appComponent: AppComponent;

  private _ulr ="http://localhost/login.php";

  public getPost(input: any[]){
    
    let body = new HttpParams();   
    body = body.append('email', this.email);
    body = body.append('password', this.password);

    let options = new RequestOptions({ headers: this.headers });

    return this._http.post(this._ulr, JSON.stringify(body), options)
    .map( res => res.json() )
    .subscribe(
      data => { 
        this.posted = true;
        this.element = data 
        if(this.element[0]['jwt'] && this.element[0]['status'] == 'Success') {
          localStorage.setItem('currentUser', this.element[0]['jwt']);
          var jwt = localStorage.getItem('currentUser');
          this.shared.change();
          this.router.navigate(['/']);
        } 
        else if(this.element[0]['msg'] == 'Your email or password is incorrect.') {
            this.emailHelper = this.element[0]['msg'];
            this.passwordHelper = this.element[0]['msg'];
            this.passwordField.value = '';
            this.isFormValid = false;
            this.emailField.setValid(false);
            this.passwordField.setValid(false);
        }
        else if(this.element[0]['msg'] == 'User not found. Please check if your email is correct.') {
            this.emailHelper = this.element[0]['msg'];
            this.passwordField.value = '';
            this.isFormValid = false;
            this.passwordHelper = 'Password is required';
            this.emailField.setValid(false);
          }
        
      },
      err => console.error(err),
      () => console.log('done')
    );
     // .map( res  =><Element[]> res.json())
  } 

  public formModel: FormModel = {};

  constructor(private _http: Http, private router: Router, private shared: LoginSharedService) {
    this.shared = shared;
    this.headers = new Headers();
    this.headers.append("Content-Type", "application/x-www-form-urlencoded");
  }

  ngOnInit() {
  }
  
  ngAfterViewChecked() {
    for(var i = 1; i < 3; i++) {
      document.getElementsByClassName("mdc-text-field__label")[i].setAttribute("style", "height: 20px");
    }
  }

  submitForm() {
    console.log('form submmited');
  }

  checkField(value: string, field: string) {
    if(this.posted) {
      if(field == 'email') {
        if(value && value !='' && /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
          this.emailField.setValid(true);
          if(!this.passwordField.isBadInput()) {
            this.isFormValid = true;
          }
        } else {
          this.emailHelper = 'A valid email is required';
          this.emailField.setValid(false);
          this.isFormValid = false;
        }
      } 
      else if(field == 'password') {
        if(value && value !='') {
          this.passwordField.setValid(true);
          if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.emailField.value)) {
            this.emailField.setValid(true);
            this.isFormValid = true;
          }
        } else {
          this.passwordHelper = 'Password is required';
          this.passwordField.setValid(false);
          this.isFormValid = false;
        }
      } 
    }
  }

}
