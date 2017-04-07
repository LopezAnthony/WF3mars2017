// Importer la classe Component
import { Component } from '@angular/core';

// Définir le décorateur @Component({...})
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

// Export la class du composant
export class AppComponent {
  title = 'Brand New App';
  collection =['Pierre', 'Paul', 'Jacques', 'Anthony']
  error = 'pasCool'
  openAlert(){
    alert('Salut')
  }
  sayHelloToUser(user){
    console.log('Hello ' + user)
  }

  awesome = "Paulo"
}
