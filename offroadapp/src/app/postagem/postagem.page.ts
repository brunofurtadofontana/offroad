import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, ParamMap } from '@angular/router';

@Component({
  selector: 'app-postagem',
  templateUrl: './postagem.page.html',
  styleUrls: ['./postagem.page.scss'],
})
export class PostagemPage implements OnInit {

  constructor(public route:ActivatedRoute) {
    this.route.paramMap.subscribe((params:ParamMap)=>
    {
      console.log(params.get('id'))
    })

   }

  ngOnInit() {
  }

}
