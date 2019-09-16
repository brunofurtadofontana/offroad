import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { SERVER_URL } from 'src/environments/environment';
import 'rxjs/add/operator/map';
import {Observable} from 'rxjs/Observable';
@Injectable({
  providedIn: 'root'
})
export class UsuariosHttpService {

  constructor(public http:HttpClient) {

   }
   query(): Observable<Array<any>>{

     return this.http.get(SERVER_URL + "ability")
     .map(response => response.json());
   }
}
