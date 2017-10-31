import { Component } from '@angular/core';
import { Article } from './article/article.model';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  articels : Article[];
  addArticle(title : HTMLInputElement, link : HTMLInputElement) {
      if(title.value != '' && link.value != '')
      {
        this.articels.push(new Article(title.value, link.value));
        console.log(`Adding article title: ${title.value} and link: ${link.value}`);
      }
      else
      {
        console.log('Bạn cần điền đầy đủ thông tin');
      }
      
      return false;
  }
  constructor() {
    this.articels = [
        new Article('Angular 2', 'http://angular.io', 3),
        new Article('Fullstack', 'http://fullstack.io', 2),
        new Article('Angular Homepage', 'http://angular.io', 1),
    ];
  }
  sortedArticles() {
    return this.articels.sort((a : Article, b : Article) => a.votes - b.votes);
  }
}
