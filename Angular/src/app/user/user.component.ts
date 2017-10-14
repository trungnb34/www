import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {

  name = "";
  currentStyle = {'color' : 'blue', 'font-size' : '80px'};
  isHighLight = true;
  constructor() { }

  ngOnInit() {
  }
}
