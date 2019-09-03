import { PaisesProvider } from './../paises.service';
import { Component } from '@angular/core';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'home.page',
  templateUrl: 'home.page.html'
})
export class HomePage {
  paises: string[];
  constructor(public navCtrl: NavController,
              private paisesProvider: PaisesProvider) {

  }

  ionViewDidLoad() {
    this.listaPaises();
  }

  listaPaises() {
    this.paisesProvider.listaPaises()
       .subscribe(
         paises => this.paises = paises);
  }

}