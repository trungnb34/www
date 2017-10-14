import { Component } from '@angular/core';

@Component({
    templateUrl : './html/word.component.html',
    selector : 'app-word',
    styleUrls : [`./css/word.component.css`],
})

export class WordComponent { 
    en : string = 'Hello world';
    vn : string = 'Xin chào';
    imgUrl : string = 'https://i.ytimg.com/vi/jz5BOGLROAc/hqdefault.jpg';
    forgot : boolean = false;
    toggleForgot() {
        this.forgot = !this.forgot;
    }
}