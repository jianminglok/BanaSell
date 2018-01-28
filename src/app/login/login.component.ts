import { Component, OnInit } from '@angular/core';
import { HttpParams, HttpHeaders } from '@angular/common/http';
import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { Router } from '@angular/router';
import { AppComponent } from '../app.component'
import { LoginSharedService } from '../login-shared.service';

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
export class LoginComponent implements OnInit {

  private element: any[];
  headers: Headers;
  inputs: any[] = inputs;

  email: string;
  password: string;

  appComponent: AppComponent;

  private _ulr ="http://localhost/login.php";

  public getPost(input: any[]){
    
    let body = new HttpParams();   
    body = body.append('email', this.email);
    body = body.append('passwrod', this.password);

    let options = new RequestOptions({ headers: this.headers });

    return this._http.post(this._ulr, JSON.stringify(body), options)
    .map( res => res.json() )
    .subscribe(
      data => { this.element = data 
        localStorage.setItem('currentUser', this.element[0]['jwt']);
        var jwt = localStorage.getItem('currentUser');
        console.log(jwt);
        this.shared.change();
        this.router.navigate(['/']);
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

  submitForm() {
    console.log('form submmited');
  }

}
