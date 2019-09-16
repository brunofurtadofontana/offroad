import { UsuariosHttpService } from './../usuarios-http.service';
import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { SERVER_URL } from 'src/environments/environment';
import { Usuarios } from '../../Models/Usuarios';
import 'rxjs/add/operator/map'; 
import { NavParams, NavController } from '@ionic/angular';

@Component({
  selector: 'app-usuarios',
  templateUrl: './usuarios.page.html',
  styleUrls: ['./usuarios.page.scss'],
})
export class UsuariosPage implements OnInit {


 //public listausuarios:Usuarios[];
 public listausuarios: Array<any> = [];
  constructor(
    public http:HttpClient,
    public navParams: NavParams,
    public navCtrl: NavController,
    UsuariosHttpService: UsuariosHttpService) { }

  // ngOnInit() {
    
  //   this.listarUsuarios();
  // }

  // listarUsuarios(){
  //   var headers = new HttpHeaders();
  //   headers.append('Content-Type', 'application/json');  
  //   headers.append('Accept', '/');
  //   headers.append('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT');
  //   headers.append('Access-Control-Allow-Origin', "*"); 
  //   headers.append('Access-Control-Allow-Headers', "X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding, application/json");

  //   this.http.get(SERVER_URL + "ability",{headers: headers}).subscribe(
  //     data =>{
  //       const obj = (data as any);
  //       const obj_json = JSON.parse(obj._body);
  //       this.listausuarios = new Array<any>();
  //       this.listausuarios = obj_json.results;
  //     }
  //   );
    
  // }
    ionViewDidLoad (){
      this.UsuariosHttpService.query()
      .subscribe(data=> this.products = data);
    }

}
