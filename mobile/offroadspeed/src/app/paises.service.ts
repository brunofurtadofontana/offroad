import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()
export class PaisesProvider {
  public apiREST = 'https://restcountries.eu/rest/v2/all';
  
  constructor(public http: Http) {
    console.log('Hello PaisesProvider Provider');
  }
 
  listaPaises() {
    return this.http.get(this.apiREST)
                    .map((data) => {
                      return data.json();
                    });              
  }
 
}
